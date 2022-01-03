<?php
/**
*
* @ This file is created by http://DeZender.Net
* @ deZender (PHP7 Decoder for SourceGuardian Encoder)
*
* @ Version			:	4.1.0.1
* @ Author			:	DeZender
* @ Release on		:	29.08.2020
* @ Official site	:	http://DeZender.Net
*
*/

$jsondata = file_get_contents('./api/main.json');
$data = json_decode($jsondata, true);
$json = $data['app'];
$message = '<div class="alert alert-primary" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';

if (isset($_POST['submit'])) {
	$jsonData = file_get_contents('./api/main.json');
	$arrayData = json_decode($jsonData, true);

	if (empty($_POST['show_cat_count'])) {
		$show_cat_count = 'yes';
	}
	else {
		$show_cat_count = $_POST['show_cat_count'];
	}

	if (empty($_POST['load_last_channel'])) {
		$load_last_channel = 'no';
	}
	else {
		$load_last_channel = $_POST['load_last_channel'];
	}

	if (empty($_POST['login_logo'])) {
		$login_logo = 'yes';
	}
	else {
		$login_logo = $_POST['login_logo'];
	}

	if (empty($_POST['logs'])) {
		$logs = 'no';
	}
	else {
		$logs = $_POST['logs'];
	}

	if (empty($_POST['all_cat'])) {
		$all_cat = 'yes';
	}
	else {
		$all_cat = $_POST['all_cat'];
	}

	if (empty($_POST['filter_status'])) {
		$filter_status = 'No';
	}
	else {
		$filter_status = $_POST['filter_status'];
	}

	if (empty($_POST['agent'])) {
		$agent = 'appsnscriptsXC';
	}
	else {
		$agent = $_POST['agent'];
	}

	if (empty($_POST['login_type'])) {
		$login_type = 'login';
	}
	else {
		$login_type = $_POST['login_type'];
	}

	if (empty($_POST['btn_login_settings'])) {
		$btn_login_settings = 'Yes';
	}
	else {
		$btn_login_settings = $_POST['btn_login_settings'];
	}

	if (empty($_POST['stream_type'])) {
		$stream_type = 'ts';
	}
	else {
		$stream_type = $_POST['stream_type'];
	}

	$replacementData = [
		'app' => ['login_type' => $login_type, 'show_cat_count' => $show_cat_count, 'load_last_channel' => $load_last_channel, 'login_logo' => $login_logo, 'logs' => $logs, 'all_cat' => $all_cat, 'filter_status' => $filter_status, 'btn_login_settings' => $btn_login_settings, 'stream_type' => $stream_type, 'agent' => $agent]
	];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
	file_put_contents('./api/main.json', $newJsonData);
	header('Location: extra.php?message=' . $message);
}

include 'includes/header.php';
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="h3 mb-1 text-gray-800">Extras</h1>' . "\n";
echo '         ' . "\n";
echo '          <!-- Content Row -->' . "\n";
echo '          <div class="row">' . "\n";
echo "\n";
$login = ($json['login_type'] == 'login' ? 'selected' : '');
$mac = ($json['login_type'] == 'mac' ? 'selected' : '');
$code = ($json['login_type'] == 'activation' ? 'selected' : '');
echo '            <!-- Second Column -->' . "\n";
echo '            <div class="col-lg-6">' . "\n";
echo "\n";
echo '              <!-- Background Gradient Utilities -->' . "\n";
echo '              <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-wrench"></i> Extra Settings</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo "\t\t\t\t" . '    ' . "\t" . '<form method="post">' . "\n";
echo "\t\t" . '    ' . "\t\t\t" . '<div class="form-group inline">' . "\n";
echo '                        <label class="control-label requiredField" for="login_type" >' . "\n";
echo '                        <strong> Login Type</strong>' . "\n";
echo '                        </label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<select class="form-control text-primary" id="select" name="login_type">' . "\n";
echo '                                        <option value="login" ' . $login . ' >User / Pass</option>' . "\n";
echo '                                        <option value="mac" ' . $mac . ' >Mac Address</option>' . "\n";
echo '                                        <option value="activation" ' . $code . ' >Activation Code</option>' . "\n";
echo '                                    </select>                                ' . "\n";
echo '                                </div>' . "\n";
echo "\t\t\t\t\t\t" . '<div class="form-group">' . "\n";
echo '                        <label class="control-label " for="agent">' . "\n";
echo '                        <strong> User Agent</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <div class="input-group">' . "\n";
echo '                        <input class="form-control text-primary" name="agent"  value="' . $json['agent'] . '" type="text"/>' . "\n";
echo '                        </div>' . "\n";
echo '                        </div>' . "\n";
echo "\t\t\t\t\t" . '    <form method="post">' . "\n";
echo "\t\t\t\t\t" . '    <div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="logs" >' . "\n";
echo '                        <strong> Show App Logs</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="logs" value="yes"  ' . "\n";

if ($json['logs'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="logs" value="no" ' . "\n";

if ($json['logs'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t" . '    <form method="post">' . "\n";
echo "\t\t\t\t\t" . '    <div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="all_cat" >' . "\n";
echo '                        <strong> Show All Categories</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="all_cat" value="yes"  ' . "\n";

if ($json['all_cat'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="all_cat" value="no" ' . "\n";

if ($json['all_cat'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t" . '    <form method="post">' . "\n";
echo "\t\t\t\t\t" . '    <div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="show_cat_count" >' . "\n";
echo '                        <strong> Show Category Count</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="show_cat_count" value="yes"  ' . "\n";

if ($json['show_cat_count'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="show_cat_count" value="No" ' . "\n";

if ($json['show_cat_count'] == 'No') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t" . '    <form method="post">' . "\n";
echo "\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="load_last_channel" >' . "\n";
echo '                        <strong> Load Last Channel</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="load_last_channel" value="Yes"  ' . "\n";

if ($json['load_last_channel'] == 'Yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="load_last_channel" value="no" ' . "\n";

if ($json['load_last_channel'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="btn_login_settings" >' . "\n";
echo '                        <strong> Show Settings On Login</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_login_settings" value="yes"  ' . "\n";

if ($json['btn_login_settings'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_login_settings" value="no" ' . "\n";

if ($json['btn_login_settings'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label" for="stream_type" >' . "\n";
echo '                                        <strong> Stream Format</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <p' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>HLS' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="stream_type" value="m3u8"  ' . "\n";

if ($json['stream_type'] == 'm3u8') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>MPEGTS' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="stream_type" value="ts" ' . "\n";

if ($json['stream_type'] == 'ts') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo '                        <button class="btn btn-success btn-icon-split" name="submit" type="submit">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Update App Settings</span>' . "\n";
echo '                        </button>' . "\n";
echo '                        </div>' . "\n";
echo '                        </div>' . "\n";
echo '                        </form>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>           ' . "\n";
echo "\n";
echo '    <br><br><br>';
include 'includes/footer.php';
require 'includes/appsnscripts.php';
echo '</body>' . "\n";

?>