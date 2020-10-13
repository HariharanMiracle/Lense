<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\LenseModel;
use App\Models\Lense_typeModel;

class Lense extends Controller{
	public function create(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Lense";

			$model = new LenseModel();
			$lense_typeModel = new Lense_typeModel();

			$data['lense_type'] = $lense_typeModel->orderBy('id', 'ASC')->findAll();
			
			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-create-lense');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function edit($lense_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new LenseModel();
			$lense_typeModel = new Lense_typeModel();

			$data['lense_type'] = $lense_typeModel->orderBy('id', 'ASC')->findAll();
	        $data['lense'] = $model->where('id', $lense_id)->first();
	        $data['admin_nav_item'] = "Lense";

	        echo view('Templates/header');
	        echo view('Templates/admin-nav', $data);
	        return view('admin-edit-lense', $data);
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}        
	}

	public function delete($lense_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){	
			$model = new LenseModel();
	        $data['lense'] = $model->where('id', $lense_id)->delete();

	        return redirect()->to(base_url('/AdminPanel/lense'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function search(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){

	        $data['admin_nav_item'] = "Lense";
			$model = new LenseModel();

			$lense_type_model = new Lense_typeModel();
	        $data['lense_type'] = $lense_type_model->orderBy('id', 'ASC')->findAll();

			$search = $this->request->getVar('search');
			// $data['lense'] = $model->like('name', $search)->like('model', $search)->orderBy('name', 'ASC')->find();
			$data['lense'] = $model->like('name', $search)->orlike('model', $search)->orderBy('name', 'ASC')->find();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-lense');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function store(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new LenseModel();

			$data = [
	            'lensetype_id' => $this->request->getVar('lensetype_id'),
	            'model' => $this->request->getVar('model'),
	            'name' => $this->request->getVar('name'),
	            'description' => $this->request->getVar('description'),
	            // 'power' => $this->request->getVar('power'),
	            'price' => $this->request->getVar('price'),
	        ];

	        $save = $model->insert($data);
	        return redirect()->to(base_url('/AdminPanel/lense'));	
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function update(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new LenseModel();
	        
	        $lense_id = $this->request->getVar('lense_id');
	        $data = [
	        	'lensetype_id' => $this->request->getVar('lensetype_id'),
	            'model' => $this->request->getVar('model'),
	            'name' => $this->request->getVar('name'),
	            'description' => $this->request->getVar('description'),
	            // 'power' => $this->request->getVar('power'),
	            'price' => $this->request->getVar('price'),
	        ];
	        $save = $model->update($lense_id, $data);
	        return redirect()->to(base_url('/AdminPanel/lense'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}
}