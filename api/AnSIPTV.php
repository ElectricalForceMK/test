<?php

function real_ip()
{
	$ip = 'undefined';

	if (isset($_SERVER)) {
		$ip = $_SERVER['REMOTE_ADDR'];

		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
	}
	else {
		$ip = getenv('REMOTE_ADDR');

		if (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		else if (getenv('HTTP_CLIENT_IP')) {
			$ip = getenv('HTTP_CLIENT_IP');
		}
	}

	$ip = htmlspecialchars($ip, ENT_QUOTES, 'UTF-8');
	return $ip;
}

date_default_timezone_set('Europe/London');
$PING = date('d-m-Y H:i:s');
$jsondata = file_get_contents('./ann.json');
$json = json_decode($jsondata, true);
$announcement = $json['announcement'];
$ann_status = $json['status'];
$ann_expire = $json['expire'];
$ann_interval = $json['interval'];
$ann_disappear = $json['disappear'];

if (isset($_GET['userid'])) {
	$UserID = $_GET['userid'];
}

if (isset($_GET['cid'])) {
	$cid = $_GET['cid'];
}

if (isset($_GET['aid'])) {
	$aid = $_GET['aid'];
}

if (isset($_GET['l'])) {
	$lic = $_GET['l'];
}

if (isset($_GET['b'])) {
	$bb = $_GET['b'];
}

if (isset($_GET['a'])) {
	$app = $_GET['a'];
}

if (isset($_GET['appid'])) {
	$appid = $_GET['appid'];
}

if (isset($_GET['version'])) {
	$version = $_GET['version'];
}

if (isset($_GET['device_type'])) {
	$device = $_GET['device_type'];
}

if (isset($_GET['p'])) {
	$p = $_GET['p'];
}

if (isset($_GET['an'])) {
	$a_name = $_GET['an'];
}

if (isset($_GET['customerid'])) {
	$customer = $_GET['customerid'];
}

if (isset($_GET['online'])) {
	$online = $_GET['online'];
}

if (isset($_GET['did'])) {
	$did = $_GET['did'];
}

if (isset($_GET['ans'])) {
	$LASTTIME = date('d-m-Y H:i:s');
	$Tag = $_GET['ans'];

	if ($Tag == 'licv3') {
		echo bin2hex(openssl_encrypt(file_get_contents('./main.json'), 'AES-128-CBC', 'Anspanelskeymain', OPENSSL_RAW_DATA, 'Anspanelskeypara'));
	}

	if ($Tag == 'connv2') {
		$TIME = date('d-m-Y H:i:s');
		$IPADDRESS = real_ip();

		if (isset($_GET['userid'])) {
			$UserID = $_GET['userid'];
		}
		else {
			$UserID = '';
		}

		$db1 = new SQLite3('./user_logs.db');
		$db1->exec('CREATE TABLE IF NOT EXISTS logging(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, appid TEXT, version TEXT, device TEXT, pkg TEXT, app TEXT, cid TEXT, uid TEXT, status TEXT, d TEXT, time TEXT, last_online TEXT, ping TEXT, ip TEXT)');
		$res1 = $db1->query('SELECT * FROM logging WHERE uid=\'' . $UserID . '\'');

		while ($row5 = $res1->fetchArray()) {
			$app_id = $row5['appid'];
		}

		if (empty($app_id)) {
			$db1->exec('INSERT INTO logging(appid, version, device, pkg, app, cid, uid, status, d, time, ping, ip) VALUES(\'' . $_GET['appid'] . '\', \'' . $_GET['version'] . '\', \'' . $_GET['device_type'] . '\', \'' . $_GET['p'] . '\',\'' . $_GET['an'] . '\', \'' . $_GET['customerid'] . '\', \'' . $_GET['userid'] . '\', \'' . $_GET['online'] . '\', \'' . $_GET['did'] . '\', \'' . $TIME . '\', \'' . $PING . '\', \'' . $IPADDRESS . '\')');
		}
		else if ($_GET['online'] == 'yes') {
			$db1->exec('UPDATE logging SET appid=\'' . $_GET['appid'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  version=\'' . $_GET['version'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  device=\'' . $_GET['device_type'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  pkg=\'' . $_GET['p'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  app=\'' . $_GET['an'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  cid=\'' . $_GET['customerid'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  status=\'' . $_GET['online'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  d=\'' . $_GET['did'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  last_online=\'' . $LASTTIME . '\',' . "\r\n\t\t\t\t\t\t\t" . '  ping=\'' . $PING . '\',' . "\r\n\t\t\t\t\t\t\t" . '  ip=\'' . $IPADDRESS . '\'' . "\r\n\t\t\t\t\t\t" . '  WHERE ' . "\r\n\t\t\t\t\t\t\t" . '  uid=\'' . $_GET['userid'] . '\'');
		}
		else {
			$db1->exec('UPDATE logging SET appid=\'' . $_GET['appid'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  version=\'' . $_GET['version'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  device=\'' . $_GET['device_type'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  pkg=\'' . $_GET['p'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  app=\'' . $_GET['an'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  cid=\'' . $_GET['customerid'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  status=\'' . $_GET['online'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  d=\'' . $_GET['did'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  ping=\'' . $PING . '\',' . "\r\n\t\t\t\t\t\t\t" . '  ip=\'' . $IPADDRESS . '\'' . "\r\n\t\t\t\t\t\t" . '  WHERE ' . "\r\n\t\t\t\t\t\t\t" . '  uid=\'' . $_GET['userid'] . '\'');
		}

		$db = new SQLite3('./user_message.db');
		$res = $db->query('SELECT * ' . "\r\n\t\t\t\t\t\t" . 'FROM messages ' . "\r\n\t\t\t\t\t\t" . 'WHERE userid=\'' . $UserID . '\'');

		while ($row = $res->fetchArray()) {
			$message = $row['message'];
			$userid = $row['userid'];
			$status = $row['status'];
			$expire = $row['expire'];
		}

		if (empty($message)) {
			echo '{"tag":"connv2","success":"1","api_ver":"1.0v","message":"","msgid": "1646","msg_status":"INACTIVE","msg_expire": "2021-01-30 05:00:00","announcement": "' . $announcement . '","ann_status": "' . $ann_status . '","ann_expire": "' . $ann_expire . '","ann_interval": "' . $ann_interval . '","ann_disappear": "' . $ann_disappear . '"}';
		}
		else {
			echo '{"tag":"connv2","success": "1","api_ver":"1.0v","message":"' . $message . '","msgid": "1646","msg_status":"' . $status . '","msg_expire":"' . $expire . '","announcement":"' . $announcement . '","ann_status":"' . $ann_status . '","ann_expire":"' . $ann_expire . '","ann_interval":"' . $ann_interval . '","ann_disappear":"' . $ann_disappear . '"}';
		}
	}

	if ($Tag == 'whatsup') {
		echo '{' . "\r\n\t\t\t" . '"tag":"whatsup",' . "\r\n\t\t\t" . '"success":"0",' . "\r\n\t\t\t" . '"api_ver":"1.0v",' . "\r\n\t\t\t" . '"whatsup":"no"' . "\r\n\t\t" . '}';
	}

	if ($Tag == 'gfilter_n') {
		echo '{"tag":"gfilter_n","success":"0","api_ver":"1.0v","status":"No","filter":[]}';
	}

	if ($Tag == 'vpnconfigV2') {
		if (isset($cid)) {
			$db = new SQLite3('appsnscriptspanelsvpn.db');
			$res = $db->query('SELECT * FROM vpn');

			while ($row = $res->fetchArray()) {
				$vpn_status = $row['vpn_status'];
			}

			if (empty($vpn_status)) {
				$ansvpn = '{"tag":"ERROR","success":"0","api_ver":"1.0v","msg":"JSON ERROR"}';
			}
			else {
				while ($rows = $res->fetchArray(SQLITE3_ASSOC)) {
					$data[] = $rows;
				}

				$ans = json_encode($data);
				$ansvpn = '{"tag":"vpnconfigV2","success":"1","api_ver":"1.0v","vpnconfigs":' . $ans . '}';
			}

			echo bin2hex(openssl_encrypt($ansvpn, 'AES-128-CBC', 'Anspanelskeymain', OPENSSL_RAW_DATA, 'Anspanelskeypara'));
		}
		else {
			echo '{"tag":"ERROR","success":"0","api_ver":"1.0v","msg":"JSON ERROR"}';
		}
	}

	if ($Tag == 'intro') {
		$real_file_location_path_or_url = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] !== 'off') ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF'], 2) . '/intro.mp4';
		ob_start();

		if (isset($_SERVER['HTTP_RANGE'])) {
			$opts['http']['header'] = 'Range: ' . $_SERVER['HTTP_RANGE'];
		}

		$opts['http']['method'] = 'HEAD';
		$conh = stream_context_create($opts);
		$opts['http']['method'] = 'GET';
		$cong = stream_context_create($opts);
		$out[] = file_get_contents($real_file_location_path_or_url, false, $conh);
		$out[] = $http_response_header;
		ob_end_clean();
		array_map('header', $http_response_header);
		readfile($real_file_location_path_or_url, false, $cong);
	}

	if ($Tag == 'checkupdate') {
		$jsondata1 = file_get_contents('./main.json');
		$data1 = json_decode($jsondata1, true);
		$json1 = $data1['app'];
		$apkurl1 = $json1['apkurl'];
		$version_code1 = $json1['version_code'];
		echo '{"tag":"checkupdate","success":"1","api_ver":"1.0v","version_code":"' . $version_code1 . '","apkurl":"' . $apkurl1 . '"}';
	}
}
else {
	include 'index.php';
}

?>