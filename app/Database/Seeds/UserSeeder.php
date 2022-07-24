<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();

        $userModel->save([
            'nama'      => 'Lisa',
            'telepon'   => '02712345',
            'email'     => 'kasir01.ekasir@gmail.com',
            'username'  => 'kasir01',
            'password'  => password_hash('kasir@01', PASSWORD_DEFAULT),
            'role'      => 'kasir',
        ]);
    }
}
