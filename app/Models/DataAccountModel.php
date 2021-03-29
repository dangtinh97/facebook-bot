<?php


namespace App\Models;


use CodeIgniter\Model;

class DataAccountModel extends Model
{
    protected $table = 'account_data';
    protected $allowedFields = ['type','data','account_id'];
}