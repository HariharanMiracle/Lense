<?php namespace App\Controllers;
use App\Models\Frame_typeModel;
use App\Models\FrameModel;
use App\Models\Frame_imageModel;
use App\Models\BrandModel;

class Home extends BaseController
{
	public function index(){
        session()->start();
		
		$data['nav_item'] = "Home";

		$frameModel = new FrameModel();
	    $data['frame'] = $frameModel->orderBy('id', 'DESC')->findAll();

		$frame_type_model = new Frame_typeModel();
	    $data['frame_type'] = $frame_type_model->orderBy('id', 'ASC')->findAll();

	    $frame_image_model = new Frame_imageModel();
	    $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();

		$brandModel = new BrandModel();
	    $data['brand'] = $brandModel->orderBy('id', 'ASC')->findAll();

		echo view('Templates/head', $data);
		echo view('home');
		return view('Templates/footer');
	}

	//--------------------------------------------------------------------

}
