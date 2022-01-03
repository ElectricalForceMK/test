<?php 
session_start();
$ifofuser = $_SESSION['id'];
$jsondata_admin1 = file_get_contents("./includes/appsnscripts.json");
$data_admin1 = json_decode($jsondata_admin1, true);
$json_admin1 = $data_admin1['info'];
$col_admin1 = $json_admin1['mm'];
if($col_admin1 == '0'){ 
    header("Location: users.php");
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db1 = new SQLite3('api/logs.db');
$res1 = $db1->query('SELECT * FROM logs');
if(isset($_GET['delete'])){
$db1->exec("DELETE FROM logs WHERE id=".$_GET['delete']);
header("Location: snoop.php");
}
include ('includes/header.php');
print "\n";
print "	\n";
print "<div class=\"modal fade\" id=\"confirm-delete\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">\n";
print "    <div class=\"modal-dialog\">\n";
print "        <div class=\"modal-content\">\n";
print "            <div class=\"modal-header\">\n";
print "                <h2>Confirm</h2>\n";
print "            </div>\n";
print "            <div class=\"modal-body\">\n";
print "                Do you really want to delete?\n";
print "            </div>\n";
print "            <div class=\"modal-footer\">\n";
print "                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancel</button>\n";
print "                <a class=\"btn btn-danger btn-ok\">Delete</a>\n";
print "            </div>\n";
print "        </div>\n";
print "    </div>\n";
print "</div>\n";
print "<main role=\"main\" class=\"col-15 pt-4 px-5\"><div class=\"row justify-text-center\"><div class=\"chartjs-size-monitor\" style=\"position:absolute ; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;\"><div class=\"chartjs-size-monitor-expand\" style=\"position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;\"><div style=\"position:absolute;width:1000000px;height:1000000px;left:0;top:0\"></div></div><div class=\"chartjs-size-monitor-shrink\" style=\"position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;\"><div style=\"position:absolute;width:200%;height:200%;left:0; top:0\"></div></div></div>\n";
print "          <div id=\"main\">\n";
print "          <h1 class=\" h3 mb-1 text-gray-800\"> Snoop</h1>\n";
print "          </div>\n";
print "		<div class=\"table-responsive\">\n";
print "			<table class=\"table table-striped table-sm\">\n";
print "			<thead class= \"text-primary\">\n";
print "				<tr>\n";
print "				<th>IP Address</th>\n";
print "				<th>Date</th>\n";
print "				<th>Delete</th>\n";
print "				</tr>\n";
print "			</thead>\n";
while ($row1 = $res1->fetchArray()) {
    $id = $row1['id'];
    $ipad = $row1['ipaddress'];
    $date = $row1['date'];
    $ipad = str_replace('86.5.150.17','appsnscripts',$ipad);
 
print "			<tbody>\n";
print "				<tr>\n";
print "				<td>$ipad</td>\n";
print "				<td>$date</td>\n";
print "             <td><a class=\"btn btn-icon\" href=\"#\" data-href=\"./snoop.php?delete=$id\" data-toggle=\"modal\" data-target=\"#confirm-delete\"><span class=\"icon text-white-50\"><i class=\"fas fa-fw fa fa-trash-o\" style=\"font-size:20px;color:red\"></i></a></td>\n";
print "				</tr>\n";
print "			</tbody>\n";
}
print "			</table>\n";
print "		</div>\n";
print "</main>\n";
print "\n";
print "    <br><br><br>";
include ('includes/footer.php');
require ('includes/appsnscripts.php');
print "</body>\n";
?>