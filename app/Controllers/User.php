<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class User extends Controller
{

    public function search0(){
        session()->start();

        if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){

            $data['admin_nav_item'] = "User";
            $model = new UserModel();

            $search = $this->request->getVar('search');
            $data['user'] = $model->like('username', $search)->orLike('fname', $search)->orLike('lname', $search)->orderBy('name', 'ASC')->find();

            echo view('Templates/header');
            echo view('Templates/admin-nav', $data);
            return view('admin-user');
        }
        else{
            $_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
            return redirect()->to(base_url('Login/login_form'));
        }    
    }

    public function create0($user_id = null){
        session()->start();

        if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
            $data['admin_nav_item'] = "User";
            
            echo view('Templates/header');
            echo view('Templates/admin-nav', $data);
            return view('admin-create-user');            
        }
        else{
            $_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
            return redirect()->to(base_url('Login/login_form'));
        }

    }

    public function edit0($user_id = null){
        session()->start();

        if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
            $model = new UserModel();

            $data['user'] = $model->where('id', $user_id)->first();
            $data['admin_nav_item'] = "User";

            echo view('Templates/header');
            echo view('Templates/admin-nav', $data);
            return view('admin-edit-user', $data);
        }
        else{
            $_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
            return redirect()->to(base_url('Login/login_form'));
        }
    }

    public function update0(){
        session()->start();

        if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
             $model = new UserModel();
                $priv = $this->request->getVar('privilege');
                $stat = $this->request->getVar('status');

                $status = 0;
                $privilege = 0;

                if($stat == "Active"){
                    $status = 1;
                }
                else{
                    $status = 0;
                }

                if($priv == "Admin"){
                    $privilege = 1;
                }
                else{
                    $privilege = 2;
                }

                if($this->request->getVar('password') == ""){
                    $data = [
                            'username' => $this->request->getVar('username'),
                            // 'password'  => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                            'fname'  => $this->request->getVar('fname'),
                            'lname'  => $this->request->getVar('lname'),
                            'contact'  => $this->request->getVar('contact'),
                            'dob'  => $this->request->getVar('dob'),
                            'privilege'  => $privilege,
                            'status'  => $status,
                            'city'  => $this->request->getVar('city'),
                            'country'  => $this->request->getVar('country'),
                            'address'  => $this->request->getVar('address'),
                            'email'  => $this->request->getVar('email'),
                            'description'  => $this->request->getVar('description'),
                    ];
                    $user_id = $this->request->getVar('user_id');
                    if($user_id == ""){
                        return redirect()->to(base_url('AdminPanel/user'));
                    }
                    else{
                        $save = $model->update($user_id, $data); 
                        return redirect()->to(base_url('AdminPanel/user'));
                    }
                }
                else{
                    $data = [
                            'username' => $this->request->getVar('username'),
                            'password'  => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                            'fname'  => $this->request->getVar('fname'),
                            'lname'  => $this->request->getVar('lname'),
                            'contact'  => $this->request->getVar('contact'),
                            'dob'  => $this->request->getVar('dob'),
                            'privilege'  => $privilege,
                            'status'  => $status,
                            'city'  => $this->request->getVar('city'),
                            'country'  => $this->request->getVar('country'),
                            'address'  => $this->request->getVar('address'),
                            'email'  => $this->request->getVar('email'),
                            'description'  => $this->request->getVar('description'),
                    ];
                    $user_id = $this->request->getVar('user_id');
                    if($user_id == ""){
                        return redirect()->to(base_url('AdminPanel/user'));
                    }
                    else{
                        $save = $model->update($user_id, $data); 
                        return redirect()->to(base_url('AdminPanel/user'));
                    }
                }

        }
        else{
            $_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
            return redirect()->to(base_url('Login/login_form'));
        }
    }

    public function store0(){
        session()->start();

        if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1){
            echo 'store';
            $model = new UserModel();
            $user = $model->where('username', $this->request->getVar('username'))->first();
            if($user['username'] == ""){
                    echo 'username not taken';
                    $data = [
                        'username' => $this->request->getVar('username'),
                        'password'  => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                        'fname'  => $this->request->getVar('fname'),
                        'lname'  => $this->request->getVar('lname'),
                        'contact'  => $this->request->getVar('contact'),
                        'dob'  => $this->request->getVar('dob'),
                        'privilege'  => $this->request->getVar('privilege'),
                        'city'  => $this->request->getVar('city'),
                        'country'  => $this->request->getVar('country'),
                        'address'  => $this->request->getVar('address'),
                        'email'  => $this->request->getVar('email'),
                        'description'  => $this->request->getVar('description'),
                        'created_on'  => date("Y-m-d"),
                    ];
                    $save = $model->insert($data); 
                    return redirect()->to(base_url('AdminPanel/user'));                
                }
                else{
                    $data['userErrMsg'] = "Username already taken...";
                    echo view('Templates/header');
                    echo view('Templates/admin-nav', $data);
                    return view('admin-create-user');
                }
        }
        else{
            $_SESSION['login_msg'] = "Warning!!! Unauthorized access...";
            return redirect()->to(base_url('Login/login_form'));
        }
    }    
    /**
     * 
     */
    public function create()
    {
        echo view('Templates/header');
        return view('create-user');
    }
    
    // /**
    //  * 
    //  */
    public function store()
    {
                $modelUser = new UserModel();

                $user = $modelUser->where('username', $this->request->getVar('username'))->first();
                if($user['username'] == ""){
                    $data = [
                        'username' => $this->request->getVar('username'),
                        'password'  => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                        'fname'  => $this->request->getVar('fname'),
                        'lname'  => $this->request->getVar('lname'),
                        'contact'  => $this->request->getVar('contact'),
                        'dob'  => $this->request->getVar('dob'),
                        'privilege'  => 2,
                        'city'  => $this->request->getVar('city'),
                        'country'  => $this->request->getVar('country'),
                        'address'  => $this->request->getVar('address'),
                        'email'  => $this->request->getVar('email'),
                        'description'  => $this->request->getVar('description'),
                        'created_on'  => date("Y-m-d"),
                    ];
                    $save = $modelUser->insert($data);                    
                    // echo 'success ';
                    echo view('Templates/head');
                    echo view('home');
                    return view('Templates/footer');
                }
                else{
                    $data['userErrMsg'] = "Username already taken...";
                    echo view('Templates/header', $data);
                    return view('create-user');
                }
    }
    
    // /**
    //  * 
    //  */
    public function edit($user_id = null)
    {
        session()->start();
        
        if (isset($_SESSION)) {
            if ($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1) {
                $model = new UserModel();
                $data['user'] = $model->where('id', $user_id)->first();

                echo view('Templates/head1', $data);
                echo view('edit-user-2');
                return view('Templates/footer');
            }
            else{
                return redirect()->to(base_url('Login/login_form'));
            }
        }
    }

    public function update1()
    {
        session()->start();
        
        if (isset($_SESSION)) {
            if ($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1) {
                $model = new UserModel();
                $data = [
                    'username' => $this->request->getVar('username'),
                    'fname'  => $this->request->getVar('fname'),
                    'lname'  => $this->request->getVar('lname'),
                    'contact'  => $this->request->getVar('contact'),
                    'dob'  => $this->request->getVar('dob'),
                    'city'  => $this->request->getVar('city'),
                    'country'  => $this->request->getVar('country'),
                    'address'  => $this->request->getVar('address'),
                    'email'  => $this->request->getVar('email'),
                    'description'  => $this->request->getVar('description'),
                ];
                $user_id = $this->request->getVar('user_id');
                $save = $model->update($user_id, $data);
                return redirect()->to(base_url('Home'));
            }
            else{
                return redirect()->to(base_url('Login/login_form'));
            }
        }
    }
    
    public function delete($user_id = null)
    {
        session()->start();

        if (isset($_SESSION)) {
            if ($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 1 && $_SESSION['user']['status'] == 1) {
                $model = new UserModel();
                $data['user'] = $model->where('id', $user_id)->delete();

                return redirect()->to(base_url('AdminPanel/user'));
            }
            else{
                return redirect()->to(base_url('Login/login_form'));
            }
        }
        return redirect()->to(base_url('login'));
    }
}