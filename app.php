<?php

$lurl = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] !== 'off') ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/api/';
$jsondata = file_get_contents('./api/main.json');
$data = json_decode($jsondata, true);
$json = $data['app'];
$appname = $json['appname'];
$customerid = $json['customerid'];
$expire = $json['expire'];
$support_email = $json['support_email'];
$support_phone = $json['support_phone'];
$btn_signup = $json['btn_signup'];
$btn_login_account = $json['btn_login_account'];
$portal = $json['portal'];
$portal2 = $json['portal2'];
$portal3 = $json['portal3'];
$portal4 = $json['portal4'];
$portal5 = $json['portal5'];
$portal_name = $json['portal_name'];
$portal2_name = $json['portal2_name'];
$portal3_name = $json['portal3_name'];
$portal4_name = $json['portal4_name'];
$portal5_name = $json['portal5_name'];
$portal_vod = $json['portal_vod'];
$portal_series = $json['portal_series'];
$epg_url = $json['epg_url'];
$ovpn_url = $json['ovpn_url'];
$btn_live = $json['btn_live'];
$btn_live2 = $json['btn_live2'];
$btn_live3 = $json['btn_live3'];
$btn_live4 = $json['btn_live4'];
$btn_live5 = $json['btn_live5'];
$btn_vod = $json['btn_vod'];
$btn_vod2 = $json['btn_vod2'];
$btn_vod3 = $json['btn_vod3'];
$btn_vod4 = $json['btn_vod4'];
$btn_vod5 = $json['btn_vod5'];
$btn_epg = $json['btn_epg'];
$btn_epg2 = $json['btn_epg2'];
$btn_epg3 = $json['btn_epg3'];
$btn_epg4 = $json['btn_epg4'];
$btn_epg5 = $json['btn_epg5'];
$btn_series = $json['btn_series'];
$btn_series2 = $json['btn_series2'];
$btn_series3 = $json['btn_series3'];
$btn_series4 = $json['btn_series4'];
$btn_series5 = $json['btn_series5'];
$btn_radio = $json['btn_radio'];
$btn_radio2 = $json['btn_radio2'];
$btn_radio3 = $json['btn_radio3'];
$btn_radio4 = $json['btn_radio4'];
$btn_radio5 = $json['btn_radio5'];
$btn_catchup = $json['btn_catchup'];
$btn_catchup2 = $json['btn_catchup2'];
$btn_catchup3 = $json['btn_catchup3'];
$btn_catchup4 = $json['btn_catchup4'];
$btn_catchup5 = $json['btn_catchup5'];
$btn_account = $json['btn_account'];
$btn_account2 = $json['btn_account2'];
$btn_account3 = $json['btn_account3'];
$btn_account4 = $json['btn_account4'];
$btn_account5 = $json['btn_account5'];
$ms = $json['ms'];
$ms2 = $json['ms2'];
$ms3 = $json['ms3'];
$ms4 = $json['ms4'];
$ms5 = $json['ms5'];
$btn_fav = $json['btn_fav'];
$btn_fav2 = $json['btn_fav2'];
$btn_fav3 = $json['btn_fav3'];
$btn_fav4 = $json['btn_fav4'];
$btn_fav5 = $json['btn_fav5'];
$backupurl = $json['backupurl'];
$logurl = $json['logurl'];
$message = '<div class="alert alert-primary" id="flash-msg"><h4></i>Items Updated!</h4></div>';

if (isset($_POST['submit_support'])) {
	$jsonData = file_get_contents('./api/main.json');
	$arrayData = json_decode($jsonData, true);

	if (empty($_POST['show_expire'])) {
		$show_expire = 'yes';
	}
	else {
		$show_expire = $_POST['show_expire'];
	}

	$replacementData = [
		'app' => ['announcement_enabled' => $_POST['announcement_enabled'], 'message_enabled' => $_POST['message_enabled'], 'updateuserinfo_enabled' => $_POST['updateuserinfo_enabled'], 'appname' => $_POST['appname'], 'customerid' => $_POST['customerid'], 'expire' => $_POST['expire'], 'show_expire' => $show_expire, 'support_email' => $_POST['support_email'], 'support_phone' => $_POST['support_phone'], 'btn_signup' => $_POST['btn_signup'], 'btn_login_account' => $_POST['btn_login_account'], 'backupurl' => $_POST['backupurl']]
	];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
	file_put_contents('./api/main.json', $newJsonData);
	header('Location: app.php?message=' . $message);
}

if (isset($_POST['submit'])) {
	$jsonData = file_get_contents('./api/main.json');
	$arrayData = json_decode($jsonData, true);

	if (empty($_POST['btn_pr'])) {
		$btn_pr = 'yes';
	}
	else {
		$btn_pr = $_POST['btn_pr'];
	}

	if (empty($_POST['btn_rec'])) {
		$btn_rec = 'yes';
	}
	else {
		$btn_rec = $_POST['btn_rec'];
	}

	if (empty($_POST['btn_vpn'])) {
		$btn_vpn = 'yes';
	}
	else {
		$btn_vpn = $_POST['btn_vpn'];
	}

	if (empty($_POST['btn_noti'])) {
		$btn_noti = 'yes';
	}
	else {
		$btn_noti = $_POST['btn_noti'];
	}

	if (empty($_POST['btn_update'])) {
		$btn_update = 'yes';
	}
	else {
		$btn_update = $_POST['btn_update'];
	}

	if (empty($_POST['ovpn_url'])) {
		$ovpn_url = 'yes';
	}
	else {
		$ovpn_url = $_POST['ovpn_url'];
	}

	$replacementData = [
		'app' => ['btn_pr' => $btn_pr, 'btn_rec' => $btn_rec, 'btn_noti' => $btn_noti, 'btn_update' => $btn_update, 'btn_vpn' => $btn_vpn, 'logurl' => $lurl, 'ovpn_url' => $ovpn_url, 'portal' => $_POST['portal'], 'portal2' => $_POST['portal2'], 'portal3' => $_POST['portal3'], 'portal4' => $_POST['portal4'], 'portal5' => $_POST['portal5'], 'portal_name' => $_POST['portal_name'], 'portal2_name' => $_POST['portal2_name'], 'portal3_name' => $_POST['portal3_name'], 'portal4_name' => $_POST['portal4_name'], 'portal5_name' => $_POST['portal5_name']]
	];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
	file_put_contents('./api/main.json', $newJsonData);
	header('Location: app.php?message=' . $message);
}

if (isset($_POST['submit_app_custom'])) {
	$jsonData = file_get_contents('./api/main.json');
	$arrayData = json_decode($jsonData, true);

	if (empty($_POST['btn_live'])) {
		$btn_live = 'No';
	}
	else {
		$btn_live = $_POST['btn_live'];
	}

	if (empty($_POST['btn_live2'])) {
		$btn_live2 = 'No';
	}
	else {
		$btn_live2 = $_POST['btn_live2'];
	}

	if (empty($_POST['btn_live3'])) {
		$btn_live3 = 'No';
	}
	else {
		$btn_live3 = $_POST['btn_live3'];
	}

	if (empty($_POST['btn_live4'])) {
		$btn_live4 = 'No';
	}
	else {
		$btn_live4 = $_POST['btn_live4'];
	}

	if (empty($_POST['btn_live5'])) {
		$btn_live5 = 'No';
	}
	else {
		$btn_live5 = $_POST['btn_live5'];
	}

	if (empty($_POST['btn_vod'])) {
		$btn_vod = 'No';
	}
	else {
		$btn_vod = $_POST['btn_vod'];
	}

	if (empty($_POST['btn_vod2'])) {
		$btn_vod2 = 'No';
	}
	else {
		$btn_vod2 = $_POST['btn_vod2'];
	}

	if (empty($_POST['btn_vod3'])) {
		$btn_vod3 = 'No';
	}
	else {
		$btn_vod3 = $_POST['btn_vod3'];
	}

	if (empty($_POST['btn_vod4'])) {
		$btn_vod4 = 'No';
	}
	else {
		$btn_vod4 = $_POST['btn_vod4'];
	}

	if (empty($_POST['btn_vod5'])) {
		$btn_vod5 = 'No';
	}
	else {
		$btn_vod5 = $_POST['btn_vod5'];
	}

	if (empty($_POST['btn_epg'])) {
		$btn_epg = 'No';
	}
	else {
		$btn_epg = $_POST['btn_epg'];
	}

	if (empty($_POST['btn_epg2'])) {
		$btn_epg2 = 'No';
	}
	else {
		$btn_epg2 = $_POST['btn_epg2'];
	}

	if (empty($_POST['btn_epg3'])) {
		$btn_epg3 = 'No';
	}
	else {
		$btn_epg3 = $_POST['btn_epg3'];
	}

	if (empty($_POST['btn_epg4'])) {
		$btn_epg4 = 'No';
	}
	else {
		$btn_epg4 = $_POST['btn_epg4'];
	}

	if (empty($_POST['btn_epg5'])) {
		$btn_epg5 = 'No';
	}
	else {
		$btn_epg5 = $_POST['btn_epg5'];
	}

	if (empty($_POST['btn_series'])) {
		$btn_series = 'No';
	}
	else {
		$btn_series = $_POST['btn_series'];
	}

	if (empty($_POST['btn_series2'])) {
		$btn_series2 = 'No';
	}
	else {
		$btn_series2 = $_POST['btn_series2'];
	}

	if (empty($_POST['btn_series3'])) {
		$btn_series3 = 'No';
	}
	else {
		$btn_series3 = $_POST['btn_series3'];
	}

	if (empty($_POST['btn_series4'])) {
		$btn_series4 = 'No';
	}
	else {
		$btn_series4 = $_POST['btn_series4'];
	}

	if (empty($_POST['btn_series5'])) {
		$btn_series5 = 'No';
	}
	else {
		$btn_series5 = $_POST['btn_series5'];
	}

	if (empty($_POST['btn_radio'])) {
		$btn_radio = 'No';
	}
	else {
		$btn_radio = $_POST['btn_radio'];
	}

	if (empty($_POST['btn_radio2'])) {
		$btn_radio2 = 'No';
	}
	else {
		$btn_radio2 = $_POST['btn_radio2'];
	}

	if (empty($_POST['btn_radio3'])) {
		$btn_radio3 = 'No';
	}
	else {
		$btn_radio3 = $_POST['btn_radio3'];
	}

	if (empty($_POST['btn_radio4'])) {
		$btn_radio4 = 'No';
	}
	else {
		$btn_radio4 = $_POST['btn_radio4'];
	}

	if (empty($_POST['btn_radio5'])) {
		$btn_radio5 = 'No';
	}
	else {
		$btn_radio5 = $_POST['btn_radio5'];
	}

	if (empty($_POST['btn_catchup'])) {
		$btn_catchup = 'No';
	}
	else {
		$btn_catchup = $_POST['btn_catchup'];
	}

	if (empty($_POST['btn_catchup2'])) {
		$btn_catchup2 = 'No';
	}
	else {
		$btn_catchup2 = $_POST['btn_catchup2'];
	}

	if (empty($_POST['btn_catchup3'])) {
		$btn_catchup3 = 'No';
	}
	else {
		$btn_catchup3 = $_POST['btn_catchup3'];
	}

	if (empty($_POST['btn_catchup4'])) {
		$btn_catchup4 = 'No';
	}
	else {
		$btn_catchup4 = $_POST['btn_catchup4'];
	}

	if (empty($_POST['btn_catchup5'])) {
		$btn_catchup5 = 'No';
	}
	else {
		$btn_catchup5 = $_POST['btn_catchup5'];
	}

	if (empty($_POST['btn_account'])) {
		$btn_account = 'no';
	}
	else {
		$btn_account = $_POST['btn_account'];
	}

	if (empty($_POST['btn_account2'])) {
		$btn_account2 = 'no';
	}
	else {
		$btn_account2 = $_POST['btn_account2'];
	}

	if (empty($_POST['btn_account3'])) {
		$btn_account3 = 'no';
	}
	else {
		$btn_account3 = $_POST['btn_account3'];
	}

	if (empty($_POST['btn_account4'])) {
		$btn_account4 = 'no';
	}
	else {
		$btn_account4 = $_POST['btn_account4'];
	}

	if (empty($_POST['btn_account5'])) {
		$btn_account5 = 'no';
	}
	else {
		$btn_account5 = $_POST['btn_account5'];
	}

	if (empty($_POST['ms'])) {
		$ms = 'no';
	}
	else {
		$ms = $_POST['ms'];
	}

	if (empty($_POST['ms2'])) {
		$ms2 = 'no';
	}
	else {
		$ms2 = $_POST['ms2'];
	}

	if (empty($_POST['ms3'])) {
		$ms3 = 'no';
	}
	else {
		$ms3 = $_POST['ms3'];
	}

	if (empty($_POST['ms4'])) {
		$ms4 = 'no';
	}
	else {
		$ms4 = $_POST['ms4'];
	}

	if (empty($_POST['ms5'])) {
		$ms5 = 'no';
	}
	else {
		$ms5 = $_POST['ms5'];
	}

	if (empty($_POST['btn_fav'])) {
		$btn_fav = 'no';
	}
	else {
		$btn_fav = $_POST['btn_fav'];
	}

	if (empty($_POST['btn_fav2'])) {
		$btn_fav2 = 'no';
	}
	else {
		$btn_fav2 = $_POST['btn_fav2'];
	}

	if (empty($_POST['btn_fav3'])) {
		$btn_fav3 = 'no';
	}
	else {
		$btn_fav3 = $_POST['btn_fav3'];
	}

	if (empty($_POST['btn_fav4'])) {
		$btn_fav4 = 'no';
	}
	else {
		$btn_fav4 = $_POST['btn_fav4'];
	}

	if (empty($_POST['btn_fav5'])) {
		$btn_fav5 = 'no';
	}
	else {
		$btn_fav5 = $_POST['btn_fav5'];
	}

	$replacementData = [
		'app' => ['portal_vod' => $_POST['portal_vod'], 'portal_series' => $_POST['portal_series'], 'epg_url' => $_POST['epg_url'], 'btn_live' => $btn_live, 'btn_live2' => $btn_live2, 'btn_live3' => $btn_live3, 'btn_live4' => $btn_live4, 'btn_live5' => $btn_live5, 'btn_vod' => $btn_vod, 'btn_vod2' => $btn_vod2, 'btn_vod3' => $btn_vod3, 'btn_vod4' => $btn_vod4, 'btn_vod5' => $btn_vod5, 'btn_epg' => $btn_epg, 'btn_epg2' => $btn_epg2, 'btn_epg3' => $btn_epg3, 'btn_epg4' => $btn_epg4, 'btn_epg5' => $btn_epg5, 'btn_series' => $btn_series, 'btn_series2' => $btn_series2, 'btn_series3' => $btn_series3, 'btn_series4' => $btn_series4, 'btn_series5' => $btn_series5, 'btn_radio' => $btn_radio, 'btn_radio2' => $btn_radio2, 'btn_radio3' => $btn_radio3, 'btn_radio4' => $btn_radio4, 'btn_radio5' => $btn_radio5, 'btn_catchup' => $btn_catchup, 'btn_catchup2' => $btn_catchup2, 'btn_catchup3' => $btn_catchup3, 'btn_catchup4' => $btn_catchup4, 'btn_catchup5' => $btn_catchup5, 'btn_account' => $btn_account, 'btn_account2' => $btn_account2, 'btn_account3' => $btn_account3, 'btn_account4' => $btn_account4, 'btn_account5' => $btn_account5, 'ms' => $ms, 'ms2' => $ms2, 'ms3' => $ms3, 'ms4' => $ms4, 'ms5' => $ms5, 'btn_fav' => $btn_fav, 'btn_fav2' => $btn_fav2, 'btn_fav3' => $btn_fav3, 'btn_fav4' => $btn_fav4, 'btn_fav5' => $btn_fav5]
	];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
	file_put_contents('./api/main.json', $newJsonData);
	header('Location: app.php?message=' . $message);
}

include 'includes/header.php';
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="h3 mb-1 text-gray-800">Main App Settings</h1>' . "\n";
echo '         ' . "\n";
echo '          <!-- Content Row -->' . "\n";
echo '          <div class="row">' . "\n";
echo "\n";
echo '            <!-- First Column -->' . "\n";
echo '            <div class="col-lg-4">' . "\n";
echo "\n";
echo '              <!-- Custom Text Color Utilities -->' . "\n";
echo '              <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                  <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-cogs"></i> App Settings</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                    <form method="post">' . "\n";
echo '                        <div class="form-group ">' . "\n";
echo '                            <label class="control-label " for="appname">' . "\n";
echo '                                <strong> App Name</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input class="form-control text-primary" name="appname" value="' . $appname . '" type="text"/>' . "\n";
echo '                            </div>' . "\n";
echo '                        </div>' . "\n";
echo '                        <div class="form-group ">' . "\n";
echo '                            <label class="control-label " for="customerid">' . "\n";
echo '                                <strong> Customer Id Number</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input class="form-control text-primary" name="customerid"  value="' . $customerid . '" type="text"/>' . "\n";
echo '                            </div>' . "\n";
echo '                        </div>' . "\n";
echo '                        <div class="form-group ">' . "\n";
echo '                            <label class="control-label " for="expire">' . "\n";
echo '                                <strong> App Expiry</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input class="form-control text-primary" name="expire"  value="' . $expire . '" type="text"/>' . "\n";
echo '                            </div>' . "\n";
echo '                        </div>' . "\n";
echo "\t\t\t\t\t" . '<form method="post">' . "\t\t\t\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label " for="support_email">' . "\n";
echo '                                <strong> Developer Name</strong> ' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input class="form-control text-primary" name="support_email" value="' . $support_email . '" type="text"/>' . "\n";
echo '                            </div>' . "\n";
echo '                            </div>' . "\n";
echo '                    <form method="post">' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label " for="support_phone">' . "\n";
echo '                                <strong>Developer Contact</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input class="form-control text-primary" name="support_phone"  value="' . $support_phone . '" type="text"/>' . "\n";
echo '                            </div>' . "\n";
echo '                            </div>' . "\n";
echo '                    <form method="post">' . "\n";
echo '                            <div class="form-group ">' . "\n";
echo '                            <label class="control-label " for="backupurl">' . "\n";
echo '                                <strong>Backup URL</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <div class="input-group">' . "\n";
echo '                            <input class="form-control text-primary" name="backupurl"  value="' . $backupurl . '" type="text"/>' . "\n";
echo '                            </div>' . "\n";
echo '                            </div>' . "\n";

if ($json['btn_login_account'] == 'yes') {
	echo '                            <div class="form-group ">' . "\n";
	echo '                            <label class="control-label " for="btn_signup">' . "\n";
	echo '                                <strong> Signup Url</strong> ' . "\n";
	echo '                            </label>' . "\n";
	echo '                            <div class="input-group">' . "\n";
	echo '                            <input class="form-control text-primary" name="btn_signup" value="' . $btn_signup . '" type="text"/>' . "\n";
	echo '                            </div>' . "\n";
	echo '                            </div>' . "\n";
}
else {
	echo '                            <div class="form-group ">' . "\n";
	echo '                            <label class="control-label " for="btn_signup">' . "\n";
	echo '                                <strong> Signup Url</strong> ' . "\n";
	echo '                            </label>' . "\n";
	echo '                            <div class="input-group">' . "\n";
	echo '                            <input class="form-control text-primary" name="btn_signup" value="no" type="text" readonly/>' . "\n";
	echo '                            </div>' . "\n";
	echo '                            </div>' . "\n";
}

echo "\t\t\t" . '        <form method="post">' . "\n";
echo "\t\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="btn_login_account" >' . "\n";
echo '                                <strong> Signup Button</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <p' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_login_account" value="yes"  ' . "\n";

if ($json['btn_login_account'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_login_account" value="no" ' . "\n";

if ($json['btn_login_account'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t" . '    ' . "\t" . '<form method="post">' . "\n";
echo "\t\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="announcement_enabled" >' . "\n";
echo '                                <strong> Announcements</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                            <p' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="announcement_enabled" value="yes"  ' . "\n";

if ($json['announcement_enabled'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="announcement_enabled" value="no" ' . "\n";

if ($json['announcement_enabled'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo '<div class="form-group">' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<label class="control-label " for="message_enabled">' . "\n";
echo '                            <strong>Show Messages</strong>' . "\n";
echo '                                    </label> ' . "\t\n";
echo "\t\t\t\t\t\t\t" . '<p' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="message_enabled" value="yes"  ' . "\n";

if ($json['message_enabled'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="message_enabled" value="no" ' . "\n";

if ($json['message_enabled'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t" . '<form method="post">' . "\n";
echo "\t\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                            <label class="control-label requiredField" for="updateuserinfo_enabled" >' . "\n";
echo '                                <strong> Update User Info</strong>' . "\n";
echo '                            </label>' . "\n";
echo '                             <p' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="updateuserinfo_enabled" value="yes"  ' . "\n";

if ($json['updateuserinfo_enabled'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="updateuserinfo_enabled" value="no" ' . "\n";

if ($json['updateuserinfo_enabled'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="show_expire" >' . "\n";
echo '                        <strong> Show Sub Expiry</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="show_expire" value="yes"  ' . "\n";

if ($json['show_expire'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="show_expire" value="no" ' . "\n";

if ($json['show_expire'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                            <div>' . "\n";
echo '                            <button class="btn btn-success btn-icon-split" name="submit_support" type="submit">' . "\n";
echo '                            <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Update Details</span>' . "\n";
echo '                            </button>' . "\n";
echo '                            </div>' . "\n";
echo '                        </div>' . "\n";
echo '                    </form>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo "\n";
echo '            <!-- Second Column -->' . "\n";
echo '            <div class="col-lg-4">' . "\n";
echo "\n";
echo '              <!-- Background Gradient Utilities -->' . "\n";
echo '              <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                  <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-server"></i> Settings</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                  <form method="post">' . "\n";
echo '                                  <div class="form-group ">' . "\n";
echo '                                      <label class="control-label " for="portal_name">' . "\n";
echo '                                       <strong> Portal 1 Name</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal_name" name="portal_name" placeholder="Portal 1 Name" value="' . $portal_name . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal">' . "\n";
echo '                                       <strong> Portal 1 Address</strong> ' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal" name="portal" placeholder="Poral Address 1" value="' . $portal . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal2_name">' . "\n";
echo '                                        <strong>Portal 2 Name</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal2_name" name="portal2_name" placeholder="Portal 2 Name" value="' . $portal2_name . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal2">' . "\n";
echo '                                       <strong> Portal 2 Address</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal2" name="portal2" placeholder="Poral Address 2" value="' . $portal2 . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal3_name">' . "\n";
echo '                                       <strong> Portal 3 Name</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal3_name" name="portal3_name" placeholder="Portal 3 Name" value="' . $portal3_name . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal3">' . "\n";
echo '                                       <strong> Portal 3 Address</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal3" name="portal3" placeholder="Poral Address 3" value="' . $portal3 . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal4_name">' . "\n";
echo '                                       <strong> Portal 4 Name</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal4_name" name="portal4_name" placeholder="Portal 4 Name" value="' . $portal4_name . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal4">' . "\n";
echo '                                       <strong> Portal 4 Address</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal4" name="portal4" placeholder="Poral Address 4" value="' . $portal4 . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal5_name">' . "\n";
echo '                                       <strong> Portal 5 Name</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal5_name" name="portal5_name" placeholder="Portal 5 Name" value="' . $portal5_name . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal5">' . "\n";
echo '                                       <strong> Portal 5 Address</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal5" name="portal5" placeholder="Poral Address 5" value="' . $portal5 . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";

if ($json['btn_vpn'] == 'yes') {
	echo '                                <div class="form-group ">' . "\n";
	echo '                                    <label class="control-label " for="ovpn_url">' . "\n";
	echo '                                        <strong> Vpn Config Url</strong>' . "\n";
	echo '                                    </label>' . "\n";
	echo '                                    <div class="input-group">' . "\n";
	echo '                                        <input class="form-control text-primary" id="ovpn_url" name="ovpn_url" placeholder="OpeVpn Config Url" value="' . $ovpn_url . '" type="text"/>' . "\n";
	echo '                                    </div>' . "\n";
	echo '                                </div>' . "\n";
}
else {
	echo '                                <div class="form-group ">' . "\n";
	echo '                                    <label class="control-label " for="ovpn_url">' . "\n";
	echo '                                        <strong> Vpn Config Url</strong>' . "\n";
	echo '                                    </label>' . "\n";
	echo '                                    <div class="input-group">' . "\n";
	echo '                                        <input class="form-control text-primary" id="ovpn_url" name="ovpn_url" placeholder="VPN Config Url" value="' . $ovpn_url . '" type="text"/ disabled>' . "\n";
	echo '                                    </div>' . "\n";
	echo '                                </div>' . "\n";
}

echo "\t\t\t\t\t" . '    <form method="post">' . "\n";
echo "\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="btn_vpn" >' . "\n";
echo '                        <strong> Show Vpn Button</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_vpn" value="yes"  ' . "\n";

if ($json['btn_vpn'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_vpn" value="no" ' . "\n";

if ($json['btn_vpn'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t" . '    <div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="btn_pr" >' . "\n";
echo '                        <strong> Show Reminder Button</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_pr" value="yes"  ' . "\n";

if ($json['btn_pr'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_pr" value="no" ' . "\n";

if ($json['btn_pr'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t\t" . '<form method="post">' . "\n";
echo "\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="btn_rec" >' . "\n";
echo '                        <strong> Show Record Button</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_rec" value="yes"  ' . "\n";

if ($json['btn_rec'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_rec" value="no" ' . "\n";

if ($json['btn_rec'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t" . '    <form method="post">' . "\n";
echo "\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="btn_noti" >' . "\n";
echo '                        <strong> Show Message Button</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_noti" value="yes"  ' . "\n";

if ($json['btn_noti'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_noti" value="no" ' . "\n";

if ($json['btn_noti'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo "\t\t\t\t\t" . '    <form method="post">' . "\n";
echo "\t\t\t\t\t\t" . '<div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="btn_update" >' . "\n";
echo '                        <strong> Show Update Button</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <p>' . "\t\t\n";
echo "\t\t\t\t\t\t\t" . '<label>True' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_update" value="yes"  ' . "\n";

if ($json['btn_update'] == 'yes') {
	echo 'checked=\\"checked\\"';
}

echo "\t" . '>' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '<label>False' . "\n";
echo "\t\t\t\t\t\t\t" . '<input type="radio" name="btn_update" value="no" ' . "\n";

if ($json['btn_update'] == 'no') {
	echo 'checked=\\"checked\\"';
}

echo "\t\t\t\t\t\t\t" . '  ' . "\n";
echo "\t\t\t\t\t\t\t" . '</label>' . "\n";
echo "\t\t\t\t\t\t\t" . '</div>';
echo '                        <form method="post">' . "\n";
echo "\t\t\t\t\t\t\t\t" . '    <div class="form-group ">' . "\n";
echo '                             <button class="btn btn-success btn-icon-split" name="submit" type="submit">' . "\n";
echo '                            <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Update Portals</span>' . "\n";
echo '                            </button>' . "\n";
echo '                            </div>' . "\n";
echo '                        </div>' . "\n";
echo '                    </form>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo "\n";
echo "\n";
echo '            <!-- Third Column -->' . "\n";
echo '            <div class="col-lg-4">' . "\n";
echo "\n";
echo '              <!-- Grayscale Utilities -->' . "\n";
echo '              <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                  <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-gamepad"></i> Control</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                    <form method="post">' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal_vod">' . "\n";
echo '                                        <strong> VOD Portal</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal_vod" name="portal_vod" placeholder="Custom VOD Portal" value="' . $portal_vod . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="portal_series">' . "\n";
echo '                                       <strong> Series Portal</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="portal_series" name="portal_series" placeholder="Custom Series Portal" value="' . $portal_series . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="epg_url">' . "\n";
echo '                                       <strong> Epg Url</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="epg_url" name="epg_url" placeholder="Epg Url" value="' . $epg_url . '" type="text"/>    ' . "\n";
echo '                                        </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="btn_live">' . "\n";
echo '                                        Show <strong>Live TV</strong> Icon?' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <br>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_live" id="btn_live" value="Yes"' . "\n";

if ($btn_live == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_live">Portal 1</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_live2" id="btn_live2" value="Yes"' . "\n";

if ($btn_live2 == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_live2">Portal 2</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_live3" id="btn_live3" value="Yes"' . "\n";

if ($btn_live3 == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_live3">Portal 3</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_live4" id="btn_live4" value="Yes"' . "\n";

if ($btn_live4 == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_live4">Portal 4</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_live5" id="btn_live5" value="Yes"' . "\n";

if ($btn_live5 == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_live5">Portal 5</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="btn_epg">' . "\n";
echo '                                        Show <strong>TV Guide</strong> Icon?' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <br>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_epg" id="btn_epg" value="Yes"' . "\n";

if ($btn_epg == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_epg">Portal 1</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_epg2" id="btn_live2" value="Yes"' . "\n";

if ($btn_epg2 == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_epg2">Portal 2</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_epg3" id="btn_epg3" value="Yes"' . "\n";

if ($btn_epg3 == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_epg3">Portal 3</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_epg4" id="btn_live4" value="Yes"' . "\n";

if ($btn_epg4 == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_epg4">Portal 4</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_epg5" id="btn_epg5" value="Yes"' . "\n";

if ($btn_epg5 == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_epg5">Portal 5</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="btn_vod">' . "\n";
echo '                                        Show <strong>VOD</strong> Icon?' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <br>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_vod" id="btn_vod" value="Yes"' . "\n";

if ($btn_vod == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_vod">Portal 1</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_vod2" id="btn_vod2" value="Yes"' . "\n";

if ($btn_vod2 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_vod2">Portal 2</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_vod3" id="btn_vod3" value="Yes"' . "\n";

if ($btn_vod3 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_vod3">Portal 3</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_vod4" id="btn_vod4" value="Yes"' . "\n";

if ($btn_vod4 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_vod4">Portal 4</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_vod5" id="btn_vod5" value="Yes"' . "\n";

if ($btn_vod5 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_vod5">Portal 5</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="btn_series">' . "\n";
echo '                                        Show <strong>Series</strong> Icon?' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <br>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_series" id="btn_series" value="Yes"' . "\n";

if ($btn_series == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_series">Portal 1</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_series2" id="btn_series2" value="Yes"' . "\n";

if ($btn_series2 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_series2">Portal 2</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_series3" id="btn_series3" value="Yes"' . "\n";

if ($btn_series3 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_series3">Portal 3</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_series4" id="btn_series4" value="Yes"' . "\n";

if ($btn_series4 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_series4">Portal 4</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_series5" id="btn_series5" value="Yes"' . "\n";

if ($btn_series5 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_series5">Portal 5</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="btn_catchup">' . "\n";
echo '                                        Show <strong>Catchup</strong> Icon?' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <br>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_catchup" id="btn_catchup" value="Yes"' . "\n";

if ($btn_catchup == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_catchup">Portal 1</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_catchup2" id="btn_catchup2" value="Yes"' . "\n";

if ($btn_catchup2 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_catchup2">Portal 2</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_catchup3" id="btn_catchup3" value="Yes"' . "\n";

if ($btn_catchup3 == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_catchup3">Portal 3</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_catchup4" id="btn_catchup4" value="Yes"' . "\n";

if ($btn_catchup4 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_catchup4">Portal 4</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_catchup5" id="btn_catchup5" value="Yes"' . "\n";

if ($btn_catchup5 == 'Yes') {
	echo 'checked';
}

echo "\t\t\t\t\t\t\t\t\t\t" . '<label class="form-check-label" for="btn_catchup5">Portal 5</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="btn_radio">' . "\n";
echo '                                        Show <strong>Radio</strong> Icon?' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <br>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_radio" id="btn_radio" value="Yes"' . "\n";

if ($btn_radio == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_radio">Portal 1</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_radio2" id="btn_radio2" value="Yes"' . "\n";

if ($btn_radio2 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_radio2">Portal 2</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_radio3" id="btn_radio3" value="Yes"' . "\n";

if ($btn_radio3 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_radio3">Portal 3</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_radio4" id="btn_radio4" value="Yes"' . "\n";

if ($btn_radio4 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_radio4">Portal 4</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_radio5" id="btn_radio5" value="Yes"' . "\n";

if ($btn_radio5 == 'Yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_radio5">Portal 5</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="ms">' . "\n";
echo '                                        Show <strong>Multi-Screens</strong> Icon?' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <br>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="ms" id="ms" value="yes"' . "\n";

if ($ms == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="ms">Portal 1</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="ms2" id="ms2" value="yes"' . "\n";

if ($ms2 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="ms2">Portal 2</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="ms3" id="ms3" value="yes"' . "\n";

if ($ms3 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="ms3">Portal 3</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="ms4" id="ms4" value="yes"' . "\n";

if ($ms4 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="ms4">Portal 4</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="ms5" id="ms5" value="yes"' . "\n";

if ($ms5 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="ms5">Portal 5</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="btn_fav">' . "\n";
echo '                                        Show <strong>Favorite</strong> Icon?' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <br>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_fav" id="btn_fav" value="yes"' . "\n";

if ($btn_fav == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_fav">Portal 1</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_fav2" id="btn_fav2" value="yes"' . "\n";

if ($btn_fav2 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_fav2">Portal 2</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_fav3" id="btn_fav3" value="yes"' . "\n";

if ($btn_fav3 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_fav3">Portal 3</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_fav4" id="btn_fav4" value="yes"' . "\n";

if ($btn_fav4 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_fav4">Portal 4</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_fav5" id="btn_fav5" value="yes"' . "\n";

if ($btn_fav5 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_fav5">Portal 5</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="btn_account">' . "\n";
echo '                                        Show <strong>Account</strong> Icon?' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <br>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_account" id="btn_account" value="yes"' . "\n";

if ($btn_account == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_account">Portal 1</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_account2" id="btn_account2" value="yes"' . "\n";

if ($btn_account2 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_account2">Portal 2</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_account3" id="btn_account3" value="yes"' . "\n";

if ($btn_account3 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_account3">Portal 3</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_account4" id="btn_account4" value="yes"' . "\n";

if ($btn_account4 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_account4">Portal 4</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                    <div class="form-check form-check-inline">' . "\n";
echo '                                        <input class="form-check-input" type="checkbox" name="btn_account5" id="btn_account5" value="yes"' . "\n";

if ($btn_account5 == 'yes') {
	echo 'checked';
}

echo '                                        <label class="form-check-label" for="btn_account5">Portal 5</label>' . "\n";
echo '                                    </div>' . "\n";
echo '                                        </div>' . "\n";
echo '                                 </br>' . "\n";
echo '                                <div class="form-group">' . "\n";
echo '                                    <div>' . "\n";
echo '                             <button class="btn btn-success btn-icon-split" name="submit_app_custom" type="submit">' . "\n";
echo '                            <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Update Icons</span>' . "\n";
echo '                            </button>' . "\n";
echo '                                        </div>' . "\n";
echo '                                </div>' . "\n";
echo '                            </form>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo "\n";
echo '      ' . "\n";
echo '      <!-- Footer -->' . "\n";
include 'includes/footer.php';
require 'includes/appsnscripts.php';
echo '      </body>' . "\n";

?>