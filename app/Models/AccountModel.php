<?php


namespace App\Models;


use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'accounts';
    protected $allowedFields = ['user_id', 'name', 'uid', 'cookie', 'status'];

    public function accountFree($userId, $type)
    {

        $find = $this->where([
            'accounts.user_id' => $userId,
            'accounts.status' => 'LIVE',
        ]);
        $find->join('account_configs', 'account_configs.account_id = accounts.id')->where(['account_configs.status' => 'ON', 'account_configs.type' => $type]);
        $find->select(['*','accounts.id as acc_id']);
        $results = ($find->get())->getResultArray();
        if (count($results) == 0) return [
            'status' => 201,
            'content' => 'Không tìm thấy account nào',
            'data' => (object)[]
        ];
        $searchFree = array_filter($results, function ($row) {
            if ($row['run'] == 0) return $row;
        });

        if (count($searchFree) == 0) {
            $idsUpdate = array_column($results, 'id');
            $builder= $this->builder('account_configs');
            $builder->whereIn('id', $idsUpdate);
            $builder->set('run', 0);
            $builder->update();
            return [
                'status'=>204,
                'content'=>'Tất cả tài khoản đang ở trạng thái chờ',
                'data'=>(object)[]
            ];
        }

        $builder= $this->builder('account_configs');
        $builder->where('account_id', $results[0]['acc_id'])->where('status','ON');
        $builder->set('run', 1);
        $builder->update();
        return [
            'status'=>200,
            'content'=>'Có tài khoản chờ chạy',
            'data'=>$results[0]
        ];
    }
}