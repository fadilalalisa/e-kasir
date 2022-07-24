<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Authentikasi extends BaseController
{

    protected $userModel;
    protected $validation;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        if (session()->get('is_logged_in')) {
            return redirect()->to('/');
        }

        $data = [
            "title" => 'Login'
        ];
        return view('auth/login', $data);
    }

    public function do_login()
    {
        // Validasi form
        if (!$this->validate([
            'login' => [
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $login = $this->request->getVar('login');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where('username', $login)
            ->orWhere('email', $login)
            ->find();

        // Cek user ditemukan atau tidak
        if (count($user) == 1) {
            $user = $user[0];

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Simpan data user di Session
                $session_data = $user;
                session()->set('user', $session_data);
                session()->set('is_logged_in', true);

                return redirect()->to('/');
            }
        } 

        // Pesan login gagal
        session()->setFlashdata([
            'tipe'  => 'warning',
            'pesan' => 'Gagal melakukan proses autentikasi. Mohon untuk mengisi username & password dengan benar.'
        ]);

        return redirect()->back()->withInput();
    }

    public function register()
    {
        $data = [
            "title" => 'Register'
        ];
        return view('auth/register', $data);
    }

    public function logout()
    {
        if (session()->get('is_logged_in')) {
            session()->remove(['user', 'is_logged_in']);
            session()->destroy();
        } else {
            session()->setFlashdata([
                'tipe'  => 'warning',
                'pesan' => 'Login untuk memulai sesi Anda.'
            ]);
        }

        return redirect()->to('/login');
    }
}
