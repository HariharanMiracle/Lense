<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Lense_typeModel;

class Lense_Type extends Controller{
	public function create(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Lense-Type";

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-create-lensetype');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function edit($lense_type_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Lense_typeModel();
	        $data['lense_type'] = $model->where('id', $lense_type_id)->first();
	        $data['admin_nav_item'] = "Lense-Type";

	        echo view('Templates/header');
	        echo view('Templates/admin-nav', $data);
	        return view('admin-edit-lense_type', $data);
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}        
	}

	public function delete($lense_type_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Lense_typeModel();
	        $data['lense_type'] = $model->where('id', $lense_type_id)->delete();

	        return redirect()->to(base_url('/AdminPanel/lense_type'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function search(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
	        $data['admin_nav_item'] = "Lense-Type";
			$model = new Lense_typeModel();

			$search = $this->request->getVar('search');
			$data['lense_type'] = $model->like('name', $search)->orderBy('name', 'ASC')->find();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-lensetype');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function store(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Lense_typeModel();

			$data = [
	            'name' => $this->request->getVar('lense_type_name'),
	            'description' => $this->request->getVar('lense_type_desc'),
	        ];

	        $save = $model->insert($data);
	        return redirect()->to(base_url('/AdminPanel/lense_type'));	
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function update(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Lense_typeModel();
	        
	        $lense_type_id = $this->request->getVar('lense_type_id');
	        $data = [
	        	'name' => $this->request->getVar('lense_type_name'),
	            'description' => $this->request->getVar('lense_type_desc'),
	        ];
	        $save = $model->update($lense_type_id, $data);
	        return redirect()->to(base_url('/AdminPanel/lense_type'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}
}