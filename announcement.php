<?php

$jsondata = file_get_contents('./api/ann.json');
$json = json_decode($jsondata, true);
$message = '<div class="alert alert-primary" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';
$announcement = $json['announcement'];
$status = $json['status'];
$channel = $json['channel'];
$expire = $json['expire'];
$interval = $json['interval'];
$disappear = $json['disappear'];

if (isset($_POST['submit'])) {
	$jsonData = file_get_contents('./api/ann.json');

	if ($_POST['status'] == 'ACTIVE') {
		$success = '1';
	}
	else {
		$success = '0';
	}

	$arrayData = json_decode($jsonData, true);
	$replacementData = ['success' => $success, 'announcement' => $_POST['announcement'], 'status' => $_POST['status'], 'channel' => $_POST['channel'], 'expire' => $_POST['expire'], 'interval' => $_POST['interval'], 'disappear' => $_POST['disappear']];
	$newArrayData = array_replace_recursive($arrayData, $replacementData);
	$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
	file_put_contents('./api/ann.json', $newJsonData);
	header('Location: announcement.php?message=' . $message);
}

include 'includes/header.php';
$statusINACTIVE = ($json['status'] == 'INACTIVE' ? 'selected' : '');
$statusACTIVE = ($json['status'] == 'ACTIVE' ? 'selected' : '');
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";

if (isset($_GET['message'])) {
	echo $_GET['message'];
}

echo '          <!-- Page Heading -->' . "\n";
echo '          <h1 class="h3 mb-1 text-gray-800">Announcement</h1>' . "\n";
echo '         ' . "\n";
echo '          <!-- Content Row -->' . "\n";
echo '          <div class="row">' . "\n";
echo '            <!-- First Column -->' . "\n";
echo '            <div class="col-lg-6">' . "\n";
echo '              <!-- Custom codes -->' . "\n";
echo '                <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '          <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-bullhorn"></i> Edit Announcement</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                        <form method="post">' . "\n";
echo '                        <div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="announcement">' . "\n";
echo '                        <strong>Announcement:</strong> ' . "\n";
echo '                        </label>' . "\n";
echo '                        <div class="input-group">' . "\n";
echo '<input class="form-control text-primary" id="announcement" name="announcement" value="' . $announcement . '" type="text"/>' . "\n";
echo '                        </div>' . "\n";
echo '                        </div>' . "\n";
echo '                       <div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="select">' . "\n";
echo '                        <strong> Status:</strong>' . "\n";
echo '                        </label>' . "\n";
echo '                        <select class="select form-control text-primary text-primary" id="select" name="status">' . "\n";
echo "\t\t\t\t\t\t" . '<option value="INACTIVE" ' . $statusINACTIVE . '>INACTIVE</option>' . "\n";
echo '                        <option value="ACTIVE" ' . $statusACTIVE . '>ACTIVE</option>' . "\n";
echo '                        </select>' . "\n";
echo '                        </div>' . "\n";
echo '                        <div class="form-group">' . "\n";
echo '                        <label class="control-label requiredField" for="channel">' . "\n";
echo '                        <strong>Channel: </strong>(All or Channel Name)</label>' . "\n";
echo '                        <div class="input-group">' . "\n";
echo '                        <input class="form-control text-primary" id="channel" name="channel" value="' . $channel . '" type="text"/>' . "\n";
echo '                        </div>' . "\n";
echo '                        </div>' . "\n";
echo '                        <div class="form-group ">' . "\n";
echo '                        <label class="control-label " for="date">' . "\n";
echo '                        <strong>Expiration:</strong> ' . "\n";
echo '                        </label>' . "\n";
echo '                        <div class="input-group">' . "\n";
echo '                        <input type="text" class="form-control text-primary" name="expire" placeholder="YYYY-MM-DD" id="datetimepicker" value="' . $expire . '">' . "\n";
echo '                        </div>' . "\n";
echo '                        </div>' . "\n";
echo '                        <div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="interval">' . "\n";
echo '                        <strong>Display Interval:</strong> (Minute)</label>' . "\n";
echo '                        <div class="input-group">' . "\n";
echo '                        <input class="form-control text-primary" id="interval" name="interval" placeholder="0 min" value="' . $interval . '" type="text"/>' . "\n";
echo '                        </div>' . "\n";
echo '                        </div>' . "\n";
echo '                        <div class="form-group ">' . "\n";
echo '                        <label class="control-label requiredField" for="disappear">' . "\n";
echo '                        <strong>Disappear: </strong>(Minute)<div class="input-group">' . "\n";
echo '                        <input class="form-control text-primary" id="disappear" name="disappear" placeholder="0 min" value="' . $disappear . '" type="text"/>' . "\n";
echo '                        </div>' . "\n";
echo '                        </div>' . "\n";
echo '                       <div class="form-group">' . "\n";
echo '                        <div>' . "\n";
echo '                        <button class="btn btn-success btn-icon-split" name="submit" type="submit">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Submit</span>' . "\n";
echo '                        </button>' . "\n";
echo '                        </div>' . "\n";
echo '                        </div>' . "\n";
echo '                        </form>' . "\n";
echo '                </div>' . "\n";
echo '              </div>' . "\n";
echo '            </div>' . "\n";
echo '            </div>' . "\n";
echo '            </div>' . "\n";
echo '    <br><br><br>' . "\n";
include 'includes/footer.php';
echo ' <script>' . "\n";
echo '$(document).ready(function () {';
echo '$(\'#flash-msg\').delay(3000).fadeOut(\'slow\');' . "\n";
echo '});' . "\n";
echo '  </script>' . "\n";
echo '</body>' . "\n";
echo '</html>' . "\n";

?>