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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$jsondata = file_get_contents('./api/main.json');
$data = json_decode($jsondata, true);
$json = $data['app'];
$theme_d = ($json['theme'] == 'theme_d' ? 'selected' : '');
$theme_1 = ($json['theme'] == 'theme_1' ? 'selected' : '');
$theme_2 = ($json['theme'] == 'theme_2' ? 'selected' : '');
$theme_3 = ($json['theme'] == 'theme_3' ? 'selected' : '');
$theme_4 = ($json['theme'] == 'theme_4' ? 'selected' : '');
$theme_5 = ($json['theme'] == 'theme_5' ? 'selected' : '');
$theme_6 = ($json['theme'] == 'theme_6' ? 'selected' : '');
$theme_7 = ($json['theme'] == 'new_layout' ? 'selected' : '');
$message = '<div class="alert alert-primary" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';

if (isset($_POST['submit'])) {
	$jsonData = file_get_contents('./api/main.json');
	$arrayData = json_decode($jsonData, true);
	$replacementData = [
		'app' => ['theme' => $_POST['theme']]
	];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
	file_put_contents('./api/main.json', $newJsonData);
	header('Location: theme.php?message=' . $message);
}

include 'includes/header.php';
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="h3 mb-1 text-gray-800">Theme Changes</h1>' . "\n";
echo '         ' . "\n";
echo '          <!-- Content Row -->' . "\n";
echo '          <div class="row">' . "\n";
echo "\n";
echo '            <!-- First Column -->' . "\n";
echo '            <div class="col-lg-12">' . "\n";
echo "\n";
echo '              <!-- Custom codes -->' . "\n";
echo '                <div class="card border-left-primary shadow card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-paint-brush"></i> Choose Your Theme</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                            <form method="post">' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="theme" >' . "\n";
echo '                            </label>' . "\n";
echo '                            <select class="select form-control text-primary" id="select" name="theme">' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="theme_d"' . $theme_d . '>Standard</span></option>' . "\n";
echo '                                <option value="theme_1"' . $theme_1 . '>Theme 1</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="theme_2"' . $theme_2 . '>Theme 2</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="theme_3"' . $theme_3 . '>Theme 3</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="theme_4"' . $theme_4 . '>Theme 4</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="theme_5"' . $theme_5 . '>Theme 5</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="theme_6"' . $theme_6 . '>Theme 6</option>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<option value="new_layout"' . $theme_7 . '>New Layout</option>' . "\n";
echo '                            </select>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>' . "\n";
echo '                            <div class="form-group">' . "\n";
echo '                            <div class="card-body">' . "\n";
echo '                        <button class="btn btn-success btn-icon-split" name="submit" type="submit">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Submit</span>' . "\n";
echo '                        </button>' . "\n";
echo '                            </div>' . "\n";
echo '                            </div>' . "\n";
echo '                            </form>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo "\n";
echo '            <!-- Theme -->' . "\n";
echo '            <div class="col-xl-3 col-md-6 mb-4">' . "\n";
echo '              <div class="card border-left-primary shadow py-2">' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                  <div class="row no-gutters align-items-center">' . "\n";
echo '                    <div class="col mr-2">' . "\n";
echo '                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Standard</div>' . "\n";
echo '                      <div class="h5 mb-0 font-weight-bold text-gray-800"><img class="card-img-bottom" src="./img/d.jpg" alt="Card image" style="width:100%"></div>' . "\n";
echo '                    </div>' . "\n";
echo '                  </div>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            ' . "\n";
echo '            <!-- Theme -->' . "\n";
echo '            <div class="col-xl-3 col-md-6 mb-4">' . "\n";
echo '              <div class="card border-left-primary shadow py-2">' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                  <div class="row no-gutters align-items-center">' . "\n";
echo '                    <div class="col mr-2">' . "\n";
echo '                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Theme 1</div>' . "\n";
echo '                      <div class="h5 mb-0 font-weight-bold text-gray-800"><img class="card-img-bottom" src="./img/1.jpg" alt="Card image" style="width:100%"></div>' . "\n";
echo '                    </div>' . "\n";
echo '                  </div>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            ' . "\n";
echo '            <!-- Theme -->' . "\n";
echo '            <div class="col-xl-3 col-md-6 mb-4">' . "\n";
echo '              <div class="card border-left-primary shadow py-2">' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                  <div class="row no-gutters align-items-center">' . "\n";
echo '                    <div class="col mr-2">' . "\n";
echo '                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Theme 2</div>' . "\n";
echo '                      <div class="h5 mb-0 font-weight-bold text-gray-800"><img class="card-img-bottom" src="./img/2.jpg" alt="Card image" style="width:100%"></div>' . "\n";
echo '                    </div>' . "\n";
echo '                  </div>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            ' . "\n";
echo '            <!-- Theme -->' . "\n";
echo '            <div class="col-xl-3 col-md-6 mb-4">' . "\n";
echo '              <div class="card border-left-primary shadow py-2">' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                  <div class="row no-gutters align-items-center">' . "\n";
echo '                    <div class="col mr-2">' . "\n";
echo '                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Theme 3</div>' . "\n";
echo '                      <div class="h5 mb-0 font-weight-bold text-gray-800"><img class="card-img-bottom" src="./img/3.jpg" alt="Card image" style="width:100%"></div>' . "\n";
echo '                    </div>' . "\n";
echo '                  </div>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            ' . "\n";
echo '            <!-- Theme -->' . "\n";
echo '            <div class="col-xl-3 col-md-6 mb-4">' . "\n";
echo '              <div class="card border-left-primary shadow py-2">' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                  <div class="row no-gutters align-items-center">' . "\n";
echo '                    <div class="col mr-2">' . "\n";
echo '                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Theme 4</div>' . "\n";
echo '                      <div class="h5 mb-0 font-weight-bold text-gray-800"><img class="card-img-bottom" src="./img/4.jpg" alt="Card image" style="width:100%"></div>' . "\n";
echo '                    </div>' . "\n";
echo '                  </div>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            ' . "\n";
echo '            <!-- Theme -->' . "\n";
echo '            <div class="col-xl-3 col-md-6 mb-4">' . "\n";
echo '              <div class="card border-left-primary shadow py-2">' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                  <div class="row no-gutters align-items-center">' . "\n";
echo '                    <div class="col mr-2">' . "\n";
echo '                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Theme 5</div>' . "\n";
echo '                      <div class="h5 mb-0 font-weight-bold text-gray-800"><img class="card-img-bottom" src="./img/5.jpg?" alt="Card image" style="width:100%"></div>' . "\n";
echo '                    </div>' . "\n";
echo '                  </div>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            ' . "\n";
echo '            <!-- Theme -->' . "\n";
echo '            <div class="col-xl-3 col-md-6 mb-4">' . "\n";
echo '              <div class="card border-left-primary shadow py-2">' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                  <div class="row no-gutters align-items-center">' . "\n";
echo '                    <div class="col mr-2">' . "\n";
echo '                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Theme 6</div>' . "\n";
echo '                      <div class="h5 mb-0 font-weight-bold text-gray-800"><img class="card-img-bottom" src="./img/71.jpg?" alt="Card image" style="width:100%"></div>' . "\n";
echo '                    </div>' . "\n";
echo '                  </div>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            ' . "\n";
echo '            <!-- Theme -->' . "\n";
echo '            <div class="col-xl-3 col-md-6 mb-4">' . "\n";
echo '              <div class="card border-left-primary shadow py-2">' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                  <div class="row no-gutters align-items-center">' . "\n";
echo '                    <div class="col mr-2">' . "\n";
echo '                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">New Layout</div>' . "\n";
echo '                      <div class="h5 mb-0 font-weight-bold text-gray-800"><img class="card-img-bottom" src="./img/6.jpg?" alt="Card image" style="width:100%"></div>' . "\n";
echo '                    </div>' . "\n";
echo '                  </div>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            ' . "\n";
echo '            </div>' . "\n";
echo '            </div>' . "\n";
echo "\n";
include 'includes/footer.php';
require 'includes/appsnscripts.php';
echo '</body>' . "\n";

?>