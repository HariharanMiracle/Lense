<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class OrderModel extends Model
{
    protected $table = 'order';
  
  protected $allowedFields = ['user_id','shipping_id','total', 'status', 'order_date'];

    // protected $beforeInsert = ['beforeInsert'];
    // protected $beforeUpdate = ['beforeUpdate'];

    // protected function beforeInsert(array $data) {
    //     $data = $this->passwordHash($data);
    //     return $data;
    // }
    
    // protected function beforeUpdate(array $data) {
    //     if (isset($data['password'])) {
    //         $data = $this->passwordHash($data);
    //     }
    //     return $data;
    // }

    // protected function passwordHash(array $data) {
    //     if (isset($data['password'])) {
    //         $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    //     }

    //     return $data;
    // }
}
  