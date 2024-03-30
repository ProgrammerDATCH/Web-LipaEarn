<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => "da_true",
            'email' => "iranzithierry@gmail.com",
            'number' => '0788256363', // Enclose the number in quotes to treat it as a string.
            'password' => Hash::make('Kimironko'),
            'profile' => 'storage/images/avatars/user-1.jpg',
            'country' => 'Rwanda',
            'referral_id' => null,
            'referrals' => 0.00,
            'status' => 'Active',
            'created_at' => now(),
            'updated_at' => now(),
            'role'=> 'Admin',
        ]);
    }
}
