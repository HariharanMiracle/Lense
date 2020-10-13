<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Shipping_typeModel;

class Shipping_type extends Controller{
	public function create(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Shipping_type";
			
			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-create-shipping_type');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function edit($shipping_type_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Shipping_typeModel();

	        $data['shipping_type'] = $model->where('id', $shipping_type_id)->first();
	        $data['admin_nav_item'] = "Shipping_type";

	        echo view('Templates/header');
	        echo view('Templates/admin-nav', $data);
	        return view('admin-edit-shipping_type', $data);
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}        
	}

	public function delete($shipping_type_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){	
			$model = new Shipping_typeModel();
	        $data['shipping_type'] = $model->where('id', $shipping_type_id)->delete();

	        return redirect()->to(base_url('/AdminPanel/shipping_type'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function search(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){

	        $data['admin_nav_item'] = "Shipping_type";
			$model = new Shipping_typeModel();

			$search = $this->request->getVar('search');
			$data['shipping_type'] = $model->like('type', $search)->orderBy('id', 'ASC')->find();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-shipping_type');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function store(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Shipping_typeModel();

			$data = [
	            'type' => $this->request->getVar('type'),
	            'rate' => $this->request->getVar('rate'),
	        ];

	        $save = $model->insert($data);
	        return redirect()->to(base_url('/AdminPanel/shipping_type'));	
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function update(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Shipping_typeModel();
	        
	        $shipping_type_id = $this->request->getVar('shipping_type_id');
	        $data = [
	            'type' => $this->request->getVar('type'),
	            'rate' => $this->request->getVar('rate'),
	        ];
	        $save = $model->update($shipping_type_id, $data);
	        return redirect()->to(base_url('/AdminPanel/Shipping_type'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}
}

?>