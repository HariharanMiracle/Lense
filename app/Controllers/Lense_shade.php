<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Lense_shadeModel;

class Lense_shade extends Controller{
	public function create(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Lense_shade";
			
			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-create-lense_shade');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function edit($lense_shade_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Lense_shadeModel();

	        $data['lense_shade'] = $model->where('id', $lense_shade_id)->first();
	        $data['admin_nav_item'] = "Lense_shade";

	        echo view('Templates/header');
	        echo view('Templates/admin-nav', $data);
	        return view('admin-edit-lense_shade', $data);
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}        
	}

	public function delete($Lense_shade_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){	
			$model = new Lense_shadeModel();
	        $data['lense'] = $model->where('id', $Lense_shade_id)->delete();

	        return redirect()->to(base_url('/AdminPanel/lense_shade'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function search(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){

	        $data['admin_nav_item'] = "Lense_shade";
			$model = new Lense_shadeModel();

			$search = $this->request->getVar('search');
			$data['lense_shade'] = $model->like('name', $search)->orderBy('name', 'ASC')->find();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-lense_shade');
			echo 'search';
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function store(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			echo 'store';

			$model = new Lense_shadeModel();

			// Load Images
	        $validated = $this->validate([
	            'imagex' => [
	                'uploaded[imagex]',
	                'mime_in[imagex,image/jpg,image/jpeg,image/gif,image/png]',
	                'max_size[imagex,20000]',
	            ]
	        ]);

	        if ($validated) {
	        	$featuredImg = $this->request->getFile('imagex');
		        $fileName = $featuredImg->getRandomName();
		        $featuredImg->move(ROOTPATH . 'public/uploads/frameImage', $fileName);
	        
	        	$data = [
		            'name' => $this->request->getVar('name'),
		            'price' => $this->request->getVar('price'),
		            'path' => $fileName,
	        	];
	        }

	        $save = $model->insert($data);
	        return redirect()->to(base_url('/AdminPanel/lense_shade'));	
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function update(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$model = new Lense_shadeModel();
	        
	        $lense_shade_id = $this->request->getVar('lense_shade_id');

	        // Load Images
	        $validated = $this->validate([
	            'imagex' => [
	                'uploaded[imagex]',
	                'mime_in[imagex,image/jpg,image/jpeg,image/gif,image/png]',
	                'max_size[imagex,20000]',
	            ]
	        ]);

	        if ($validated) {
	        	$featuredImg = $this->request->getFile('imagex');
		        $fileName = $featuredImg->getRandomName();
		        $featuredImg->move(ROOTPATH . 'public/uploads/frameImage', $fileName);
	        
		        $data = [
		            'name' => $this->request->getVar('name'),
		            'price' => $this->request->getVar('price'),
		        	'path' => $fileName,
		        ];

	        	$save = $model->update($lense_shade_id, $data);
	        	return redirect()->to(base_url('/AdminPanel/lense_shade'));
	        }
	        else{
				$data = [
		            'name' => $this->request->getVar('name'),
		            'price' => $this->request->getVar('price'),
		        ];

		        $save = $model->update($lense_shade_id, $data);
	        	return redirect()->to(base_url('/AdminPanel/lense_shade'));
	        }
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}
}