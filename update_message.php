<?php

$db1 = new SQLite3('./api/user_message.db');
$res1 = $db1->query('SELECT * ' . "\r\n\t\t\t\t" . '  FROM messages ' . "\r\n\t\t\t\t" . '  WHERE id=\'' . $_GET['update'] . '\'');

while ($row1 = $res1->fetchArray()) {
	$userid = $row1['userid'];
	$mes = $row1['message'];
	$expire = $row1['expire'];
	$status = $row1['status'];
}

$ACTIVE = ($status == 'ACTIVE' ? 'selected' : '');
$INACTIVE = ($status == 'INACTIVE' ? 'selected' : '');

if (isset($_POST['submit'])) {
	$db1->exec('UPDATE messages SET message=\'' . $_POST['message'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  status=\'' . $_POST['status'] . '\',' . "\r\n\t\t\t\t\t\t\t" . '  expire=\'' . $_POST['expire'] . '\'' . "\r\n\t\t\t\t\t\t" . '  WHERE ' . "\r\n\t\t\t\t\t\t\t" . '  userid=\'' . $_POST['userid'] . '\'');
	header('Location: send_message.php');
}

include 'includes/header.php';
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="h3 mb-1 text-gray-800"> User Messages</h1>' . "\n";
echo "\n";
echo '              <!-- Custom codes -->' . "\n";
echo '                <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-comment"></i> Edit Message</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                        <form method="post">' . "\n";
echo '                        <div class="form control">' . "\n";
echo '                                    <label class="control-label " for="userid"><strong>' . "\n";
echo '                                        Username</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="description" name="userid"  value="' . $userid . '" type="text" readonly/>' . "\n";
echo '                                    </div></br>' . "\n";
echo '                                    ' . "\n";
echo '                        <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="message">' . "\n";
echo '                                                                ' . "\n";
echo '                                        <strong>Message</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="form-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="message" name="message" value="' . $mes . '" type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label requiredField" for="status" >' . "\n";
echo '                                        <strong>Status</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <select class="select form-control text-primary" id="select" name="status">' . "\n";
echo "\t\t\t\t\t\t\t\t\t" . '    <option value="INACTIVE"' . $INACTIVE . '>INACTIVE</option>' . "\n";
echo '                                        <option value="ACTIVE"' . $ACTIVE . '>ACTIVE</option>' . "\n";
echo '                                    </select>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="expire">' . "\n";
echo '                                        <strong>Expiration</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input type="text" class="form-control text-primary" name="expire" placeholder="YYYY-MM-DD" id="datetimepicker"  autocomplete="off" value="' . $expire . '"> ' . "\n";
echo '                                    </div>' . "\n";
echo "\n";
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
include 'includes/footer.php';
require 'includes/appsnscripts.php';
echo '</body>' . "\n";

?>