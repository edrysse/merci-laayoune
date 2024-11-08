<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = User::query();
        $date = $request->date_filter;

        switch ($date) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;

            case 'hier':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case 'ce_semaine':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'semaine_dernier':
                $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()]);
                break;
            case 'ce_mois':
                $query->whereMonth('created_at', Carbon::now()->month);
                break;
            case 'mois_dernier':
                $query->whereMonth('created_at', Carbon::now()->subMonth()->month);
                break;
            case 'cette_annee':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
            case 'annee_dernier':
                $query->whereYear('created_at', Carbon::now()->subYear()->year);
                break;
        }

        $users = $query->get();
        $profile = Profil::where('id_user', Auth::id())->first();
        return view('users.index', compact('users', 'profile'));
    }

    public function reservations($id)
    {
        $profile = Profil::where('id_user', Auth::id())->first();
        $reservations = User::find($id)->reservations;
        return view('users.reservations', compact('reservations', 'profile'));
    }

    public function contacts($id)
    {
        $profile = Profil::where('id_user', Auth::id())->first();
        $contacts = User::find($id)->contacts;
        return view('users.contacts', compact('contacts', 'profile'));
    }

    public function profile($id)
    {
        $profile = User::find($id)->profile;
        return view('users.profile', compact('profile'));
    }

    public function create()
    {
        $profile = Profil::where('id_user', Auth::id())->first();
        return view('users.create', compact('profile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'Added successfully');
    }

    public function show(User $user)
    {
        $profile = Profil::where('id_user', Auth::id())->first();
        return view('users.show', compact('user', 'profile'));
    }

    public function edit(User $user)
    {
        $profile = Profil::where('id_user', Auth::id())->first();
        return view('users.edit', compact('profile', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $profile = Profil::where('id_user', Auth::id())->first();
        $user->update($request->all());

        return redirect()->route('user.index')->with('success', 'Updated successfully')->with('users', User::all())->with('profile', $profile);
    }

    public function destroy(User $user)
    {
        $profile = Profil::where('id_user', Auth::id())->first();
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Deleted successfully')->with('profile', $profile);
    }
}
