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

session_start();
$jsondata111 = file_get_contents('./includes/appsnscripts.json');
$json111 = json_decode($jsondata111, true);
$col1 = $json111['info'];
$col2 = $col1['aa'];
$db_check1 = new SQLite3('./api/appsnscriptspanels.db');
$db_check1->exec('CREATE TABLE IF NOT EXISTS USERS(id INT PRIMARY KEY NOT NULL,NAME TEXT,USERNAME TEXT,PASSWORD TEXT,LOGO TEXT)');
$rows = $db_check1->query('SELECT COUNT(*) as count FROM USERS');
$row = $rows->fetchArray();
$numRows = $row['count'];

if ($numRows == 0) {
	$db_check1->exec('INSERT INTO USERS(id,NAME,USERNAME,PASSWORD,LOGO) VALUES(\'1\',\'𝐄𝐥𝐞𝐜𝐭𝐫𝐢𝐜𝐚𝐥𝐅𝐨𝐫𝐜𝐞 𝐀𝐝𝐦𝐢𝐧 𝐏𝐚𝐧𝐞𝐥\',\'admin\',\'admin\',\'img/xciptv.png\')');
	$db_check1->exec('INSERT INTO USERS(id,NAME,USERNAME,PASSWORD,LOGO) VALUES(\'2\',\'ADMIN\',\'ADMINXC\',\'ADMINXC\',\'img/xciptv.png\')');
}

$res_login = $db_check1->query('SELECT * ' . "\n\t\t\t\t" . '  FROM USERS ' . "\n\t\t\t\t" . '  WHERE id=\'1\'');
$row_login = $res_login->fetchArray();
$name_login = $row_login['NAME'];
$logo_login = $row_login['LOGO'];

if (isset($_POST['login'])) {
	if (!$db_check1) {
		echo $db_check1->lastErrorMsg();
	}

	$sql_check = 'SELECT * from USERS where USERNAME="' . $_POST['username'] . '"';
	$ret_check = $db_check1->query($sql_check);

	while ($row_check = $ret_check->fetchArray()) {
		$id_check = $row_check['id'];
		$NAME = $row_check['NAME'];
		$username_check = $row_check['USERNAME'];
		$password_check = $row_check['PASSWORD'];
		$LOGO_check = $row_check['LOGO'];
	}

	if (empty($id_check)) {
		$message = '<div class="alert alert-danger" id="flash-msg"><h4><i class="icon fa fa-times"></i>Not a Valid User!</h4></div>';
		echo $message;
	}
	else if ($password_check == $_POST['password']) {
		$_SESSION['appsnscriptsxc'] = true;
		$_SESSION['N'] = $id_check;
		$_SESSION['id'] = $id_check;
		header('Location: app.php');
	}
	else {
		$message = '<div class="alert alert-danger" id="flash-msg"><h4><i class="icon fa fa-times"></i>Wrong Password!</h4></div>';
		echo $message;
	}

	$db_check1->close();
}

$date = date('d-m-Y H:i:s');
$IPADDRESS = real_ip();
$db1 = new SQLite3('./api/logs.db');
$db1->exec('CREATE TABLE IF NOT EXISTS logs(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date datetime, ipaddress TEXT)');
$db1->exec('INSERT INTO logs(date,ipaddress) VALUES(\'' . $date . '\',\'' . $IPADDRESS . '\')');
$db2 = new SQLite3('./api/user_message.db');
$db2->exec('CREATE TABLE IF NOT EXISTS messages(id INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL, message VARCHAR(100), userid TEXT,status TEXT,expire TEXT)');
$db3 = new SQLite3('./api/user_logs.db');
$db3->exec('CREATE TABLE IF NOT EXISTS logging(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, appid TEXT, version TEXT, device TEXT, pkg TEXT, app TEXT, cid TEXT, uid TEXT, status TEXT, d TEXT, time TEXT, last_online TEXT, ping TEXT)');
echo '<!DOCTYPE html>' . "\n";
echo '<html>' . "\n";
echo "\n";
echo '<head>' . "\n";
echo '    <meta charset="utf-8">' . "\n";
echo '    <meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\n";
echo '    <meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
echo '    <title>Ultra Xciptv</title>' . "\n";
echo '    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">' . "\n";
echo '    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">' . "\n";
echo '    <link href="css/sb-admin-' . $col2 . '.css" rel="stylesheet">' . "\n";
echo '    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">' . "\n";
echo '    <link rel="icon" href="favicon.ico" type="image/x-icon">' . "\n";
echo '</head>' . "\n";
echo "\t" . '<body class="bg-gradient-primary">' . "\n";
echo "\t" . '<div class="container">' . "\n";
echo "\t" . '<div class="row justify-content-center">' . "\n";
echo "\t" . '<center>' . "\n";
echo '<body>' . "\n";
echo '  <div class="wrapper ">' . "\n";
echo '  <br><br><br>' . "\n";
echo "\t" . '<div class="container" style="margin-top:30px">' . "\n";
echo "\t" . '    <div style="width:400px; margin:0 auto;">' . "\n";
echo "\t\t" . '<div class="row">' . "\n";
echo "\t\t\t" . '<div class="center">' . "\n";
echo '                          <center><img src="' . $logo_login . '" width="100" height="100" class="center" alt=""></a></center>' . "\n";
echo "\t\t\t\t" . '<br>' . "\n";
echo "\t\t\t" . '    <h3 class="text-center text-light"><strong>Ultra Xciptv v5 by ElectricalForce</strong></h3>' . "\n";
echo "\t\t\t" . '    <h3 class="text-center text-light">' . $name_login . '</h3>' . "\n";
echo "\t\t\t\t" . '<h5 class="text-center text-light">Welcome</h5>' . "\n";
echo "\t\t\t\t" . '<br>' . "\n";
echo "\t\t\t\t" . '<div>' . "\n";
echo "\t\t\t\t" . '    <div style="width:400px; margin:0 auto;">' . "\n";
echo "\t\t\t\t\t" . '<form method="post">' . "\n";
echo "\t\t\t\t\t" . '<input type="text" class="form-control text-primary" placeholder="Username" name="username" required autofocus><br>' . "\n";
echo "\t\t\t\t\t" . '<input type="password" class="form-control text-primary" placeholder="Password" name="password" required><br>' . "\n";
echo "\t\t\t\t\t" . '<button class="btn btn-lg btn btn-primary btn-block" name="login" type="submit">LOGIN</button>' . "\n";
echo "\t\t\t\t\t" . '</form>' . "\n";
echo "\t\t\t\t" . '</div>' . "\n";
echo "\t\t\t" . '<div class="card-body">' . "\n";
echo "\t\t\t\t" . '<div class="panel-body">' . "\n";
echo "\t\t\t\t" . '<p class="text-center text-warning">Time Of Arrival: "<i>';
echo date('d-m-Y H:i:s');
echo '</i>"</p>' . "\n";
echo "\t\t\t\t" . '<p class="text-center text-warning">IP Address: "<i>';
echo real_ip();
echo ' </i>"</p>' . "\n";
echo "\t\t\t" . '</div>' . "\n";
echo "\t\t\t" . '</div>' . "\n";
echo '      <!-- Footer -->' . "\n";
echo '      <footer class="">' . "\n";
echo '        <div class="container">' . "\n";
echo '          <div class="copyright text-center my-auto">' . "\n";
echo '          </div>' . "\n";
echo '        </div>' . "\n";
echo '      </footer>';
echo "\t" . '</div>' . "\n";
echo "\t" . '</div>' . "\n";
echo "\t" . '</div>' . "\n";
echo "\t" . '</div>' . "\n";
echo "\t" . '</div>' . "\n";
echo "\t" . '</div>' . "\n";
echo "\t" . '<script src="vendor/jquery/jquery.min.js"></script>' . "\n";
echo "\t" . '<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>' . "\n";
echo "\t" . '<script src="vendor/jquery-easing/jquery.easing.min.js"></script>' . "\n";
echo "\t" . '<script src="js/sb-admin-2.min.js"></script>' . "\n";
echo "\n";
include 'includes/functions.php';
require 'includes/appsnscripts.php';
echo '</body>' . "\n";
echo "\n";
echo '</html>' . "\n";

?>