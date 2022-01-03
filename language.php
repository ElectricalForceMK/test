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
$applang = ($json['app_language'] == 'en' ? 'selected' : '');
$applang1 = ($json['app_language'] == 'ar' ? 'selected' : '');
$applang2 = ($json['app_language'] == 'bn' ? 'selected' : '');
$applang3 = ($json['app_language'] == 'zh' ? 'selected' : '');
$applang4 = ($json['app_language'] == 'fr' ? 'selected' : '');
$applang5 = ($json['app_language'] == 'hi' ? 'selected' : '');
$applang6 = ($json['app_language'] == 'it' ? 'selected' : '');
$applang7 = ($json['app_language'] == 'ml' ? 'selected' : '');
$applang8 = ($json['app_language'] == 'pt' ? 'selected' : '');
$applang9 = ($json['app_language'] == 'es' ? 'selected' : '');
$applang10 = ($json['app_language'] == 'ru' ? 'selected' : '');
$message = '<div class="alert alert-primary" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';

if (isset($_POST['submit'])) {
	$jsonData = file_get_contents('./api/main.json');
	$arrayData = json_decode($jsonData, true);
	$replacementData = [
		'app' => ['app_language' => $_POST['app_language']]
	];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
	file_put_contents('./api/main.json', $newJsonData);
	header('Location: language.php?message=' . $message);
}

include 'includes/header.php';
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="h3 mb-1 text-gray-800">Language Changes</h1>' . "\n";
echo '         ' . "\n";
echo '          <!-- Content Row -->' . "\n";
echo '          <div class="row">' . "\n";
echo "\n";
echo '            <!-- First Column -->' . "\n";
echo '            <div class="col-lg-12">' . "\n";
echo "\n";
echo '              <!-- Custom codes -->' . "\n";
echo '                <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-globe"></i> Language Available</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                            <form method="post">' . "\n";
echo "\t\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="app_language" >' . "\n";
echo '                            <strong> Pick Your App Language</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <select class="select form-control text-primary" id="select" name="app_language">' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="en"' . $applang . '>English</option>' . "\n";
echo '                                <option value="ar" ' . $applang1 . '>Arabic</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="bn"' . $applang2 . '>Bengali</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="zh"' . $applang3 . '>Chinese</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="fr" ' . $applang4 . '>French</option>' . "\n";
echo '                                <option value="hi"' . $applang5 . '>Hindi</option>' . "\n";
echo '                                <option value="it"' . $applang6 . '>Italian</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="ml"' . $applang7 . '>Malayalam</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="pt"' . $applang8 . '>Portugese</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="es"' . $applang9 . '>Spanish</option>' . "\n";
echo '                                <option value="ru"' . $applang10 . '>Russian</option>' . "\n";
echo '                            </select>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>' . "\n";
echo '                            <div class="form-group">' . "\n";
echo '                            <div>' . "\n";
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
echo '            </div>';
echo '            </div>';
echo "\n";
echo '    <br><br><br>';
include 'includes/footer.php';
require 'includes/appsnscripts.php';
echo '</body>' . "\n";

?>