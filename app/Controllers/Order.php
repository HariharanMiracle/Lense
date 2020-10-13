<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\OrderModel;
use App\Models\ItemModel;
use App\Models\FrameModel;
use App\Models\LenseModel;
use App\Models\PrescriptionModel;
use App\Models\Shipping_typeModel;
use App\Models\Shipping_detailsModel;
use App\Models\Frame_imageModel;
use App\Models\BrandModel;
use App\Models\Frame_typeModel;
use App\Models\Lense_typeModel;
use App\Models\Lense_shadeModel;
use App\Models\PaymentModel;


class Order extends Controller{

	public function changeStatus(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$order_id = $this->request->getVar('order_id');
			$status = $this->request->getVar('order_status');

			$orderModel = new OrderModel();

	        $data = [
	            'status' => $status,
	        ];
	        $save = $orderModel->update($order_id, $data);
	        return redirect()->to(base_url('/AdminPanel/order'));				
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));			
		}	
	}

	public function view($order_id = null){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$userModel = new UserModel();
			$orderModel = new OrderModel();
			$itemModel = new ItemModel();
			$frameModel = new FrameModel();
			$lenseModel = new LenseModel();
			$prescriptionModel = new PrescriptionModel();
			$shipping_typeModel = new Shipping_typeModel();
			$shipping_detailsModel = new Shipping_detailsModel();
			$frame_imageModel = new Frame_imageModel();
			$brandModel = new BrandModel();
			$frame_typeModel = new Frame_typeModel();
			$lense_typeModel = new Lense_typeModel();
			$lense_shadeModel = new Lense_shadeModel();
			$paymentModel = new PaymentModel();

			$data['order'] = $orderModel->where('id', $order_id)->first();
			$data['user'] = $userModel->orderBy('id', 'ASC')->findAll();
			$data['item'] = $itemModel->orderBy('id', 'ASC')->findAll();
			$data['frame'] = $frameModel->orderBy('id', 'ASC')->findAll();
			$data['lense'] = $lenseModel->orderBy('id', 'ASC')->findAll();
			$data['prescription'] = $prescriptionModel->orderBy('id', 'ASC')->findAll();
			$data['shipping_type'] = $shipping_typeModel->orderBy('id', 'ASC')->findAll();
			$data['shipping_details'] = $shipping_detailsModel->orderBy('id', 'ASC')->findAll();
			$data['frame_image'] = $frame_imageModel->orderBy('id', 'ASC')->findAll();
			$data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();
			$data['frame_type'] = $frame_typeModel->orderBy('id', 'ASC')->findAll();
			$data['lense_type'] = $lense_typeModel->orderBy('id', 'ASC')->findAll();
			$data['lense_shade'] = $lense_shadeModel->orderBy('id', 'ASC')->findAll();
			$data['payment'] = $paymentModel->where('order_id', $order_id)->first();

			$data['admin_nav_item'] = "Order";
			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-view-order', $data);
		}	
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function search(){
		session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
			$userModel = new UserModel();
			$orderModel = new OrderModel();
			$itemModel = new ItemModel();
			$frameModel = new FrameModel();
			$lenseModel = new LenseModel();
			$prescriptionModel = new PrescriptionModel();
			$shipping_typeModel = new Shipping_typeModel();
			$shipping_detailsModel = new Shipping_detailsModel();
			$frame_imageModel = new Frame_imageModel();
			$brandModel = new BrandModel();
			$frame_typeModel = new Frame_typeModel();
			$lense_typeModel = new Lense_typeModel();

			$data['order'] = $orderModel->where('id', $this->request->getVar('search'))->first();
			$data['user'] = $userModel->orderBy('id', 'ASC')->findAll();
			$data['item'] = $itemModel->orderBy('id', 'ASC')->findAll();
			$data['frame'] = $frameModel->orderBy('id', 'ASC')->findAll();
			$data['lense'] = $lenseModel->orderBy('id', 'ASC')->findAll();
			$data['prescription'] = $prescriptionModel->orderBy('id', 'ASC')->findAll();
			$data['shipping_type'] = $shipping_typeModel->orderBy('id', 'ASC')->findAll();
			$data['shipping_details'] = $shipping_detailsModel->orderBy('id', 'ASC')->findAll();
			$data['frame_image'] = $frame_imageModel->orderBy('id', 'ASC')->findAll();
			$data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();
			$data['frame_type'] = $frame_typeModel->orderBy('id', 'ASC')->findAll();
			$data['lense_type'] = $lense_typeModel->orderBy('id', 'ASC')->findAll();

			$data['admin_nav_item'] = "Order";
			echo view('Templates/header');
			echo view('Templates/admin-nav', $data);
			return view('admin-view-order', $data);
		}	
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

}