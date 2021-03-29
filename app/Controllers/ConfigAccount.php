<?php


namespace App\Controllers;


use App\Models\DataAccountModel;
use App\Models\AccountModel;
use App\Models\ConfigAccountModel;

class ConfigAccount extends BaseController
{
    protected $configAccountModel;
    protected $accountModel;
    protected $userSession;
    protected $accountDataModel;

    public function __construct()
    {
        $this->configAccountModel = new ConfigAccountModel();
        $this->accountModel = new AccountModel();
        $this->accountDataModel = new DataAccountModel();
        $session = session();
        $this->userSession = $session->__get('user');
        if (!$session->__isset('user')) return redirect('login');
        $this->data['auth'] = $this->userSession;
    }

    public function index($uid)
    {
        $configs = ConfigAccountModel::FUNCTION;
        $findAccountId = $this->accountModel->where([
            'user_id' => (int)$this->userSession['id'],
            'uid' => $uid,
        ])->first();
        $id = $findAccountId['id'] ?? -9999;
        $query = $this->configAccountModel->where([
            'account_id' => $id,
        ])->get();
        $data = [];
        foreach ($query->getResult() as $row) {
            $data[] = (array)$row;
        }
        $result = [];
        foreach ($configs as $config) {
            $status = "OFF";
            foreach ($data as $row) {
                if ($row['type'] === $config) {
                    $status = $row['status'];

                }
            }
            $result[$config] = $status;
        }

        $this->data['configs'] = $result;
        $this->data['uid'] = $uid;
        $this->data['view'] = 'config';

        return view('layout', $this->data);
    }

    public function update($uid)
    {
        $data = [
            'type' => $this->getParamString('type'),
        ];
        $findAccountId = $this->accountModel->where([
            'user_id' => (int)$this->userSession['id'],
            'uid' => $uid,
        ])->first();
        if (is_null($findAccountId)) return $this->responseError();
        $find = $this->configAccountModel->where(['account_id' => (int)$findAccountId['id'], 'type' => $this->getParamString('type')])->first();
        $data['status'] = $this->getParamString('status');
        $data['account_id'] = (int)$findAccountId['id'];
        if (is_null($find)) {
            $this->configAccountModel->insert($data);
        } else {
            $this->configAccountModel->update(['id' => $find['id']], $data);
        }
        return $this->responseSuccess();
    }

    public function commentGroup($uid)
    {
        $type = 'comment_group';
        $accountId = $this->findIdAccount([
            'uid' => $uid,
            'user_id' => (int)$this->userSession['id']
        ]);
        $cond = [
            'account_id'=>$accountId,
            'type'=>$type,
        ];
       $findData= $this->accountDataModel->where($cond)->first();

       return view('layout',[
           'view'=>'comment-group',
           'data'=>json_decode($findData['data'] ?? '{}'),
           'uid'=>$uid,
           'account'=>$accountId,
           'auth'=>$this->userSession
       ]);
    }

    public function commentGroupUpdate($uid){
        $type = 'comment_group';

        $accountId = $this->findIdAccount([
            'uid' => $uid,
            'user_id' => (int)$this->userSession['id']
        ]);
        $cond = [
            'account_id'=>$accountId,
            'type'=>$type,
        ];
        $findData= $this->accountDataModel->where($cond)->first();
        $cond['data'] = json_encode([
            'group_ids'=>$_POST['group_ids'],
            'content'=>$_POST['content'],
        ]);
        if(is_null($findData)){
            $this->accountDataModel->insert($cond);
        }else{
            $this->accountDataModel->update([
                'id'=>$findData['id']
            ],$cond);
        }
        return redirect('accounts');
    }

    private function findIdAccount($cond)
    {
        return (int)$this->accountModel->where($cond)->first()['id'];
    }
}