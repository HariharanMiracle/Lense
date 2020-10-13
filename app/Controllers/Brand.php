<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\BrandModel;

class Brand extends Controller{
	public function create(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Brand";
			
			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-create-brand');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function edit($brand_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new BrandModel();

	        $data['brand'] = $model->where('id', $brand_id)->first();
	        $data['admin_nav_item'] = "Brand";

	        echo view('Templates/header');
	        echo view('Templates/admin-nav', $data);
	        return view('admin-edit-brand', $data);
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}        
	}

	public function delete($brand_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){	
			$model = new BrandModel();
	        $data['brand'] = $model->where('id', $brand_id)->delete();

	        return redirect()->to(base_url('/AdminPanel/brand'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function search(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){

	        $data['admin_nav_item'] = "Brand";
			$model = new BrandModel();

			$search = $this->request->getVar('search');
			$data['brand'] = $model->like('name', $search)->orderBy('name', 'ASC')->find();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-brand');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function store(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new BrandModel();

			$data = [
	            'name' => $this->request->getVar('name'),
	            'description' => $this->request->getVar('desc'),
	        ];

	        $save = $model->insert($data);
	        return redirect()->to(base_url('/AdminPanel/brand'));	
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function update(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new BrandModel();
	        
	        $brand_id = $this->request->getVar('brand_id');
	        $data = [
	            'name' => $this->request->getVar('name'),
	            'description' => $this->request->getVar('desc'),
	        ];
	        $save = $model->update($brand_id, $data);
	        return redirect()->to(base_url('/AdminPanel/brand'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}
}