<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class ItemModel extends Model
{
    protected $table = 'item';

    protected $allowedFields = ['frame_id', 'lense_id', 'order_id', 'price', 'lense_shade_id', 'power'];

    public function test(){
        // return $this->db->table('item');
        // return = $this->db->select('SELECT COUNT(*) FROM item GROUP BY lense_id', FALSE);
        // return 'hello';
        return $this->db->table('item')
        ->join('lense', 'item.lense_id = lense.id')
        ->join('order', 'order.id = item.order_id')
        ->get()->getResultArray();
    }

    public function test1(){
        $query = $this->db->query("select * from item where lense_id = 1");
        return $query;      
    }

    public function lenseReport(){
         $query = $this->db->query("select count(*) AS lense_count, l.`name` FROM item i, `order` o, lense l where i.`order_id` = o.`id` AND l.`id` = i.`lense_id` AND o.`status` = 3 GROUP BY i.`lense_id`");
         return $query;
    }

    public function frameReport(){
         $query = $this->db->query("select count(*) AS frame_count, f.`name` FROM item i, `order` o, frame f where i.`order_id` = o.`id` AND f.`id` = i.`frame_id` AND o.`status` = 3 GROUP BY i.`frame_id`");
         return $query;
    }

    public function delivered_frames($user_id){
        $query = $this->db->query("select COUNT(i.`frame_id`) AS 'delivered_frames' FROM `order` o, item i, frame f WHERE o.id = i.`order_id` AND f.id = i.`frame_id` AND o.user_id=".$user_id." AND o.`status` = 3 AND f.price != 0");
        return $query;
    } 

    public function delivered_lenses($user_id){
        $query = $this->db->query("select COUNT(i.`lense_id`) AS 'delivered_lenses' FROM `order` o, item i WHERE o.id = i.`order_id` AND o.user_id=".$user_id." AND o.`status` = 3");
        return $query;
    } 

    public function tot_frames($user_id){
        $query = $this->db->query("select COUNT(i.`frame_id`) AS 'tot_frames' FROM `order` o, item i, frame f WHERE o.id = i.`order_id` AND f.id = i.`frame_id` AND o.user_id=".$user_id." AND f.price != 0");
        return $query;
    } 

    public function tot_lenses($user_id){
        $query = $this->db->query("select COUNT(i.`lense_id`) AS 'tot_lenses' FROM `order` o, item i WHERE o.id = i.`order_id` AND o.user_id=".$user_id);
        return $query;
    } 

    public function amnt_frames($user_id){
        $query = $this->db->query("select SUM(f.price) AS 'amnt_frames' FROM `order` o, item i, frame f WHERE o.id = i.`order_id` AND i.`frame_id` = f.id AND o.user_id=".$user_id." AND o.`status` = 3");
        return $query;
    } 

    public function amnt_lenses($user_id){
        $query = $this->db->query("select SUM(l.price) AS 'amnt_lenses' FROM `order` o, item i, lense l WHERE o.id = i.`order_id` AND i.`lense_id` = l.id AND o.user_id=".$user_id." AND o.`status` = 3");
        return $query;
    }                 

    //     return $this->db->table('item')
    //     // ->join('lense', 'item.lense_id = lense.id')
    //     // ->join('order', 'order.id = item.order_id')
    //     ->query('SELECT COUNT(*), l.`name` FROM item i, `order` o, lense l WHERE i.`order_id` = o.`id` AND l.`id` = i.`lense_id` AND o.`status` = 3 GROUP BY i.`lense_id`')
    //     ->get()->getResultArray();
    // }
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
    }