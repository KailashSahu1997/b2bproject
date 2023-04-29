<?php

function sendOtp($mobile_number,$pin){
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.msg91.com/api/v5/otp?template_id=609b8e074bf678767f4264a0&mobile=91".$mobile_number."&authkey=360142ArwyUWEuT160923278P1&otp=".$pin."",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{\"Value1\":\"Param1\",\"Value2\":\"Param2\",\"Value3\":\"Param3\"}",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

	return true;	
}

function sendorderplace($mobile_number,$orderid,$amount){
	//$message="$name+Your+OTP+is+$otp";
	$message="Welcome+to+Ezzigrow.+Thank+You+For+Order.+your+Order+No+is+$orderid+Purchase+Amount+is+$amount";
	
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://login.smsozone.com/api/mt/SendSMS?user=eziigrow&password=eziigrow@7654321&senderid=SCHOOL&channel=Trans&DCS=0&flashsms=0&number=+91'.$mobile_number.'&text='.$message.'&route=2&PEID=0&DLTTemplateId=1',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic PEJhc2ljIEF1dGggVXNlcm5hbWU+OjxCYXNpYyBBdXRoIFBhc3N3b3JkPg=='
  ),
));

$response = curl_exec($curl);
//print_r($response);die;

curl_close($curl);
return true;	
}

function sendPushNotificationTo($token,$title,$body,$type ="android") {
        $server_key   ="AAAA2x_2sio:APA91bGVVxQ-W3ZIhyR9Ud9iYe1mNCNIWcpF0nvypmWqb-BuKem1-Vn7SVJ3DI9aew5bxmMA2ngGDcPQEZHp73vKd2eeRBrQ3iltpLmZx_lJIEUyTLialS4gXOLkZHEom58Rnchj4Q7Q";

        $path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';
       if($type == 'ios')
       {

            $fields = array(
            'to' => $token,
            //'data' =>$push_msg,
            'notification' => array(
                'title' => "GoWazir",
                'body'  => $body,
                'sound' => 'default',
                'icon'  => '',
              ),
            'priority' => 'high',
            'type'=>$type,
            'content_available' => true,
            );

        }
       
       else
       {
    $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
       }
       
        //
        $headers = array(
        'Authorization:key='.$server_key,
        'Content-Type:application/json'
        );  
        // Open connection  
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $path_to_firebase_cm);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayToSend));
        // Execute post  
        $result = curl_exec($ch);
        // Close connection      
        curl_close($ch);
        // print_r($result);die; 
        return true;
    }
 function send_to_email($to,$message,$subject)
    {
            // $subject = 'BizneX Login Credentials';
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: order@biznex.app'. "\r\n";
            $headers .= 'Cc:suresh.tripathi1981@gmail.com'. "\r\n";
            $headers .= 'Bcc:vrd@sunshineteam.in'. "\r\n";
            mail($to, $subject, $message, $headers);
   			return true;
    }


            function mail_attaced($details)
            {

                // print_r($details);die();
                // $data['name']=$_POST['name'];
                // $data['email']=$_POST['email'];
                // $data['mobile']=$_POST['mobile'];
                // $data['address']=$_POST['address'];
                // $data['cartItems'] = $this->cart->contents();
                $this->load->view('invoice',$data);

                $html = $this->output->get_output();

                 // Load pdf library
                $this->load->library('pdf');

                 // Load HTML content
                $this->dompdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation
                $this->dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
                $this->dompdf->render();

                // Output the generated PDF (1 = download and 0 = preview)
               // $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

                $file_name = md5(rand()) . '.pdf';
                $file = $this->dompdf->output();
                file_put_contents($file_name, $file);


                $config = Array(
                   'protocol'  => 'smtp',
                   'smtp_host' => 'smtp.gmail.com',
                   'smtp_port' => 587,
                   'smtp_user' => 'humconsultancynoreply@gmail.com', 
                   'smtp_pass' => 'zzgsjsygfewjbqge', 
                   'mailtype'  => 'html',
                   'charset'  => 'iso-8859-1',
                   'wordwrap'  => TRUE
               );
                $subject="ORDER INVOICE";
                $message="ORDER PLACE Successfull";
                $to="sahukailash110779@gmail.com";
                $from='info@pcianalytics.in';
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->attach($file_name);
                $this->email->send();
                unlink($file_name);
                return true;
                }




?>
