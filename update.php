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
$apkautono = ($json['apkautoupdate'] == 'no' ? 'selected' : '');
$apkautoyes = ($json['apkautoupdate'] == 'yes' ? 'selected' : '');
$apkurl = $json['apkurl'];
$version_code = $json['version_code'];

if (isset($_POST['submit'])) {
	$jsonData = file_get_contents('./api/main.json');
	$arrayData = json_decode($jsonData, true);
	$replacementData = [
		'app' => ['apkurl' => $_POST['apkurl'], 'version_code' => $_POST['version_code'], 'apkautoupdate' => $_POST['apkautoupdate']]
	];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
	file_put_contents('./api/main.json', $newJsonData);
	header('Location: update.php?message=' . $message);
}

include 'includes/header.php';
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="h3 mb-1 text-gray-800">Push Update</h1>' . "\n";
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
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-upload"></i> Edit Update</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                            <form method="post">' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="apkautoupdate" >' . "\n";
echo '                                Auto Update Apk:' . "\n";
echo '                            </label>' . "\n";
echo '                            <select class="select form-control text-primary" id="select" name="apkautoupdate">' . "\n";
echo "\t\t\t\t\t\t\t" . '<option value="yes"' . $apkautoyes . '>Enabled</option>' . "\n";
echo '                            <option value="no"' . $apkautono . '>Disabled</option>' . "\n";
echo '                            </select>' . "\n";
echo '                            </div>' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label " for="apkurl">' . "\n";
echo '                                Apk Url:' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input type="text" class="form-control text-primary" name="apkurl" id="apkurl" value="' . $apkurl . '">' . "\n";
echo '                            </div>' . "\n";
echo '                            </div>' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label " for="version_code">' . "\n";
echo '                                Version Code:' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input type="text" class="form-control text-primary" name="version_code" id="version_code" value="' . $version_code . '">' . "\n";
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