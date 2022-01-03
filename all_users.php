<?php

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
$db177 = new SQLite3('./api/user_logs.db');
$db177->exec('CREATE TABLE IF NOT EXISTS logging(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, appid TEXT, version TEXT, device TEXT, pkg TEXT, app TEXT, cid TEXT, uid TEXT, status TEXT, d TEXT, time TEXT, last_online TEXT, ping TEXT, ip TEXT)');
$res176 = $db177->query('SELECT * FROM logging');

if (isset($_GET['delete'])) {
	$db1->exec('DELETE FROM logging WHERE id=' . $_GET['delete']);
	header('Location: all_users.php');
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
echo '          <h1 class=" h3 mb-1 text-gray-800"> All User Management</h1>' . "\n";
echo '                        <a button class="btn btn-primary btn-icon-split" id="button" href="./users.php">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span><span class="text"> ' . $numRows_count . ' Online Users</span>' . "\n";
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

while ($row177 = $res176->fetchArray()) {
	$id123 = $row177['id'];
	$userid123 = $row177['uid'];
	$appid123 = $row177['appid'];
	$status123 = $row177['status'];
	$version123 = $row177['version'];
	$device123 = $row177['device'];
	$app123 = $row177['app'];
	$pkg123 = $row177['pkg'];
	$cid123 = $row177['cid'];
	$time123 = $row177['time'];
	$last_online123 = $row177['last_online'];
	$ping123 = $row177['ping'];
	$ipadd123 = $row177['ip'];
	echo "\t\t\t" . '<tbody>' . "\n";
	echo "\t\t\t\t" . '<tr>' . "\n";
	echo "\t\t\t\t" . '<td>' . $userid123 . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $ipadd123 . '</td>' . "\n";
	echo "\t\t\t\t" . '<td><center>';

	if ($status123 == 'yes') {
		echo '<span class="icon text-white-50"><i class="fas fa-fw fa fa-check"style="font-size:20px;color:green"></i></span>';
	}
	else {
		echo '<span class="icon text-white-50"><i class="fas fa-fw fa fa-times"style="font-size:20px;color:red"></i></span>';
	}

	echo "\t\t\t\t" . '<td>' . $last_online123 . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $appid123 . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $version123 . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $device123 . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $pkg123 . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $app123 . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $cid123 . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $time123 . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $ping123 . '</td>' . "\n";
	echo '             <td><a class="btn btn-icon" href="#" data-href="./all_users.php?delete=' . $id123 . '" data-toggle="modal" data-target="#confirm-delete"><span class="icon text-white-50"><i class="fas fa-fw fa fa-trash-o"style="font-size:20px;color:red"></i></span></a></td>' . "\n";
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