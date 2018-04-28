<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'datedebut' => date('Y-m-j'),
            'datefin' => date('Y-m-j'),
            'anneuniv' => date('Y-m-j'),
        ]);
    }
}
