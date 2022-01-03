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

$jsondata = file_get_contents('./api/parent.json');
$json = json_decode($jsondata, true);
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';

if (isset($_POST['submit'])) {
	$jsonData = file_get_contents('./api/parent.json');
	$arrayData = json_decode($jsonData, true);
	$replacementData = [1 => $_POST[1], 2 => $_POST[2], 3 => $_POST[3], 4 => $_POST[4], 5 => $_POST[5]];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
	file_put_contents('./api/parent.json', $newJsonData);
	header('Location: parent.php?message=' . $message);
}

$input1 = $json[1];
$input5 = $json[5];
$num1 = ord($input1);
$num5 = ord($input5);
include 'includes/header.php';
echo '<!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";
echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="text h3 mb-1 text-gray-800">Parental Reset</h1>' . "\n";
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
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-lock"></i> Parental Password Reset</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                            <form method="post">' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label" for="mastercode">' . "\n";
echo '                            <strong> Enter Reset Code</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input class="inputs text-primary" id="1" name="1" placeholder="🥚" maxlength="1" size="1" value= "" />' . "\n";
echo '                            <input class="inputs text-primary" id="2" name="2" placeholder="🥚" maxlength="1" size="1" value= ""/>' . "\n";
echo '                            <input class="inputs text-primary" id="3" name="3" placeholder="🥚" maxlength="1" size="1" value= "" />' . "\n";
echo '                            <input class="inputs text-primary" id="4" name="4" placeholder="🥚" maxlength="1" size="1" value= "" />' . "\n";
echo '                            <input class="inputs text-primary" id="5" name="5" placeholder="🥚" maxlength="1" size="1"  />' . "\n";
echo '                            <br>' . "\n";
echo '                            </div></div>' . "\n";
echo '                            <div class="form-group">' . "\n";
echo '                            <div>' . "\n";
echo '                            <button class="btn btn-success btn-icon-split" name="submit" type="submit">' . "\n";
echo '                            <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Submit</span>' . "\n";
echo '                            </button>' . "\n";
echo '                            </div></div>' . "\n";
echo '                            <form method="post">' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label" for="code">' . "\n";
echo '                            <strong> Generated Reset Code</strong> ' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input class="inputs text-primary" id="code" name="code" placeholder="Reset" size="5" value= "' . $num1 . $num5 . '" disabled>' . "\n";
echo '                            </div>' . "\n";
echo '                            </div>' . "\n";
echo '                            </div>' . "\n";
echo '                            </form>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            </div>' . "\n";
echo "\n";
echo '    <br><br><br>' . "\n";
echo '<br><br><br>' . "\n";
include 'includes/footer.php';
echo '</body>' . "\n";
echo '<script>' . "\n";
echo '    $(".inputs").keyup(function() {' . "\n";
echo '  if (this.value.length == this.maxLength) {' . "\n";
echo '    $(this).nextAll(\'.inputs:enabled:first\').focus();' . "\n";
echo '  }' . "\n";
echo '});' . "\n";
echo '</script>' . "\n";
echo '</html>' . "\n";

?>