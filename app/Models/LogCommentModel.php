<?php


namespace App\Models;


use CodeIgniter\Model;

class LogCommentModel extends Model
{
    protected $table = 'comment_logs';
    protected $allowedFields = ['content', 'account_id', 'post_id', 'type'];

    public function findIdNotInLog($ids, $type, $accountId)
    {
        $builder = $this->builder();
        $builder->where([
            'account_id' => $accountId,
            'type' => $type,
        ]);
        $builder->whereIn('post_id', $ids);
        $result = ($builder->get())->getResultArray();
        $notComment = array_diff($ids, array_column($result,'post_id'));
        $notComment = array_values($notComment);
        if(count($notComment)==0) return null;
        $this->insert([
            'account_id'=>$accountId,
            'type'=>$type,
            'post_id'=>$notComment[0]
        ]);
        return $notComment[0];
    }
}