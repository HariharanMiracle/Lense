<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Shipping_detailsModel;
use App\Models\Shipping_typeModel;
use App\Models\OrderModel;
use App\Models\ItemModel;
use App\Models\PrescriptionModel;
use App\Models\FrameModel;

class Checkout extends Controller{

	public function index(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1){
			$shipping_detailsModel = new Shipping_detailsModel();
			$shipping_typeModel = new Shipping_typeModel();
			$orderModel = new OrderModel();
			$itemModel = new ItemModel();
			$prescriptionModel = new PrescriptionModel();


			// Save shipping details record
			$data = [
		        'shippingtype_id' => $this->request->getVar('shipping_type_id'),
		        'address' => $this->request->getVar('address'),
		        'status' => 1,
		    ];


		    // Get the id of the shipping details record
		    $shipping_details_id = $shipping_detailsModel->insert($data);


		    // Get the shipping type record
		    $data['shipping_type'] = $shipping_typeModel->where('id', $this->request->getVar('shipping_type_id'))->first();


		    // Initialize required fields to save order
		    $user_id_order = $_SESSION['user']['id'];
		    $total_amount_order = $data['shipping_type']['rate'] + $_SESSION['total'];


		    // Save order
		    $order = [
		    	'user_id' => $user_id_order,
		    	'shipping_id' => $shipping_details_id,
		    	'total' => $total_amount_order,
		    	'status' => 0,
		    	'order_date' => date("Y-m-d"),
		    ];

		    $order_id = $orderModel->insert($order);


		    // Loop to add item and prescription
		    foreach ($_SESSION['cart'] as $cartObj) {
		    	// Decrease frame stock count
		    	$frame_model = new FrameModel();
		    	
		    	$data1['temp_frame'] = $frame_model->where('id', $cartObj['frame_id'])->first();
		    	$stock = $data1['temp_frame']['stock'] - 1;

		    	$item2 = [
		    		'stock' => $stock,
		    	];

		    	$save = $frame_model->update($cartObj['frame_id'], $item2);

		    	// Add item
		    	$item = [
		    		'frame_id' => $cartObj['frame_id'],
		    		'lense_id' => $cartObj['lense_id'],
		    		'lense_shade_id' => $cartObj['lense_effect_id'],
		    		'order_id' => $order_id,
		    		'price' => $cartObj['this_price'],
		    	];

		    	$item_id = $itemModel->insert($item);


		    	// Add prescription
		    	$prescription = [
		    		'itemId' => $item_id,
		    		'LDSPH' => $cartObj['LDSPH'],
		    		'LDCLY' => $cartObj['LDCLY'],
		    		'LDAXIS' => $cartObj['LDAXIS'],
		    		'RDSPH' => $cartObj['RDSPH'],
		    		'RDCLY' => $cartObj['RDCLY'],
		    		'RDAXIS' => $cartObj['RDAXIS'],
		    		'LRSPH' => $cartObj['LRSPH'],
		    		'LRCLY' => $cartObj['LRCLY'],
		    		'LRAXIS' => $cartObj['LRAXIS'],
		    		'RRSPH' => $cartObj['RRSPH'],
		    		'RRCLY' => $cartObj['RRCLY'],
		    		'RRAXIS' => $cartObj['RRAXIS'],
		    		'prescription_p' => $cartObj['prescription'],
		    	];
		    	
		    	$item_id = $prescriptionModel->insert($prescription);
			}


			// Empty cart session
			$_SESSION['cart'] = array();
			$_SESSION['count'] = 0;
			$_SESSION['total'] = 0;


			// Redirect to payment
        	$_SESSION['p_order_id'] = $order_id;
        	$_SESSION['p_sub_total'] = $total_amount_order;
        	return redirect()->to(base_url('Payment/paymentForm'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));			
		}
	}

}