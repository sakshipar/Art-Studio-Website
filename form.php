<?php
 
if(isset($_POST['submit'])) {
 	$firstname = $_POST['firstname']; // required
    $lastname = $_POST['lastname']; // required
    $mailFrom = $_POST['email']; // required
    $subject = $_POST['subject']; // required

    $mailTo = "sparikh5911@student.elgin.edu";
    $headers = "From: ".$mailFrom;
 
    mail($mailTo, $subject, $headers);
	header("Location: index.php?mailsend");
		
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }

	 // validation expected data exists
 
    if(!isset($_POST['firstname']) ||
 
        !isset($_POST['lastname']) ||
 
        !isset($_POST['email']) ||
  
        !isset($_POST['subject'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $firstname = $_POST['firstname']; // required
 
    $lastname = $_POST['lastname']; // required
 
    $mailFrom = $_POST['email']; // required
  
    $subject = $_POST['subject']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$mailFrom)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$firstname)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$lastname)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($subject) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($firstname)."\n";
 
    $email_message .= "Last Name: ".clean_string($lastname)."\n";
 
    $email_message .= "Email: ".clean_string($mailFrom)."\n";
  
    $email_message .= "Subject: ".clean_string($subject)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$mailFrom."\r\n".
 
'Reply-To: '.$mailFrom."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($mailTo, $subject, $firstname, $headers);  
 
?>
 
<!-- include your own success html here -->
Thank you for contacting us! You will be hear back from us within the next 24 hours.
 