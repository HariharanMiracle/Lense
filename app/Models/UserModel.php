<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class UserModel extends Model
{
    protected $table = 'user';

    protected $allowedFields = ['username', 'password', 'fname', 'lname', 'contact', 'dob', 'privilege', 'city','country', 'address', 'email', 'status', 'description', 'created_on'];
}