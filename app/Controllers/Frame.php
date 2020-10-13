<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Frame_typeModel;
use App\Models\FrameModel;
use App\Models\Frame_imageModel;
use App\Models\Front_imageModel;
use App\Models\Side_image_1Model;
use App\Models\Side_image_2Model;
use App\Models\BrandModel;

class Frame extends Controller{
	public function search(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
	        $data['admin_nav_item'] = "Frame";
			
			$front_imageModel = new Front_imageModel();
	        $data['front_image'] = $front_imageModel->orderBy('id', 'ASC')->findAll();

			$side_image_1Model = new Side_image_1Model();
	        $data['side_image_1'] = $side_image_1Model->orderBy('id', 'ASC')->findAll();

			$side_image_2Model = new Side_image_2Model();
	        $data['side_image_2'] = $side_image_2Model->orderBy('id', 'ASC')->findAll();

			$frame_type_model = new Frame_typeModel();
	        $data['frame_type'] = $frame_type_model->orderBy('name', 'ASC')->findAll();

	        $frame_image_model = new Frame_imageModel();
	        $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();

	        $brand_model = new BrandModel();
	        $data['brand'] = $brand_model->orderBy('id', 'ASC')->findAll();

			$search = $this->request->getVar('search');
	        $frame_model = new FrameModel();
			$data['frame'] = $frame_model->like('name', $search)->orlike('model', $search)->orderBy('name', 'ASC')->find();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-frame');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function create(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Frame";

			$frame_type_model = new Frame_typeModel();

			$data['frame_type'] = $frame_type_model->orderBy('id', 'ASC')->findAll();

			$brand_model = new BrandModel();
	        $data['brand'] = $brand_model->orderBy('id', 'ASC')->findAll();
			
			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-create-frame');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function store(){
        session()->start();

	    if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
	        $data['admin_nav_item'] = "Frame";

			$front_imageModel = new Front_imageModel();
			$side_image_1Model = new Side_image_1Model();
			$side_image_2Model = new Side_image_2Model();

	    	$frame_model = new FrameModel();
	    	$frame_image_model = new Frame_imageModel();

			$data = [
	            'frametype_id' => $this->request->getVar('frametype_id'),
	            'model' => $this->request->getVar('model'),
	            'name' => $this->request->getVar('name'),
	            'description' => $this->request->getVar('description'),
	            'price' => $this->request->getVar('price'),
	            'type' => $this->request->getVar('type'),
	            'brand' => $this->request->getVar('brand_id'),
	            'stock' => $this->request->getVar('stock'),
	        ];

	        $save = $frame_model->insert($data);

	        // Get the last stored frame and search by frame model
	        $frameId = 0;
	        $data['frame'] = $frame_model->where('model', $this->request->getVar('model'))->orderBy('id', 'ASC')->findAll();
	        foreach ($data['frame'] as $frameObj) {
				$frameId = $frameObj['id'];        
	        }

			// Load Images
	        $validated = $this->validate([
	            'imagex' => [
	                'uploaded[imagex]',
	                'mime_in[imagex,image/jpg,image/jpeg,image/gif,image/png]',
	                'max_size[imagex,20000]',
	            ],

	            'side_view_1' => [
	                'uploaded[side_view_1]',
	                'mime_in[side_view_1,image/jpg,image/jpeg,image/gif,image/png]',
	                'max_size[side_view_1,20000]',
	            ],

	            'front_view' => [
	                'uploaded[front_view]',
	                'mime_in[front_view,image/jpg,image/jpeg,image/gif,image/png]',
	                'max_size[front_view,20000]',
	            ],

	            'side_view_2' => [
	                'uploaded[side_view_2]',
	                'mime_in[side_view_2,image/jpg,image/jpeg,image/gif,image/png]',
	                'max_size[side_view_2,20000]',
	            ]
	        ]);

	        if ($validated) {
	        	$featuredImg = $this->request->getFile('imagex');
		        $fileName = $featuredImg->getRandomName();
		        $featuredImg->move(ROOTPATH . 'public/uploads/frameImage', $fileName);

		        $featuredImg1 = $this->request->getFile('side_view_1');
		        $fileName1 = $featuredImg1->getRandomName();
		        $featuredImg1->move(ROOTPATH . 'public/uploads/frameImage', $fileName1);

		        $featuredImg2 = $this->request->getFile('front_view');
		        $fileName2 = $featuredImg2->getRandomName();
		        $featuredImg2->move(ROOTPATH . 'public/uploads/frameImage', $fileName2);

		        $featuredImg3 = $this->request->getFile('side_view_2');
		        $fileName3 = $featuredImg3->getRandomName();
		        $featuredImg3->move(ROOTPATH . 'public/uploads/frameImage', $fileName3);
	        }

			$dataImage = [
	            'frame_id' => $frameId,
	            'title' => $this->request->getVar('title'),
	            'alt' => $this->request->getVar('alt'),
	            'path' => $fileName,
	        ];

	        $sideImage1 = [
	            'frame_id' => $frameId,
	            'image_path' => $fileName1,
	            'alt' => $this->request->getVar('alt'),
	        ];

	        $sideImage2 = [
	            'frame_id' => $frameId,
	            'image_path' => $fileName3,
	            'alt' => $this->request->getVar('alt'),
	        ];

	        $frontImage = [
	            'frame_id' => $frameId,
	            'image_path' => $fileName2,
	            'alt' => $this->request->getVar('alt'),
	        ];	        	        

	        $save = $frame_image_model->insert($dataImage);

	        $save = $side_image_1Model->insert($sideImage1);
	        $save = $side_image_2Model->insert($sideImage2);
	        $save = $front_imageModel->insert($frontImage);

	        return redirect()->to(base_url('/AdminPanel/frame'));	
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}  
	}

	public function delete($frame_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$frame_model = new FrameModel();
	    	$frame_image_model = new Frame_imageModel();
			$front_imageModel = new Front_imageModel();
			$side_image_1Model = new Side_image_1Model();
			$side_image_2Model = new Side_image_2Model();

	        
			$data['frameImage'] = $frame_image_model->where('frame_id', $frame_id)->orderBy('id', 'ASC')->findAll();

			$data['front_image'] = $front_imageModel->where('frame_id', $frame_id)->orderBy('id', 'ASC')->findAll();
			$data['side_image_1'] = $side_image_1Model->where('frame_id', $frame_id)->orderBy('id', 'ASC')->findAll();
			$data['side_image_2'] = $side_image_2Model->where('frame_id', $frame_id)->orderBy('id', 'ASC')->findAll();
	        
	        foreach ($data['frameImage'] as $frameImageObj) {
	        	$data['frameImage'] = $frame_image_model->where('id', $frameImageObj['id'])->delete();
	        }

	        foreach ($data['front_image'] as $front_imageObj) {
	        	$data['front_image'] = $front_imageModel->where('id', $front_imageObj['id'])->delete();
	        }	        

	        foreach ($data['side_image_1'] as $side_image_1Obj) {
	        	$data['side_image_1'] = $side_image_1Model->where('id', $side_image_1Obj['id'])->delete();
	        }

	        foreach ($data['side_image_2'] as $side_image_2Obj) {
	        	$data['side_image_2'] = $side_image_2Model->where('id', $side_image_2Obj['id'])->delete();
	        }

	        $data['frame'] = $frame_model->where('id', $frame_id)->delete();

	        return redirect()->to(base_url('/AdminPanel/frame'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function edit($frame_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$frame_model = new FrameModel();
	    	$frame_image_model = new Frame_imageModel();
			$frame_type_model = new Frame_typeModel();

			$data['frame_type'] = $frame_type_model->orderBy('id', 'ASC')->findAll();
	        $data['frame'] = $frame_model->where('id', $frame_id)->first();
	        $data['frame_images'] = $frame_image_model->where('frame_id', $frame_id)->findAll();

			$brand_model = new BrandModel();
	        $data['brand'] = $brand_model->orderBy('id', 'ASC')->findAll();	        

	        foreach ($data['frame_images'] as $obj) {
				$data['frame_image'] = $obj;
	        }

	        $data['admin_nav_item'] = "Frame";

	        echo view('Templates/header');
	        echo view('Templates/admin-nav', $data);
	        return view('admin-edit-frame', $data);
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function update(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$frame_model = new FrameModel();
		    $frame_image_model = new Frame_imageModel();

		    $data = [
	            'frametype_id' => $this->request->getVar('frametype_id'),
	            'model' => $this->request->getVar('model'),
	            'name' => $this->request->getVar('name'),
	            'description' => $this->request->getVar('description'),
	            'price' => $this->request->getVar('price'),
	            'type' => $this->request->getVar('type'),
	            'brand' => $this->request->getVar('brand_id'),
	            'stock' => $this->request->getVar('stock'),
	    	];

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

		    	$dataImage = [
		            'title' => $this->request->getVar('title'),
		            'alt' => $this->request->getVar('alt'),
		            'path' => $fileName,
		        ];

		    	$save = $frame_image_model->update($this->request->getVar('frame_image_id'), $dataImage);
		    }
		    else{
		    	$dataImage = [
		            'title' => $this->request->getVar('title'),
		            'alt' => $this->request->getVar('alt'),
		        ];

		    	$save = $frame_image_model->update($this->request->getVar('frame_image_id'), $dataImage);
		    }

		    $save = $frame_model->update($this->request->getVar('frame_id'), $data);
	        return redirect()->to(base_url('/AdminPanel/frame'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}
}