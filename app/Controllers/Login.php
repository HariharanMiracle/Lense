<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Frame_typeModel;
use App\Models\FrameModel;
use App\Models\Frame_imageModel;
 
class Login extends Controller
{
    public function login_form(){
        session()->start();
        
        echo view('Templates/header');
        return view('login-form');
    }

    public function index(){
        session()->start();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $_SESSION['pw'] = $password;

		$modelUser = new UserModel();
        $user = $modelUser->where('username', $username)->first();

        if(password_verify($password, $user['password'])){
            if($user['status'] != 0){
                if($user['privilege'] == 1){
                    //Admin
                    $_SESSION['user'] = $user;
                    $_SESSION['isLoggedIn'] = 1;
                    $_SESSION['login_msg'] = "";

                    return redirect()->to(base_url('AdminPanel'));
                }
                else{
                    //User
                    $_SESSION['user'] = $user;
                    $_SESSION['isLoggedIn'] = 1;
                    $_SESSION['login_msg'] = "";

                    return redirect()->to(base_url('Home'));
                }
            }
            else{
                $_SESSION['isLoggedIn'] = 0;
                $_SESSION['login_msg'] = "Your account is deactivated! please contact the admin!!!";
                
                echo view('Templates/header');
                return view('login-form');
            }
        }
        else{
            $_SESSION['isLoggedIn'] = 0;
            $_SESSION['login_msg'] = "login invalid!!!";
            
            echo view('Templates/header');
            return view('login-form');
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url());
    }

    public function product(){
        session()->start();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $modelUser = new UserModel();
        $user = $modelUser->where('username', $username)->first();

        if(password_verify($password, $user['password'])){
            if($user['privilege'] == 1){
                //Admin
                $_SESSION['user'] = $user;
                $_SESSION['isLoggedIn'] = 1;
                $_SESSION['login_msg'] = "";

                return redirect()->to(base_url('AdminPanel'));
            }
            else{
                    $frameModel = new FrameModel();
                    $data['frame'] = $frameModel->orderBy('id', 'DESC')->findAll();

                    $frame_type_model = new Frame_typeModel();
                    $data['frame_type'] = $frame_type_model->orderBy('id', 'ASC')->findAll();

                    $frame_image_model = new Frame_imageModel();
                    $data['frame_image'] = $frame_image_model->orderBy('id', 'ASC')->findAll();

                    //User
                    $_SESSION['user'] = $user;
                    $_SESSION['isLoggedIn'] = 1;
                    $_SESSION['login_msg'] = "";

                    if($_SESSION['product'] == 0){
                        $_SESSION['product'] = 1;
                        return redirect()->to(base_url('ExploreGlasses/product/'.$_SESSION['product_id']));
                    }
            }
        }
        else{
            $_SESSION['isLoggedIn'] = 0;
            $_SESSION['login_msg'] = "login invalid!!!";
            
            echo view('Templates/header');
            return view('login-form');
        }
    }

    public function login_form1(){
        session()->start();
        
        echo view('Templates/header');
        return view('_login-form');
    }

    public function myProfile(){
        $data['nav_item'] = "myProfile";
        session()->start();
        
        if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['status'] == 1 && $_SESSION['user']['privilege'] == 2){
            echo view('Templates/head1', $data);
            echo view('myProfile');
            return view('Templates/footer');
        }
        else{
            $_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
            return redirect()->to(base_url('Login/login_form'));            
        }

    }

    public function deactivate(){
        session()->start();

        if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['status'] == 1 && $_SESSION['user']['privilege'] == 2){
            $userModel = new UserModel();
            $data = [
                'status' => 0,
            ];
            $save = $userModel->update($_SESSION['user']['id'], $data);
            return redirect()->to(base_url('Login/logout')); 
        }
        else{
            $_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
            return redirect()->to(base_url('Login/login_form')); 
        }
    }

    public function password_form(){
        session()->start();

        if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['status'] == 1 && $_SESSION['user']['privilege'] == 2){
            echo view('Templates/head1');
            echo view('password_form');
            return view('Templates/footer');
        }
        else{
            $_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
            return redirect()->to(base_url('Login/login_form')); 
        }
    }

    public function changePassword(){
        session()->start();

        if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['status'] == 1 && $_SESSION['user']['privilege'] == 2){
            $userModel = new UserModel();
            $data = [
                'password'  => password_hash($this->request->getVar('new_pw'),PASSWORD_DEFAULT),
            ];
            $save = $userModel->update($_SESSION['user']['id'], $data);

            return redirect()->to(base_url('Home')); 
        }
        else{
            $_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
            return redirect()->to(base_url('Login/login_form')); 
        }
    }
}