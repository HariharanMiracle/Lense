<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\PaymentModel;
use App\Models\OrderModel;

class Payment extends Controller{
	public function paymentForm(){
        session()->start();

        if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1 && $_SESSION['p_order_id'] != 0){
			echo view('Templates/head1');
			echo view('payment-form');
			return view('Templates/footer');
        }
		else if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1){
        	return redirect()->to(base_url('Home'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}

	public function index(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1){
			$model = new PaymentModel();
			$orderModel = new OrderModel();

			// Load Images
	        $validated = $this->validate([
	            'pic' => [
	                'uploaded[pic]',
	                'mime_in[pic,image/jpg,image/jpeg,image/gif,image/png]',
	                'max_size[pic,20000]',
	            ]
	        ]);
			
			if ($validated) {
	        	$featuredImg = $this->request->getFile('pic');
		        $fileName = $featuredImg->getRandomName();
		        $featuredImg->move(ROOTPATH . 'public/uploads/frameImage', $fileName);
			}

			$data = [
	            'order_id' => $_SESSION['p_order_id'],
				'type' => $this->request->getVar('type'),
	            'pic' => $fileName,
	            'sub-total' => $_SESSION['p_sub_total'],
	        ];
	        $save = $model->insert($data);

	        // order status change

			// $order = [
	  //           'status' => 1,
	  //       ];

	  //       $order_id = $orderModel->update($_SESSION['p_order_id'], $order);

	        return redirect()->to(base_url('Home'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}    
	}
}