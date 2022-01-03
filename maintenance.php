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
$mnt_message = $json['mnt_message'];
$mnt_expire = $json['mnt_expire'];
$mnt_act = ($json['mnt_status'] == 'ACTIVE' ? 'selected' : '');
$mnt_ina = ($json['mnt_status'] == 'INACTIVE' ? 'selected' : '');
$message = '<div class="alert alert-primary" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';

if (isset($_POST['submit'])) {
	$jsonData = file_get_contents('./api/main.json');
	$arrayData = json_decode($jsonData, true);
	$replacementData = [
		'app' => ['mnt_status' => $_POST['mnt_status'], 'mnt_message' => $_POST['mnt_message'], 'mnt_expire' => $_POST['mnt_expire']]
	];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
	file_put_contents('./api/main.json', $newJsonData);
	header('Location: maintenance.php?message=' . $message);
}

include 'includes/header.php';
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="h3 mb-1 text-gray-800">Maintenance</h1>' . "\n";
echo '         ' . "\n";
echo '          <!-- Content Row -->' . "\n";
echo '          <div class="row">' . "\n";
echo "\n";
echo '            <!-- First Column -->' . "\n";
echo '            <div class="col-lg-6">' . "\n";
echo "\n";
echo '              <!-- Custom codes -->' . "\n";
echo '                <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-tachometer-alt"></i> Edit Maintenance Message</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                            <form method="post">' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label " for="mnt_message">' . "\n";
echo '                            <strong>Maintenance Message</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input class="form-control text-primary" id="description" name="mnt_message" value="' . $mnt_message . '" type="text"/>' . "\n";
echo '                            </div>' . "\n";
echo '                            </div>' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="mnt_status" >' . "\n";
echo '                            <strong>Status</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <select class="select form-control text-primary" id="select" name="mnt_status">' . "\n";
echo "\t\t\t\t\t\t\t" . '   <option value="INACTIVE"' . $mnt_ina . '>INACTIVE</option>' . "\n";
echo '                            <option value="ACTIVE"' . $mnt_act . '>ACTIVE</option>' . "\n";
echo '                            </select>' . "\n";
echo '                            </div>' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label " for="message">' . "\n";
echo '                            <strong>Expiration:</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input type="text" class="form-control text-primary" name="mnt_expire" id="datetimepicker" value="' . $mnt_expire . '">' . "\n";
echo '                            </div>' . "\n";
echo '                            </div>' . "\n";
echo '                            <div class="form-group">' . "\n";
echo '                            <div>' . "\n";
echo '                        <button class="btn btn-success btn-icon-split" name="submit" type="submit">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Submit</span>' . "\n";
echo '                        </button>' . "\n";
echo '                            </div>' . "\n";
echo '                            </div>' . "\n";
echo '                            </form>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            </div>' . "\n";
echo '            </div>' . "\n";
echo "\n";
echo '    <br><br><br>';
include 'includes/footer.php';
require 'includes/appsnscripts.php';
echo '</body>' . "\n";

?>