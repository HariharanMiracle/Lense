<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\FrameModel;
use App\Models\LenseModel;
use App\Models\Shipping_typeModel;
use App\Models\Lense_shadeModel;

class Cart extends Controller{
	public function addItem(){
        session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1){
			
			$frame_id = $this->request->getVar('frame_id');
			$lense_id = $this->request->getVar('lense_id');
			$lense_effect = explode(" ", $this->request->getVar('lense_shade_id'));
			$this_price = $this->request->getVar('totalPriceInput');

			$LDSPH = $this->request->getVar('LDSPH');
			$LDCLY = $this->request->getVar('LDCLY');
			$LDAXIS = $this->request->getVar('LDAXIS');

			$RDSPH = $this->request->getVar('RDSPH');
			$RDCLY = $this->request->getVar('RDCLY');
			$RDAXIS = $this->request->getVar('RDAXIS');

			$LRSPH = $this->request->getVar('LRSPH');
			$LRCLY = $this->request->getVar('LRCLY');
			$LRAXIS = $this->request->getVar('LRAXIS');

			$RRSPH = $this->request->getVar('RRSPH');
			$RRCLY = $this->request->getVar('RRCLY');
			$RRAXIS = $this->request->getVar('RRAXIS');

			$lense_effect_id = $lense_effect[0];

			// Load Images
			$fileName = "";
	        $validated = $this->validate([
	            'prescription' => [
	                'uploaded[prescription]',
	                'mime_in[prescription,image/jpg,image/jpeg,image/gif,image/png]',
	                'max_size[prescription,20000]',
	            ]
	        ]);

	        if ($validated) {
	        	$featuredImg = $this->request->getFile('prescription');
		        $fileName = $featuredImg->getRandomName();
		        $featuredImg->move(ROOTPATH . 'public/uploads/frameImage', $fileName);
		    }

			if(isset($_SESSION['cart'])){
				$count = count($_SESSION['cart']);
				$item_array = array(
					'id' => $count,
					'frame_id' => $frame_id,
					'lense_id' => $lense_id,
					'lense_effect_id' => $lense_effect_id,
					'this_price' => $this_price,
					'LDSPH' => $LDSPH,
					'LDCLY' => $LDCLY,
					'LDAXIS' => $LDAXIS,
					'RDSPH' => $RDSPH,
					'RDCLY' => $RDCLY,
					'RDAXIS' => $RDAXIS,
					'LRSPH' => $LRSPH,
					'LRCLY' => $LRCLY,
					'LRAXIS' => $LRAXIS,
					'RRSPH' => $RRSPH,
					'RRCLY' => $RRCLY,
					'RRAXIS' => $RRAXIS,
					'prescription' => $fileName
				);
				$_SESSION['cart'][$count] = $item_array;

				$total = 0;
				$_SESSION['count'] = $count + 1;
				foreach ($_SESSION['cart'] as $obj) {
					$total += $obj['this_price'];
				}
				$_SESSION['total'] = $total;			
			}
			else{
				$item_array = array(
					'id' => 0,
					'frame_id' => $frame_id,
					'lense_id' => $lense_id,
					'lense_effect_id' => $lense_effect_id,
					'this_price' => $this_price,
					'LDSPH' => $LDSPH,
					'LDCLY' => $LDCLY,
					'LDAXIS' => $LDAXIS,
					'RDSPH' => $RDSPH,
					'RDCLY' => $RDCLY,
					'RDAXIS' => $RDAXIS,
					'LRSPH' => $LRSPH,
					'LRCLY' => $LRCLY,
					'LRAXIS' => $LRAXIS,
					'RRSPH' => $RRSPH,
					'RRCLY' => $RRCLY,
					'RRAXIS' => $RRAXIS,
					'prescription' => $fileName
				);
				$_SESSION['cart'][0] = $item_array;

				$_SESSION['count'] = 1;			
				$_SESSION['total'] = $this_price;	

				$count = count($_SESSION['cart']);
			}

			return redirect()->to(base_url('Home'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}		
	}

	public function view_cart(){
        session()->start();

		$data['nav_item'] = "Cart";

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1){
		    $frameModel = new FrameModel();
		    $data['frame'] = $frameModel->orderBy('id', 'ASC')->findAll();	

			$lenseModel = new LenseModel();
		    $data['lense'] = $lenseModel->orderBy('id', 'ASC')->findAll();

		    $lense_shadeModel = new Lense_shadeModel();
		    $data['lense_shade'] = $lense_shadeModel->orderBy('id', 'ASC')->findAll();

			echo view('Templates/head1', $data);
			echo view('cart');
			return view('Templates/footer');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));			
		}
	}

	public function checkout(){
        session()->start();
		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1){
			$shipping_typeModel = new Shipping_typeModel();
			$data['shipping_type'] = $shipping_typeModel->orderBy('id', 'ASC')->findAll();

			echo view('Templates/head1', $data);
			echo view('shipping-details');
			return view('Templates/footer');
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}

	public function remove($cart_item_id){
		session()->start();

		if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1){
			$_SESSION['total'] = $_SESSION['total'] - $_SESSION['cart'][$cart_item_id]['this_price'];
			$_SESSION['count']--;			
			unset($_SESSION['cart'][$cart_item_id]);
        	return redirect()->to(base_url('Cart/view_cart'));
		}
		else{
			$_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
        	return redirect()->to(base_url('Login/login_form'));
		}
	}
	
}