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

$db1 = new SQLite3('./api/user_message.db');

if (isset($_POST['submit'])) {
	$db1->exec('INSERT INTO messages(message, userid, status, expire) VALUES(\'' . $_POST['message'] . '\', \'' . $_POST['userid'] . '\', \'' . $_POST['status'] . '\', \'' . $_POST['expire'] . '\')');
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
echo '          <h1 class="h3 mb-1 text-gray-800">Message\'s</h1>' . "\n";
echo '         ' . "\n";
echo '          <!-- Content Row -->' . "\n";
echo '          <div class="row">' . "\n";
echo "\n";
echo '            <!-- First Column -->' . "\n";
echo '            <div class="col-lg-12">' . "\n";
echo "\n";
echo '              <!-- Custom codes -->' . "\n";
echo '                <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-comment"></i> Create Message</h6>' . "\n";
echo '                </div>' . "\n";
echo '            <div class="card-body">' . "\n";
echo '                            <form method="post">' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="message">' . "\n";
echo '                                        <strong>Message</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="description" name="message" placeholder="Message" value=\'\' type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="userid">' . "\n";
echo '                                        <strong>Username</strong> ' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="description" name="userid" placeholder="Username" value=\'\' type="text"/>' . "\n";
echo '                                    </div>' . "\n";
echo "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label requiredField" for="status" >' . "\n";
echo '                                        <strong>Status</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <select class="select form-control text-primary" id="select" name="status">' . "\n";
echo '                                        <option value="ACTIVE">' . "\n";
echo '                                            ACTIVE' . "\n";
echo '                                        </option>' . "\n";
echo '                                        <option value="INACTIVE">' . "\n";
echo '                                            INACTIVE' . "\n";
echo '                                        </option>' . "\n";
echo '                                    </select>' . "\n";
echo "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="message">' . "\n";
echo '                                        <strong>Expire</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input type="text" class="form-control text-primary" name="expire" placeholder="YYYY-MM-DD" id="datetimepicker"  autocomplete="off"> ' . "\n";
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
echo '                        </div>' . "\n";
echo '                    </div>' . "\n";
echo '                </div>' . "\n";
echo "\n";
echo '        </div>' . "\n";
echo '    </div>' . "\n";
echo '    <br><br><br>';
include 'includes/footer.php';
require 'includes/appsnscripts.php';
echo '      </body>' . "\n";

?>