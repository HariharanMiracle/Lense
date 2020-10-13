<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Front_imageModel extends Model
{
    protected $table = 'front_image';

    protected $allowedFields = ['frame_id','image_path','alt'];

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