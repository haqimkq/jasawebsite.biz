<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'isAdmin' => true,
                'isSupport' => true,
                'email_verified_at' => now()->subDays(rand(1, 30))->subHours(rand(1, 12))
            ],
            [
                'name' => 'Support',
                'email' => 'support@gmail.com',
                'password' => Hash::make('12345678'),
                'isAdmin' => false,
                'isSupport' => true,
                'email_verified_at' => now()->subDays(rand(1, 30))->subHours(rand(1, 12))
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678'),
                'isAdmin' => false,
                'isSupport' => false,
                'email_verified_at' => now()->subDays(rand(1, 30))->subHours(rand(1, 12))
            ]
        ]);
        DB::table('pelanggans')->insert([
            [
                'id' => 1,
                'nama_pelanggan' => 'Admin',
                'alamat' => 'Komplek PU Blok B1 No.10, Buah Batu (Cipagalo Cipagalo Bojongsoang, Kujangsari, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40287',
                'no_hp' => '6289652236201',
                'user_id' => 1,
                'image' => 'default_image.jpg'
            ],
        ]);
        DB::table('nameservers')->insert([
            [
                'id' => 1,
                'nameserver1' => 'plesk1.com',
                'nameserver2' => 'plesk2.com',
                'tanggal_ns' => date('2023-08-01'),
                'status_ns' => 'Aktif',

            ],
        ]);
    }
}
