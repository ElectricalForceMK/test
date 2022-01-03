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
	$replacementData = [
		'app' => ['player' => $_POST['player'], 'player_tv' => $_POST['player_tv'], 'player_vod' => $_POST['player_vod'], 'player_series' => $_POST['player_series'], 'player_catchup' => $_POST['player_catchup']]
	];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
	file_put_contents('./api/main.json', $newJsonData);
	header('Location: player.php?message=' . $message);
}

include 'includes/header.php';
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="h3 mb-1 text-gray-800">Player Settings</h1>' . "\n";
echo '         ' . "\n";
echo '          <!-- Content Row -->' . "\n";
echo '          <div class="row">' . "\n";
echo "\n";
echo '            <!-- Second Column -->' . "\n";
echo '            <div class="col-lg-6">' . "\n";
echo "\n";
echo '              <!-- Background Gradient Utilities -->' . "\n";
echo '              <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-play"></i> Select Player </h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo "\t\t\t" . '        <form method="post">' . "\n";
echo "\t\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="player" >' . "\n";
echo '                                <strong> Default Player </strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <p' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>VLC ' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="player" value="VLC"  ' . "\n";

if ($json['player'] == 'VLC') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>EXO ' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="player" value="EXO" ' . "\n";

if ($json['player'] == 'EXO') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="player_tv" >' . "\n";
echo '                                <strong> Live Player</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <p' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>VLC ' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="player_tv" value="VLC"  ' . "\n";

if ($json['player_tv'] == 'VLC') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>EXO ' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="player_tv" value="EXO" ' . "\n";

if ($json['player_tv'] == 'EXO') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo ' <div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="player_vod" >' . "\n";
echo '                                <strong> VOD Player</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <p' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>VLC ' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="player_vod" value="VLC"  ' . "\n";

if ($json['player_vod'] == 'VLC') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>EXO ' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="player_vod" value="EXO" ' . "\n";

if ($json['player_vod'] == 'EXO') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo ' <div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="player_series" >' . "\n";
echo '                                <strong> Series Player</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <p' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>VLC ' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="player_series" value="VLC"  ' . "\n";

if ($json['player_series'] == 'VLC') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>EXO ' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="player_series" value="EXO" ' . "\n";

if ($json['player_series'] == 'EXO') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo ' <div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="player_catchup" >' . "\n";
echo '                                <strong> Catch-Up Player</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <p' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>VLC ' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="player_catchup" value="VLC"  ' . "\n";

if ($json['player_catchup'] == 'VLC') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>EXO ' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="player_catchup" value="EXO" ' . "\n";

if ($json['player_catchup'] == 'EXO') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t" . '<div class="form-group">' . "\n";
echo "\t\t\t" . '<div>' . "\n";
echo '                        <button class="btn btn-success btn-icon-split" name="submit" type="submit">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Submit</span>' . "\n";
echo '                        </button>' . "\n";
echo "\t\t\t" . '</div>' . "\n";
echo "\t\t" . '</div>' . "\n";
echo "\t" . '</form>' . "\n";
echo '</div>' . "\n";
echo '            </div>' . "\n";
echo '            </div>' . "\n";
echo '            </div>' . "\n";
echo '            </div>' . "\n";
include 'includes/footer.php';
echo "\t" . '<script> ' . "\n";
echo "\t\t" . '$(document).ready(function () {' . "\n";
echo "\t\t" . '    $("#flash-msg").delay(3000).fadeOut("slow");' . "\n";
echo "\t\t" . '});' . "\n";
echo "\t" . '</script>' . "\n";
echo '</body>' . "\n";
echo "\n";
echo '</html>';

?>