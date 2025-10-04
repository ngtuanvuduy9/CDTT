<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 9; $i++) {
            DB::table('users')->insert([
                'fullname' => 'Nguyen Tuan Vu Duy' . $i,
                'username' => 'user' . $i,
                // mật khẩu lưu trữ dưới dạng mã hóa
                // nhiều cách mã hóa 
                // thuần - sử dụng thư viện
                // md5, Hash: bcrypt (ko giải mã), ...
                'password' => Hash::make('123456'),
                'email' => 'user' . $i . '@gmail.com',
                'role' => 1,
            ]);
        }
    }
}

