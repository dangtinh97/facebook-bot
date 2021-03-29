<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Services;

class Login extends BaseController
{
    protected $userModel;
    protected $session ;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
    }


    public function login()
    {
        return view('auth/login');
    }

    public function attempt()
    {
        $validation = Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required|min_length[4]'
        ]);
        $validation->withRequest($this->request);
        if (!$validation->run()) {
            $errors = $validation->getErrors();
            return view('auth/login', [
                'errors' => $errors,
            ]);
        }
        $attempt=[
            'username' => $this->getParamString('username'),
            'password' => md5($this->getParamString('password')),
        ];
       $builder= $this->userModel->where($attempt)->first();
       if(is_null($builder)) return view('auth/login', [
           'errors' => ['đăng nhập thất bại'],
       ]);
       $this->session->__set('user',$builder);
       return redirect('accounts');
    }
}