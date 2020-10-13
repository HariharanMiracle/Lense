<?php namespace App\Controllers;
 
use CodeIgniter\Controller;

class Contact extends Controller{
	public function index(){
		 // Load Validation Service
        $validation =  \Config\Services::validation();
        // Load Email Service
        $email = \Config\Services::email();

        // $validation->setRules([
        //     // 'name' => 'required|min_length[4]|max_length[25]',
        //     // 'email' => 'required|valid_email|min_length[6]|max_length[60]',
        //     // 'subject' => 'required|min_length[5]|max_length[50]',
        //     'message' => 'required|min_length[12]|max_length[200]'
        // ]);

        // if ($validation->withRequest($this->request)->run() === FALSE) {
        //     echo 'False contact';
        // } else {
            // Read Form Data
            $name = $this->request->getVar('name');
            $fromemail = $this->request->getVar('email');
            $number = $this->request->getVar('number');
            $subject = $this->request->getVar('subject');
            $text = $this->request->getVar('message');
            $message = $text." --- phone number: ".$number;

            // Load Administrator Email
            $admin_email = "hariharansliit@gmail.com";
            
            // Set Email Properties
            $email->setFrom($fromemail,$name);
            $email->setTo($admin_email);
            $email->setSubject($subject);
            $email->setMessage($message);

            if ($email->send()) {
                $data['success'] = "Successfully sent message!";
				echo $data['success'];
				echo '<br/>';
            } else {
                echo $email->printDebugger();
                $data['error'] = "Failed to send message!";
				echo $data['error'];
				echo '<br/>';
            }

        // }

		echo "contact";
	}
}