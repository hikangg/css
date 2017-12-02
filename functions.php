<?php 
session_start();

if(empty($_GET['success'])) {
	unset($_SESSION['mk-success']);
}

// debug function
function debug($s) {
	echo '<pre>'.print_r($s,true).'</pre>';
}

// get current URL
function currentURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
}

function slug($string, $replacement = '-') {
		$quotedReplacement = preg_quote($replacement, '/');

		$merge = array(
			'/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
			'/\\s+/' => $replacement,
			sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
		);

		$map = $merge;
		return preg_replace(array_keys($map), array_values($map), $string);
}

class MinikitContact {
	// errors
	public $errors = array();
	public $is_spam = false;
	public $to = 'lb@alphatranslationservices.com';
	public $subject = 'Translation Estimate Request';
	public $success;
	public $atts = array();
	
	function __construct() {
		// validate form
		$this->validate();
		
		// check validation errors errors
		if(!empty($this->errors)) {
			// set errors session
			$_SESSION['mk-validation-errors'] = $this->errors;
			
			// stop execution
			return false;
		}
		
		// fill success url
		$this->success = !empty($this->atts['success'])?$this->atts['success']:currentURL();
		
		// send email
		$this->send_email();
	}
	
	function validate() {
		// check name
		if(empty($_POST['client-name'])) {
			$this->errors['client-name'] = 'Please enter your name';
		}
		// check name
		if(empty($_POST['client-phone'])) {
			$this->errors['client-phone'] = 'Please enter phone number';
		}
		// check email
		if(!filter_var($_POST['client-email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['client-email'] = 'Please enter a valid email address';
		}
		// check name
		if(empty($_POST['client-deadline'])) {
			$this->errors['client-deadline'] = 'Please enter the project deadline';
		}
		
		// check spam bait field, if field is SPAM
		if(!empty($_POST['url'])) {
			$this->is_spam = true;
		}
	}
	
	function send_email() {
		if(!$this->is_spam) {
			$content = "From: ".$_POST['client-name']."\r\nEmail: ".$_POST['client-email']."\r\nPhone: ".$_POST['client-phone']."\r\n\r\nProject: ".$_POST['client-project']."\r\nDeadline: ".$_POST['client-deadline']."\r\nTranslate from: ".$_POST['client-language-from']."\r\nTranslate to: ".$_POST['client-language-to']."\r\n";
			$headers = 'From: ' . $_POST['client-name'] . ' <' . $_POST['client-email'] . '>' . "\r\n" . 'Reply-To: ' . $_POST['client-email'];
			// send email
			mail($this->to, $this->subject, $content, $headers);
		}
		// success
		$_SESSION['mk-success'] = true;
		
		// redirect
		header('Location: '.$this->success.'?success=true');
		
	}
}

if(isset($_POST['client-name'])) {
	new MinikitContact();
}

if(!empty($_POST['poll'])) {

	// get poll file
	$poll_file = $_SERVER['DOCUMENT_ROOT'].'/polls/'.$_POST['poll'].'.txt';
	
	// get file
	$data = json_decode(file_get_contents($poll_file), true);
	
	if(isset($data[$_POST['poll-option']])) {
		$data[$_POST['poll-option']]++;
	} else {
		$data[$_POST['poll-option']] = 1;
	}
	
	$fh = fopen($poll_file, 'w');
	fwrite($fh, json_encode($data));
	fclose($fh);
	
	// set voted session
	$_SESSION[$_POST['poll']] = true;
	
	header("Location: ".currentURL());
	
}

function poll($title, $options) {
	require 'poll.php';
}

?>