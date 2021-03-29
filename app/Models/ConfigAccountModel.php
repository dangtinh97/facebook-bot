<?php


namespace App\Models;

use CodeIgniter\Model;

class ConfigAccountModel extends Model
{
    const FUNCTION=[
        'comment_group',
        'comment_new_feed',
        'comment_reaction_post'
    ];

    protected $table = 'account_configs';
    protected $allowedFields =[
      'status','type','status','account_id','run'
    ];
}