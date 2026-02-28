<?php

$logoimage = '<p><a href="../index.php"><img src="/images/emailLogo.jpg"></a></p>';

function mysql_prep($value) {
	// get_magic_quotes_gpc() and mysql_* were removed in modern PHP,
	// so keep escaping behavior simple and forward-compatible.
	return addslashes($value);
}

function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

spl_autoload_register(function ($class_name) {
	$class_name = strtolower($class_name);
	$path = LIB_PATH.DS."{$class_name}.php";
	if (file_exists($path)) {
		require_once($path);
	} else {
		die("The file {$class_name}.php could not be found.");
	}
});


function db_result($result, $row, $field = 0) {
	if (!mysqli_data_seek($result, $row)) {
		return false;
	}
	$data = mysqli_fetch_array($result, MYSQLI_BOTH);
	if ($data === null || $data === false) {
		return false;
	}
	return isset($data[$field]) ? $data[$field] : false;
}

function include_layout_template($template="") {
	include(SERVER_ROOT.DS.'layout'.DS.$template);
}

function include_menu_template($template="") {
	include(SERVER_ROOT.DS.'MenuTemplate'.DS.$template);
}

function include_feedback($template="") {
	include(SERVER_ROOT.DS.'Feedback'.DS.$template);
}

function include_gallery_template($template="") {
	include(SERVER_ROOT.DS.'PhotoGalleries'.DS.$template);
}

function include_login($template="") {
	include(SERVER_ROOT.DS.'login'.DS.'includes'.DS.$template);
}

function log_action($action, $message="") {
	$logfile = SERVER_ROOT.DS.'logs'.DS.'log.txt';
	$new = file_exists($logfile) ? false : true;
  if($handle = fopen($logfile, 'a')) { // append
    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
		$content = "{$timestamp} | {$action}: {$message}\n";
    fwrite($handle, $content);
    fclose($handle);
    if($new) { chmod($logfile, -25200); }
  } else {
    echo "Could not open log file for writing.";
  }
}

function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

?>