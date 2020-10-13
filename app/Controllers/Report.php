<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\FrameModel;
use App\Models\LenseModel;
use App\Models\OrderModel;
use App\Models\ItemModel;
use App\Models\UserModel;

class Report extends Controller{

	public function statistics_summary(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$data['admin_nav_item'] = "Report";

			$frameModel = new FrameModel();
	        $data['frame'] = $frameModel->orderBy('id', 'ASC')->findAll();

			$lenseModel = new LenseModel();
	        $data['lense'] = $lenseModel->orderBy('id', 'ASC')->findAll();

			$orderModel = new OrderModel();
	        $data['order'] = $orderModel->orderBy('id', 'ASC')->findAll();	

			$itemModel = new ItemModel();
	        $data['item'] = $itemModel->orderBy('id', 'ASC')->findAll();

	        $data['order_item_lense'] = $itemModel->test();

	        // $query = $itemModel->test1();
	        $query = $itemModel->lenseReport();
	        $data['lenseReport'] = $query->getResultArray();

	        $query1 = $itemModel->frameReport();
	        $data['frameReport'] = $query1->getResultArray();        

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-statistics_summary');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function view_user(){
 		session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
	        $data['admin_nav_item'] = "User Report";

			$userModel = new UserModel();
			$data['user'] = $userModel->orderBy('id', 'ASC')->findAll();

			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-user_report');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}	
	}

	public function view_user_report($user_id = null){
 		session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
		        $data['admin_nav_item'] = "User Report";
	
				$itemModel = new ItemModel();

				$userModel = new UserModel();
				$data['user'] = $userModel->where('id', $user_id)->first();

				$orderModel = new OrderModel();
				$data['totalOrder'] = $orderModel->where('user_id', $user_id)->findAll();

				$data['deliveredOrder'] = $orderModel->where('user_id', $user_id)->where('status', 3)->find();
				$data['confirmed_order'] = $orderModel->where('user_id', $user_id)->where('status', 2)->find();
				$data['paid_order'] = $orderModel->where('user_id', $user_id)->where('status', 1)->find();
				$data['not_paid_order'] = $orderModel->where('user_id', $user_id)->where('status', 0)->find();

	        	$q_delivered_frames = $itemModel->delivered_frames($user_id);
	       		$data['delivered_frames'] = $q_delivered_frames->getResultArray();

	       		// echo '<br/>';
	       		// echo $data['delivered_frames'][0]['delivered_frames'];

	        	$q_delivered_lenses = $itemModel->delivered_lenses($user_id);
	       		$data['delivered_lenses'] = $q_delivered_lenses->getResultArray();

	       		// echo '<br/>';
	       		// echo $data['delivered_lenses'][0]['delivered_lenses'];	 
	       		
	        	$q_tot_frames = $itemModel->tot_frames($user_id);
	       		$data['tot_frames'] = $q_tot_frames->getResultArray();

	       		// echo '<br/>';
	       		// echo $data['tot_frames'][0]['tot_frames'];	 

	        	$q_tot_lenses = $itemModel->tot_lenses($user_id);
	       		$data['tot_lenses'] = $q_tot_lenses->getResultArray();

	       		// echo '<br/>';
	       		// echo $data['tot_lenses'][0]['tot_lenses'];	 

	        	$q_amnt_frames = $itemModel->amnt_frames($user_id);
	       		$data['amnt_frames'] = $q_amnt_frames->getResultArray();

	       		// echo '<br/>';
	       		// echo $data['amnt_frames'][0]['amnt_frames'];	

	       		$q_amnt_lenses = $itemModel->amnt_lenses($user_id);
	       		$data['amnt_lenses'] = $q_amnt_lenses->getResultArray();

	       		// echo '<br/>';
	       		// echo $data['amnt_lenses'][0]['amnt_lenses'];	        			       			       		      		

				echo view('Templates/header');
				echo view('Templates/admin-nav', $data);
				return view('admin-view_user_report');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}			
	}

}