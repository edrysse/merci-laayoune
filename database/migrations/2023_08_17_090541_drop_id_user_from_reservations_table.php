<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Drop the foreign key if it exists
            $table->dropForeign(['id_user']);  // Adjust the foreign key name if it's different

            // Drop the 'id_user' column
            $table->dropColumn('id_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Recreate the 'id_user' column (assuming it's an unsigned big integer for foreign key relationship)
            $table->unsignedBigInteger('id_user')->nullable();  // Ensure the column allows null values if needed

            // Add the foreign key back, assuming it references the 'id' on the 'users' table
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
