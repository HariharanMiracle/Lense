<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Frame_typeModel;
use App\Models\Lense_typeModel;
use App\Models\FrameModel;
use App\Models\LenseModel;
use App\Models\Frame_imageModel;
use App\Models\Front_imageModel;
use App\Models\Side_image_1Model;
use App\Models\Side_image_2Model;
use App\Models\BrandModel;
use App\Models\Shipping_typeModel;
use App\Models\UserModel;
use App\Models\OrderModel;
use App\Models\Lense_shadeModel;

class AdminPanel extends Controller{

	public function index(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "";
			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-dashboard');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function lense_shade(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Lense_shade";

			$model = new Lense_shadeModel();
	        $data['lense_shade'] = $model->orderBy('name', 'ASC')->findAll();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-lense_shade');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function frame_type(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Frame-Type";

			$model = new Frame_typeModel();
	        $data['frame_type'] = $model->orderBy('name', 'ASC')->findAll();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-frametype');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function lense_type(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Lense-Type";

			$model = new Lense_typeModel();
	        $data['lense_type'] = $model->orderBy('name', 'ASC')->findAll();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-lensetype');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}		
	}

	public function frame(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$front_imageModel = new Front_imageModel();
	        $data['front_image'] = $front_imageModel->orderBy('id', 'ASC')->findAll();

			$side_image_1Model = new Side_image_1Model();
	        $data['side_image_1'] = $side_image_1Model->orderBy('id', 'ASC')->findAll();

			$side_image_2Model = new Side_image_2Model();
	        $data['side_image_2'] = $side_image_2Model->orderBy('id', 'ASC')->findAll();

			$frameModel = new FrameModel();
	        $data['frame'] = $frameModel->orderBy('name', 'ASC')->findAll();

			$frame_type_model = new Frame_typeModel();
	        $data['frame_type'] = $frame_type_model->orderBy('name', 'ASC')->findAll();

	        $frame_image_model = new Frame_imageModel();
	        $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();

	        $brand_model = new BrandModel();
	        $data['brand'] = $brand_model->orderBy('id', 'ASC')->findAll();

			$data['admin_nav_item'] = "Frame";
			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-frame');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}			
	}

	public function lense(){
		session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Lense";

			$lense_model = new LenseModel();
	        $data['lense'] = $lense_model->orderBy('name', 'ASC')->findAll();

	        $lense_type_model = new Lense_typeModel();
	        $data['lense_type'] = $lense_type_model->orderBy('id', 'ASC')->findAll();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-lense');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}			
	}

	public function brand(){
		session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Brand";

			$brand_model = new BrandModel();
	        $data['brand'] = $brand_model->orderBy('name', 'ASC')->findAll();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-brand');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}			
	}

	public function shipping_type(){
		session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Shipping_type";

			$shipping_typeModel = new Shipping_typeModel();
	        $data['shipping_type'] = $shipping_typeModel->orderBy('id', 'ASC')->findAll();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-shipping_type');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}			
	}

	public function user(){
		session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "User";

			$userModel = new UserModel();
	        $data['user'] = $userModel->orderBy('id', 'ASC')->findAll();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-user');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}			
	}

	public function order(){
		session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Order";

			$userModel = new UserModel();
	        $data['user'] = $userModel->orderBy('id', 'ASC')->findAll();

	        $orderModel = new OrderModel();
	        $data['order'] = $orderModel->orderBy('id', 'DESC')->findAll();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-order');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

}