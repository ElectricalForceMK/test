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

require 'includes/check.php';
$ifofuser_check = $_SESSION['id'];
$jsondata_admin = file_get_contents('./includes/appsnscripts.json');
$data_admin = json_decode($jsondata_admin, true);
$json_admin = $data_admin['info'];
$col_admin = $json_admin['oo'];

if ($col_admin == '0') {
	header('Location: app.php');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db1 = new SQLite3('./api/user_logs.db');
$db1->exec('CREATE TABLE IF NOT EXISTS logging(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, appid TEXT, version TEXT, device TEXT, pkg TEXT, app TEXT, cid TEXT, uid TEXT, status TEXT, d TEXT, time TEXT, last_online TEXT, ping TEXT, ip TEXT)');
$res1 = $db1->query('SELECT * FROM logging WHERE status=\'yes\'');

if (isset($_GET['delete'])) {
	$db1->exec('DELETE FROM logging WHERE id=' . $_GET['delete']);
	header('Location: users.php');
}

include 'includes/header.php';
echo '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' . "\n";
echo '    <div class="modal-dialog">' . "\n";
echo '        <div class="modal-content">' . "\n";
echo '            <div class="modal-header">' . "\n";
echo '                <h2>Confirm</h2>' . "\n";
echo '            </div>' . "\n";
echo '            <div class="modal-body">' . "\n";
echo '                Do you really want to delete?' . "\n";
echo '            </div>' . "\n";
echo '            <div class="modal-footer">' . "\n";
echo '                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>' . "\n";
echo '                <a class="btn btn-danger btn-ok">Delete</a>' . "\n";
echo '            </div>' . "\n";
echo '        </div>' . "\n";
echo '    </div>' . "\n";
echo '</div>' . "\n";
echo '<main role="main" class="col-15 pt-4 px-5"><div class="row justify-text-center"><div class="chartjs-size-monitor" style="position:absolute ; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>' . "\n";
echo '          <div id="main">' . "\n";
echo '            ' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class=" h3 mb-1 text-gray-800"> ' . $numRows_count . ' Online Users</h1>' . "\n";
echo '                        <a button class="btn btn-primary btn-icon-split" id="button" href="./all_users.php">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span><span class="text">All Users</span>' . "\n";
echo '                        </button></a>' . "\n";
echo '          </div>' . "\n";
echo "\t\t" . '<div class="table-responsive">' . "\n";
echo "\t\t\t" . '<table class="table table-striped table-sm">' . "\n";
echo "\t\t\t" . '<thead class= "text-primary">' . "\n";
echo "\t\t\t\t" . '<tr>' . "\n";
echo "\t\t\t\t" . '<th>User ID</th>' . "\n";
echo "\t\t\t\t" . '<th>IP Address</th>' . "\n";
echo "\t\t\t\t" . '<th>Online</th>' . "\n";
echo "\t\t\t\t" . '<th>Last Online</th>' . "\n";
echo "\t\t\t\t" . '<th>App ID</th>' . "\n";
echo "\t\t\t\t" . '<th>Version</th>' . "\n";
echo "\t\t\t\t" . '<th>Device</th>' . "\n";
echo "\t\t\t\t" . '<th>Package Name</th>' . "\n";
echo "\t\t\t\t" . '<th>App Name</th>' . "\n";
echo "\t\t\t\t" . '<th>Customer ID</th>' . "\n";
echo "\t\t\t\t" . '<th>First Registered</th>' . "\n";
echo "\t\t\t\t" . '<th>Last Connection</th>' . "\n";
echo "\t\t\t\t" . '<th>Delete</th>' . "\n";
echo "\t\t\t\t" . '</tr>' . "\n";
echo "\t\t\t" . '</thead>' . "\n";

while ($row1 = $res1->fetchArray()) {
	$id = $row1['id'];
	$userid = $row1['uid'];
	$appid = $row1['appid'];
	$status = $row1['status'];
	$version = $row1['version'];
	$device = $row1['device'];
	$app = $row1['app'];
	$pkg = $row1['pkg'];
	$cid = $row1['cid'];
	$time = $row1['time'];
	$last_online = $row1['last_online'];
	$ping = $row1['ping'];
	$ipadd = $row1['ip'];
	echo "\t\t\t" . '<tbody>' . "\n";
	echo "\t\t\t\t" . '<tr>' . "\n";
	echo "\t\t\t\t" . '<td>' . $userid . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $ipadd . '</td>' . "\n";
	echo "\t\t\t\t" . '<td><center>';

	if ($status == 'yes') {
		echo '<span class="icon text-white-50"><i class="fas fa-fw fa fa-check"style="font-size:20px;color:green"></i></span>';
	}
	else {
		echo '<span class="icon text-white-50"><i class="fas fa-fw fa fa-times"style="font-size:20px;color:red"></i></span>';
	}

	echo "\t\t\t\t" . '<td>' . $last_online . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $appid . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $version . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $device . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $pkg . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $app . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $cid . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $time . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $ping . '</td>' . "\n";
	echo '             <td><a class="btn btn-icon" href="#" data-href="./users.php?delete=' . $id . '" data-toggle="modal" data-target="#confirm-delete"><span class="icon text-white-50"><i class="fas fa-fw fa fa-trash-o"style="font-size:20px;color:red"></i></span></a></td>' . "\n";
	echo "\t\t\t\t" . '</tr>' . "\n";
	echo "\t\t\t" . '</tbody>' . "\n";
}

echo "\t\t\t" . '</table>' . "\n";
echo "\t\t" . '</div>' . "\n";
echo '</main>' . "\n";
echo "\n";
echo '    <br><br><br>';
include 'includes/footer.php';
require 'includes/appsnscripts.php';
echo '</body>' . "\n";

?>