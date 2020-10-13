<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class PrescriptionModel extends Model
{
    protected $table = 'prescription';

    protected $allowedFields = ['itemId', 'LDSPH', 'LDCLY', 'LDAXIS', 'RDSPH', 'RDCLY', 'RDAXIS', 'LRSPH', 'LRCLY', 'LRAXIS', 'RRSPH', 'RRCLY', 'RRAXIS', 'prescription_p'];

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