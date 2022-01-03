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
$db1 = new SQLite3('api/.logs.db');
$res1 = $db1->query('SELECT * FROM logs');

if (isset($_GET['delete'])) {
	$db1->exec('DELETE FROM logs WHERE id=' . $_GET['delete']);
	header('Location: snoop.php');
}

include 'includes/header.php';
echo "\n";
echo "\t\n";
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
echo '          <h1 class=" h3 mb-1 text-gray-800"> Snoop</h1>' . "\n";
echo '          </div>' . "\n";
echo "\t\t" . '<div class="table-responsive">' . "\n";
echo "\t\t\t" . '<table class="table table-striped table-sm">' . "\n";
echo "\t\t\t" . '<thead class= "text-primary">' . "\n";
echo "\t\t\t\t" . '<tr>' . "\n";
echo "\t\t\t\t" . '<th>IP Address</th>' . "\n";
echo "\t\t\t\t" . '<th>Time</th>' . "\n";
echo "\t\t\t\t" . '<th>Date</th>' . "\n";
echo "\t\t\t\t" . '</tr>' . "\n";
echo "\t\t\t" . '</thead>' . "\n";

while ($row1 = $res1->fetchArray()) {
	$id = $row1['id'];
	$ipad = $row1['ipaddress'];
	$date = $row1['date'];
	echo "\t\t\t" . '<tbody>' . "\n";
	echo "\t\t\t\t" . '<tr>' . "\n";
	echo "\t\t\t\t" . '<td>' . $ipad . '</td>' . "\n";
	echo "\t\t\t\t" . '<td>' . $date . '</td>' . "\n";
	echo '             <td><a class="btn btn-icon" href="#" data-href="./snoop.php?delete=' . $id . '" data-toggle="modal" data-target="#confirm-delete"><span class="icon text-white-50"><i class="fas fa-fw fa fa-trash-o" style="font-size:20px;color:red"></i></a></td>' . "\n";
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