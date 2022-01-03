<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db1 = new SQLite3('./api/appsnscriptspanelsvpn.db');
$res1 = $db1->query('SELECT * ' . "\r\n\t\t\t\t" . '  FROM vpn ' . "\r\n\t\t\t\t" . '  WHERE id=\'' . $_GET['update'] . '\'');
$row1 = $res1->fetchArray();
$id = $row1['id'];
$vpn_country = $row1['vpn_country'];
$vpn_state = $row1['vpn_state'];
$vpn_config = $row1['vpn_config'];
$vpn_status = $row1['vpn_status'];
$username = $row1['username'];
$password = $row1['password'];

if (isset($_POST['submit'])) {
	$db1->exec('UPDATE vpn SET vpn_country=\'' . $_POST['vpn_country'] . '\', ' . "\r\n\t\t\t\t\t\t\t\t" . 'vpn_state=\'' . $_POST['vpn_state'] . '\',' . "\r\n\t\t\t\t\t\t\t\t" . 'vpn_config=\'' . $_POST['vpn_config'] . '\',' . "\r\n\t\t\t\t\t\t\t\t" . 'vpn_status=\'' . $_POST['vpn_status'] . '\',' . "\r\n\t\t\t\t\t\t\t\t" . 'username=\'' . $_POST['username'] . '\',' . "\r\n\t\t\t\t\t\t\t\t" . 'password=\'' . $_POST['password'] . '\'' . "\r\n\t\t\t\t\t\t" . '  WHERE ' . "\r\n\t\t\t\t\t\t\t" . '  id=\'' . $_POST['id'] . '\'');
	$db1->close();
	header('Location: vpn.php');
}

include 'includes/header.php';
$id = $row1['id'];
$vpn_country = $row1['vpn_country'];
$vpn_state = $row1['vpn_state'];
$vpn_config = $row1['vpn_config'];
$vpn_status = $row1['vpn_status'];
$user = $row1['username'];
$pass = $row1['password'];
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

if (isset($_GET['m'])) {
	echo $_GET['m'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="h3 mb-1 text-gray-800">Update VPN</h1>' . "\n";
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
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-user-shield"></i> Update VPN Details</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo "\t\t\t\t" . '    ' . "\t" . '<form method="post">' . "\n";
echo '                        <div class="form control">' . "\n";
echo '                                    <label class="control-label " for="vpn_country"><strong>' . "\n";
echo '                                        Country Code</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input type="hidden" name="id" value="' . $id . '">' . "\n";
echo '                                        <input class="form-control text-primary" id="description" name="vpn_country"  value="' . $vpn_country . '" type="text" />' . "\n";
echo '                                    </div></br>' . "\n";
echo '                                    ' . "\n";
echo '                        <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="vpn_state">' . "\n";
echo '                                        <strong>State / Region</strong> ' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="description" name="vpn_state" value="' . $vpn_state . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label requiredField" for="vpn_status" >' . "\n";
echo '                                        <strong>Status</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <select class="select form-control text-primary" id="select" name="vpn_status"  >' . "\n";
$vpn_active = ($row['vpn_status'] == 'ACTIVE' ? 'selected' : '');
$vpn_inactive = ($row['vpn_status'] == 'INACTIVE' ? 'selected' : '');
echo '                                        <option value="ACTIVE" ' . $vpn_active . ' >ACTIVE</option>' . "\n";
echo '                                        <option value="INACTIVE" ' . $vpn_inactive . ' >INACTIVE</option>' . "\n";
echo '                                    </select>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="vpn_config">' . "\n";
echo '                                        <strong>URL</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input type="text" class="form-control text-primary" name="vpn_config" value="' . $vpn_config . '" id="discription" /> ' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="username">' . "\n";
echo '                                        <strong>Username</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input type="text" class="form-control text-primary" name="username" value="' . $user . '" id="discription" />' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="password">' . "\n";
echo '                                        <strong>Password</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input type="text" class="form-control text-primary" name="password" value="' . $pass . '" id="discription" />' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group">' . "\n";
echo '                                    <div>' . "\n";
echo '                                        <button class="btn btn-success btn-icon-split" name="submit" type="submit">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Submit</span>' . "\n";
echo '                        </button>' . "\n";
echo '                                    </div>' . "\n";
echo "\n";
echo '                                </div>' . "\n";
echo '                            </form>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>';
echo '            </div>';
echo '            </div>';
echo '            </div>';
include 'includes/footer.php';
require 'includes/appsnscripts.php';
echo '</body>' . "\n";

?>