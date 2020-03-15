<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'evebay2@mail.ru',
                'password' => Hash::make('123'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        factory(\App\User::class, 3)->create();
    }
}
