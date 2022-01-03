<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db1 = new SQLite3('./api/appsnscriptspanelsvpn.db');
$db1->exec('CREATE TABLE IF NOT EXISTS vpn(id INTEGER PRIMARY KEY,userid TEXT ,vpn_appid TEXT,vpn_country TEXT ,vpn_state TEXT,vpn_config TEXT ,vpn_status TEXT,auth_type TEXT ,auth_embedded TEXT,username TEXT ,password TEXT,date TEXT)');
$res1 = $db1->query('SELECT * FROM vpn');

if (isset($_GET['delete'])) {
	$db1->exec('DELETE FROM vpn WHERE id=' . $_GET['delete']);
	$db1->close();
	header('Location: vpn.php');
}

$msgg = '<div class="alert alert-primary" id="flash-msg"><h4><i class="icon fa fa-check"></i>Your file was uploaded.</h4></div>';
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

if (isset($_GET['m'])) {
	echo $_GET['m'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class=" h3 mb-1 text-gray-800"> VPN Dashboard</h1>' . "\n";
echo '                        <a button class="btn btn-success btn-icon-split" id="button" href="./vpn_create.php">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Create</span>' . "\n";
echo '                        </button></a>' . "\n";
echo '                        <!--<a button class="btn btn-primary btn-icon-split" id="button" href="./upload.php">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fa fa-cloud-upload"></i></span><span class="text">Upload</span>' . "\n";
echo '                        </button></a>-->' . "\n";
echo '          </div>' . "\n";
echo "\t\t" . '<div class="table-responsive">' . "\n";
echo "\t\t\t" . '<table class="table table-striped table-sm">' . "\n";
echo "\t\t\t" . '<thead class= "text-primary">' . "\n";
echo "\t\t\t\t" . '<tr>' . "\n";
echo "\t\t\t\t" . '  <th>Country</th>' . "\n";
echo '                  <th>State</th>' . "\n";
echo '                  <th>Url</th>' . "\n";
echo '                  <th>Status</th>' . "\n";
echo '                  <th>Username</th>' . "\n";
echo '                  <th>Password</th>' . "\n";
echo "\t\t\t\t" . '  <th>Edit</th>' . "\n";
echo "\t\t\t\t" . '  <th>Delete</th>' . "\n";
echo '                </tr>' . "\n";
echo '              </thead>' . "\n";

while ($row1 = $res1->fetchArray()) {
	$id = $row1['id'];
	$vpn_country = $row1['vpn_country'];
	$vpn_state = $row1['vpn_state'];
	$vpn_config = $row1['vpn_config'];
	$vpn_status = $row1['vpn_status'];
	$user = $row1['username'];
	$pass = $row1['password'];
	echo '              <tbody class=" text-primary">' . "\n";
	echo '                <tr>' . "\n";
	echo '                  <td>' . $vpn_country . '</td>' . "\n";
	echo '                  <td>' . $vpn_state . '</td>' . "\n";
	echo '                  <td>' . $vpn_config . '</td>' . "\n";
	echo '                  <td>' . $vpn_status . '</td>' . "\n";
	echo '                  <td>' . $user . '</td>' . "\n";
	echo '                  <td>' . $pass . '</td>' . "\n";
	echo '                  <td><a class="btn btn-icon" href="./vpn_update.php?update=' . $id . '"><span class="icon text-white-50"><i class="fa fa-pencil-square-o"style="font-size:20px;color:blue"></i></span></a></td>' . "\n";
	echo '                  <td><a class="btn btn-icon" href="#" data-href="./vpn.php?delete=' . $id . '" data-toggle="modal" data-target="#confirm-delete"><span class="icon text-white-50"><i class="fas fa-fw fa fa-trash-o" style="font-size:20px;color:red"></i></span></a></td>' . "\n";
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