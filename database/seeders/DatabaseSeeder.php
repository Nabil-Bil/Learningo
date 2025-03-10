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
            'first_name'=>'jhon',
            'last_name'=> 'doe',
            'email'=>'jhon_doe@outlook.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('jhon_doe'),
            'role'=>'enseignant',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('users')->insert([
            'first_name'=> 'jhon',
            'last_name'=> 'doe',
            'email'=> 'jhon_doe@outlook.fr',
            'email_verified_at'=>now(),
            'password'=>Hash::make('jhon_doe'),
            'role'=>'etudiant',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        for($i=0;$i<10;$i++){
           Salon::factory()->create(
            [
                'user_id'=>2,
                'meeturl'=>'https://defaultmeeturl.com/'.$i
            ]
           );
        }


    }
}
