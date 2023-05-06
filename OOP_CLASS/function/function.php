<?php
function current_url()
{
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	{
		$url = "https://";
	}      
	else {
		$url = "http://";   
	} 
    // Append the host(domain name, ip) to the URL.   
	$url.= $_SERVER['HTTP_HOST'];      
    // Append the requested resource location to the URL   
    //$url.= $_SERVER['REQUEST_URI'];
	$url .=$_SERVER["PHP_SELF"];    

	return $url;
}

function redirect($page)
{
	header('location:'.$page.'');
    //echo "<script>window.location='".$page."'</script>";
	exit;
}

function root()
{
      // return "http://neotrionet.com/demo/Neuromax/";
	return "http://localhost/online%20course/";
}

function pre($arr)
{
	echo "<pre>";
	print_r($arr);
}

function clean_data($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function img_upload($tmp_file,$path,$image)
{
    return move_uploaded_file($tmp_file,$path.$image);
}

function send_email($receiver_email,$subject,$message)
{
      $mail = new PHPMailer;

      $mail->IsSMTP();

      $mail->Host = 'smtp.gmail.com';

      $mail->Port = '587';

      $mail->SMTPAuth = true;

      $mail->Username = 'swarnakarr34@gmail.com';

      $mail->Password = 'Software@!123';

      $mail->SMTPSecure = 'tls';

      $mail->From = 'info@Codewithbapi.info';

      $mail->FromName = 'info@Codewithbapi.info';

      $mail->AddAddress($receiver_email, '');

      $mail->IsHTML(true);

      $mail->Subject = $subject;

      $mail->Body = $message;

      //$mail->AddEmbeddedImage('first.png','apple');

      if($mail->Send())
      {
        return true;
      }
      else
      {
        return "{$mail->ErrorInfo}";
      }
        
}

function send_sms($numbers,$message)
{
  // Account details
    $apiKey = urlencode('NjYzOTczNjQzNDYzNmE2NzcxNzIzNTM0NTEzOTc1MzI= ');
    // Message details
    $numbers = array($numbers);
    $sender = urlencode('TXTLCL');
    $message = rawurlencode($message);
     
    $numbers = implode(',', $numbers);
     
    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
    // Send the POST request with cURL
    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    // Process your response here
    echo $response;

}

function random_userid()
{
   return date('dmYhis');
}

function random_password() {
      return 123;
    // $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    // $pass = array(); //remember to declare $pass as an array
    // $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    // for ($i = 0; $i < 8; $i++) {
    //     $n = rand(0, $alphaLength);
    //     $pass[] = $alphabet[$n];
    // }
    //  return implode($pass); //turn the array into a string
}


function getstring($value)
{
  //$data = preg_replace('/[^p{L}\p{N}\s]/u','',$value);
  $output = str_replace(" ","-",$value);
  return $output;
}

function security($page_name,$path)
{
  return unlink($path.$page_name);
}

// echo send_sms('6295283474','Hi there, thank you for sending your first test message from Textlocal. See how you can send effective SMS campaigns here: https://tx.gl/r/2nGVj/');

?>