<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reservationController extends Controller
{
    public function __construnct(){
        $this->middleware('auth');
     }
    public function index()
    {
        $profile=Profil::where('id_user',Auth::id())->first();
        $reservations=Reservation::orderBy('created_at', 'desc')->paginate(15);
        return view('reservation.index')->with('reservations',$reservations)->with('profile',$profile);

 }
    public function Trashed(){
        $reservations=Reservation::onlyTrashed()->get();
        return view('reservation.Trashed')->with('reservations',$reservations);
    }
    public function create()
    {  $profile=Profil::where('id_user',Auth::id())->first();
       return view('reservation.create',compact('profile','profile'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
          'date'=>'required',
          'heure'=>'required',
          'gens'=>'required',
          'nom'=>'required',
          'phone'=>'required',
          'email'=>'required'
      ]);
      $reservation=Reservation::create([
        'date'=>$request->date,
        'heure'=>$request->heure,
        'gens'=>$request->gens,
        'nom'=>$request->nom,
        'phone'=>$request->phone,
        'email'=>$request->email
      ]);
      $profile=Profil::where('id_user',Auth::id())->first();
      return redirect()->route('reservation.index')->with('succes', 'updated succeffly')
      ->with('profile',$profile);

    }

    public function show( $id)
    {
        $profile=Profil::where('id_user',Auth::id())->first();
     $reservation=Reservation::where('id',$id)->first();
     return view('reservation.show')->with('reservation',$reservation)->with('profile',$profile);
    }
    public function edit(Reservation $reservation)
    {
        $profile=Profil::where('id_user',Auth::id())->first();
        return view('reservation.edit')->with('reservation',$reservation)->with('profile',$profile);

    }

    public function update(Request $request, $id)
    {
       $reservation=Reservation::find($id);
       $this->validate($request,[
        'date'=>'required',
        'heure'=>'required',
        'gens'=>'required',
        'nom'=>'required',
        'phone'=>'required',
        'email'=>'required'
    ]);
        $reservation->date=$request->date;
        $reservation->heure=$request->heure;
        $reservation->gens=$request->gens;
        $reservation->nom=$request->nom;
        $reservation->phone=$request->phone;
        $reservation->email=$request->email;
        $reservation->save();
        $reservations=Reservation::all();
        $profile=Profil::where('id_user',Auth::id())->first();
        return view('reservation.index')->with('reservations',$reservations)->with('profile',$profile);
    }

    public function destroy($id)
    {
        $profile=Profil::where('id_user',Auth::id())->first();
     $reservation=Reservation::find($id);
     $reservation->delete();
     return redirect()->back()->with('profile',$profile);
    }
    public function hdelete( $id)
    {
        $reservation=Reservation::withTrashed()->where('id',$id)->first();
        $reservation->forceDelete();
        return redirect()->back();
    } public function destrestoreroy( $id)
    {
        $reservation=Reservation::withTrashed()->where('id',$id)->first();
        $reservation->restore();
        return redirect()->back();
    }
}
