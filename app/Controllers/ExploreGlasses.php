<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Frame_typeModel;
use App\Models\FrameModel;
use App\Models\Frame_imageModel;
use App\Models\BrandModel;
use App\Models\Front_imageModel;
use App\Models\Side_image_1Model;
use App\Models\Side_image_2Model;
use App\Models\LenseModel;
use App\Models\Lense_typeModel;
use App\Models\Lense_shadeModel;

class ExploreGlasses extends Controller{
	public function ownFrame(){
		session()->start();

		$data['nav_item'] = "OwnFrame";

		// Show all Men glasses
		$frame_type_model = new Frame_typeModel();
	    $data['frame_type'] = $frame_type_model->orderBy('name', 'ASC')->findAll();

	    $frame_image_model = new Frame_imageModel();
	    $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();
	
		$frame_model = new FrameModel();
		$data['frame'] = $frame_model->where('price', 0)->orderBy('id', 'DESC')->findAll();

		$brandModel = new BrandModel();
	    $data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();		

		echo view('Templates/head1', $data);
		echo view('explore');
		return view('Templates/footer');
	}
	
	public function men(){
        session()->start();

		$data['nav_item'] = "Men";

		// Show all Men glasses
		$frame_type_model = new Frame_typeModel();
	    $data['frame_type'] = $frame_type_model->orderBy('name', 'ASC')->findAll();

	    $frame_image_model = new Frame_imageModel();
	    $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();
	
		$frame_model = new FrameModel();
		$data['frame'] = $frame_model->where('type', 1)->orderBy('id', 'DESC')->findAll();

		$brandModel = new BrandModel();
	    $data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();		

		echo view('Templates/head1', $data);
		echo view('explore');
		return view('Templates/footer');
	}

	public function women(){
        session()->start();

		$data['nav_item'] = "Women";
		
		// Show all Women glasses
		$frame_type_model = new Frame_typeModel();
	    $data['frame_type'] = $frame_type_model->orderBy('name', 'ASC')->findAll();

	    $frame_image_model = new Frame_imageModel();
	    $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();
	
		$frame_model = new FrameModel();
		$data['frame'] = $frame_model->where('type', 0)->orderBy('id', 'DESC')->findAll();

		$brandModel = new BrandModel();
	    $data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();		

		echo view('Templates/head1', $data);
		echo view('explore');
		return view('Templates/footer');
	}

	public function kids(){
        session()->start();

		$data['nav_item'] = "Kids";
		
		// Show all Kids glasses
		$frame_type_model = new Frame_typeModel();
	    $data['frame_type'] = $frame_type_model->orderBy('name', 'ASC')->findAll();

	    $frame_image_model = new Frame_imageModel();
	    $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();
	
		$frame_model = new FrameModel();
		$data['frame'] = $frame_model->where('type', 3)->orderBy('id', 'DESC')->findAll();

		$brandModel = new BrandModel();
	    $data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();		

		echo view('Templates/head1', $data);
		echo view('explore');
		return view('Templates/footer');
	}

	public function unisex(){
        session()->start();

		$data['nav_item'] = "Uni-sex";
		
		// Show all Uni-sex glasses
		$frame_type_model = new Frame_typeModel();
	    $data['frame_type'] = $frame_type_model->orderBy('name', 'ASC')->findAll();

	    $frame_image_model = new Frame_imageModel();
	    $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();
	
		$frame_model = new FrameModel();
		$data['frame'] = $frame_model->where('type', 2)->orderBy('id', 'DESC')->findAll();

		$brandModel = new BrandModel();
	    $data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();		

		echo view('Templates/head1', $data);
		echo view('explore');
		return view('Templates/footer');
	}			

	public function index(){
        session()->start();

		// Show all the glasses
		$frame_type_model = new Frame_typeModel();
	    $data['frame_type'] = $frame_type_model->orderBy('name', 'ASC')->findAll();

	    $frame_image_model = new Frame_imageModel();
	    $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();
	
		$frame_model = new FrameModel();
		$data['frame'] = $frame_model->orderBy('id', 'DESC')->findAll();

		$brandModel = new BrandModel();
	    $data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();		

		$data['nav_item'] = "Explore";

		echo view('Templates/head1', $data);
		echo view('explore');
		return view('Templates/footer');
	}

	public function search(){
        session()->start();

		$data['nav_item'] = "Explore";
		
		$glass_name = $this->request->getVar('glass_name');
		$brand = $this->request->getVar('brand');
		$frame_type = $this->request->getVar('frame_type');
		$gender = $this->request->getVar('gender');
		$from_price = $this->request->getVar('from_price');
		$to_price = $this->request->getVar('to_price');



		// Extraction related to frame
		$frame_model = new FrameModel();
		$data['frame1'] = $frame_model->like('name', $glass_name)->orderBy('id', 'DESC')->findAll();

		// Extraction related to brand
		$data['frame2']=array();
		if($brand != 0){
			foreach ($data['frame1'] as $obj) {
				if($obj['brand'] == $brand){
					array_push($data['frame2'], $obj);
				}
			}
		}
		else{
			$data['frame2'] = $data['frame1'];
		}

		// Extraction related to frame_type
		$data['frame3']=array();
		if($frame_type != 0){
			foreach ($data['frame2'] as $obj) {
				if($obj['frametype_id'] == $frame_type){
					array_push($data['frame3'], $obj);
				}
			}
		}
		else{
			$data['frame3'] = $data['frame2'];
		}

		// Extraction related to gender
		$data['frame4']=array();
		if($gender != -1){
			foreach ($data['frame3'] as $obj) {
				if($obj['type'] == $gender){
					array_push($data['frame4'], $obj);
				}
			}
		}
		else{
			$data['frame4'] = $data['frame3'];
		}

		// Extraction related to from_price, to_price
		$data['frame5']=array();
		if($from_price == "" && $to_price == ""){
			$data['frame5'] = $data['frame4'];
		}
		else if($from_price == "" && $to_price != ""){
			foreach ($data['frame4'] as $obj) {
				if($obj['price'] >= 0 && $obj['price'] <= $to_price){
					array_push($data['frame5'], $obj);
				}
			}
		}
		else if($from_price != "" && $to_price == ""){
			foreach ($data['frame4'] as $obj) {
				if($obj['price'] >= $from_price){
					array_push($data['frame5'], $obj);
				}
			}
		}
		else{
			foreach ($data['frame4'] as $obj) {
				if($obj['price'] >= $from_price && $obj['price'] <= $to_price){
					array_push($data['frame5'], $obj);
				}
			}
		}

		$data['frame'] = $data['frame5'];

		$frame_type_model = new Frame_typeModel();
	    $data['frame_type'] = $frame_type_model->orderBy('name', 'ASC')->findAll();

	    $frame_image_model = new Frame_imageModel();
	    $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();

		$brandModel = new BrandModel();
	    $data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();		

		echo view('Templates/head1', $data);
		echo view('explore');
		return view('Templates/footer');
	}

	public function product($glass_id){
        session()->start();
        
		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1){
			$data['nav_item'] = "Explore";

		    $frameModel = new FrameModel();
		    $data['frame'] = $frameModel->where('id', $glass_id)->first();	

			$frame_type_model = new Frame_typeModel();
		    $data['frame_type'] = $frame_type_model->orderBy('id', 'ASC')->findAll();

			$frame_imageModel = new Frame_imageModel();
		    $data['frame_image'] = $frame_imageModel->orderBy('id', 'ASC')->findAll();

		    $brandModel = new BrandModel();
		    $data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();	

			$front_imageModel = new Front_imageModel();
		    $data['front_image'] = $front_imageModel->orderBy('id', 'ASC')->findAll();

		    $side_image_1Model = new Side_image_1Model();
		    $data['side_image_1'] = $side_image_1Model->orderBy('id', 'ASC')->findAll();	

			$side_image_2Model = new Side_image_2Model();
		    $data['side_image_2'] = $side_image_2Model->orderBy('id', 'ASC')->findAll();

		    $lenseModel = new LenseModel();
		    $data['lense'] = $lenseModel->orderBy('id', 'ASC')->findAll();

		    $lense_typeModel = new Lense_typeModel();
		    $data['lense_type'] = $lense_typeModel->orderBy('id', 'ASC')->findAll();

		    
		    $lense_shadeModel = new Lense_shadeModel();
		    $data['lense_shade'] = $lense_shadeModel->orderBy('id', 'ASC')->findAll();
		    	
		        	    
			echo view('Templates/head1', $data);
			echo view('product-glass');
			return view('Templates/footer');
		}
		else{
			$_SESSION['product'] = 0;
			$_SESSION['product_id'] = $glass_id;
        	return redirect()->to(base_url('Login/login_form1'));
		}

	}
}