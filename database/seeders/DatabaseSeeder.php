<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Salon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'first_name'=>'admin',
            'last_name'=>'admin',
            'email'=>'admin@admin.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('admin@admin.com'),
            'role'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('users')->insert([
            'first_name'=>'RADJAI',
            'last_name'=>'Nabil',
            'email'=>'n.radjai@outlook.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('radjai2001'),
            'role'=>'enseignant',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('users')->insert([
            'first_name'=>'RADJAI',
            'last_name'=>'Nabil',
            'email'=>'n.radjai@outlook.fr',
            'email_verified_at'=>now(),
            'password'=>Hash::make('radjai2001'),
            'role'=>'etudiant',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        // $salons=Salon::factory(4)->create();
        // foreach($salons as $salon){
        //     $salon->users()->attach(2);
        // }


    }
}
