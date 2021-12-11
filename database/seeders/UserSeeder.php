<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Phan Văn Luân";
        $user->email = "luanphan@gmail.com";
        $user->password = Hash::make('12345678');
        $user->phone = "";
        $user->address = "";
        $user->role = "0";
        $user->save();

        $user = new User();
        $user->name = "Lê Minh Chiến";
        $user->email = "chien@gmail.com";
        $user->password = Hash::make('123456789');
        $user->phone = "";
        $user->address = "";
        $user->role = "1";
        $user->save();

        $user = new User();
        $user->name = "Sơn Lâm";
        $user->email = "sonlam@gmail.com";
        $user->password = Hash::make('12345678');
        $user->phone = "";
        $user->address = "";
        $user->role = "1";
        $user->save();
    }
}
