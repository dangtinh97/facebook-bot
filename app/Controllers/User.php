<?php


namespace App\Controllers;


use App\Libraries\Facebook;
use App\Models\AccountModel;
use Config\Services;


class User extends BaseController
{
    protected $accountModel;
    protected $userSession;

    public function __construct()
    {
        $this->accountModel = new AccountModel();
        $session = session();
        $this->userSession = $session->__get('user');
        $this->data['auth'] = $this->userSession;
    }

    public function index()
    {
        if(is_null($this->userSession)) return redirect('login');
        $this->data['view'] = 'account';
        return view('layout', $this->data);
    }

    public function check()
    {
        $validation = Services::validation();
        $validation->setRules([
            'cookie' => 'required',
        ]);
        $validation->withRequest($this->request);
        if (!$validation->run()) {
            $errors = $validation->getErrors();
            return $this->responseError(422, array_values($errors)[0]);
        }
        $facebookMe = Facebook::infoByCookie($this->getParamString('cookie'));
        if (count($facebookMe) == 0) return $this->responseError(201, 'Cookie lỗi');
        $facebookMe['cookie'] = $this->getParamString('cookie');
        return $this->responseSuccess(200, 'Thành công', $facebookMe);
    }

    public function store()
    {
        $validation = Services::validation();
        $validation->setRules([
            'cookie' => 'required',
            'uid' => 'required',
            'name' => 'required',
        ]);
        $validation->withRequest($this->request);
        if (!$validation->run()) {
            $errors = $validation->getErrors();
            return $this->responseError(422, array_values($errors)[0]);
        }
        $findAccount = $this->accountModel->where([
            'uid' => $this->getParamString('uid'),
            'user_id' => (int)$this->userSession['id']
        ])->first();

        if (!is_null($findAccount)) {
            $this->accountModel->update($findAccount['id'],[
                'uid' => $this->getParamString('uid'),
                'cookie' => $this->getParamString('cookie'),
                'name' => $this->getParamString('name'),
            ]);
        } else {
            $this->accountModel->insert([
                'uid' => $this->getParamString('uid'),
                'cookie' => $this->getParamString('cookie'),
                'name' => $this->getParamString('name'),
                'user_id' => (int)$this->userSession['id'],
                'status' => 'LIVE'
            ]);
        }
        return $this->responseSuccess();

    }

    public function listAccount()
    {
        $query = $this->accountModel->where([
            'user_id' => (int)$this->userSession['id'],
        ])->select(['uid','name','id','status','created_at'])->get();
        $data = [];
        foreach ($query->getResult() as $row) {
            $data[] = $row;
        }
        $this->data['list'] = $data;
        return $this->responseSuccess(200, 'Account', $this->data);
    }
}