<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Frame_typeModel;

class Frame_Type extends Controller{
	public function create(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Frame-Type";

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-create-frametype');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function edit($frame_type_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Frame_typeModel();
	        $data['frame_type'] = $model->where('id', $frame_type_id)->first();
	        $data['admin_nav_item'] = "Frame-Type";

	        echo view('Templates/header');
	        echo view('Templates/admin-nav', $data);
	        return view('admin-edit-frame_type', $data);
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}        
	}

	public function delete($frame_type_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Frame_typeModel();
	        $data['frame_type'] = $model->where('id', $frame_type_id)->delete();

	        return redirect()->to(base_url('/AdminPanel/frame_type'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function search(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
	        $data['admin_nav_item'] = "Frame-Type";
			$model = new Frame_typeModel();

			$search = $this->request->getVar('search');
			$data['frame_type'] = $model->like('name', $search)->orderBy('name', 'ASC')->find();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-frametype');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function store(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Frame_typeModel();

			$data = [
	            'name' => $this->request->getVar('frame_type_name'),
	            'description' => $this->request->getVar('frame_type_desc'),
	        ];

	        $save = $model->insert($data);
	        return redirect()->to(base_url('/AdminPanel/frame_type'));	
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function update(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Frame_typeModel();
	        
	        $frame_type_id = $this->request->getVar('frame_type_id');
	        $data = [
	        	'name' => $this->request->getVar('frame_type_name'),
	            'description' => $this->request->getVar('frame_type_desc'),
	        ];
	        $save = $model->update($frame_type_id, $data);
	        return redirect()->to(base_url('/AdminPanel/frame_type'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}
}