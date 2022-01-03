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

require 'check.php';

if (!isset($_SESSION['appsnscriptsxc'])) {
	header('location:login.php');
	exit();
}

$ifofuser = $_SESSION['id'];
$jsondataversion = file_get_contents('./api/main.json');
$dataversion = json_decode($jsondataversion, true);
$jsonversion = $dataversion['app'];
$version_codeversion = $jsonversion['version_code'];
$conn_count = new SQLite3('./api/user_logs.db');
$rows_count = $conn_count->query('SELECT COUNT(*) as count FROM logging WHERE status=\'yes\'');
$row_count = $rows_count->fetchArray();
$numRows_count = $row_count['count'];
$db_header = new SQLite3('./api/appsnscriptspanels.db');
$res_header = $db_header->query('SELECT * ' . "\n\t\t\t\t" . '  FROM USERS ' . "\n\t\t\t\t" . '  WHERE id=\'' . $ifofuser . '\'');
$row_header = $res_header->fetchArray();
$name_header = $row_header['NAME'];
$logo_header = $row_header['LOGO'];
echo '<!DOCTYPE html>' . "\n";
echo '<html lang="en">' . "\n";
echo "\n";
echo '<head>' . "\n";
echo "\n";
$jsondata111 = file_get_contents('./includes/appsnscripts.json');
$json111 = json_decode($jsondata111, true);
$col1 = $json111['info'];
$col2 = $col1['aa'];
$col3 = $col1['kk'];
$col4 = $col1['mm'];
$col5 = $col1['oo'];
$col6 = $col1['qq'];
$col7 = $col1['ss'];
$colname = $col1['uu'];
$collink = $col1['ww'];
$colicon = $col1['yy'];
echo '  <meta charset="utf-8">' . "\n";
echo '  <meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\n";
echo '  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">' . "\n";
echo '  <meta name="description" content="">' . "\n";
echo '  <meta name="author" content="">' . "\n";
echo '  <meta name="google" content="notranslate">' . "\n";
echo '  <script src="https://kit.fontawesome.com/3794d2f89f.js" crossorigin="anonymous"></script>' . "\n";
echo '  <title>Ultra XC</title>' . "\n";
echo '  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">' . "\n";
echo '  <link rel="icon" href="favicon.ico" type="image/x-icon">' . "\n";
echo '  <!-- Custom styles for this template-->' . "\n";
echo '  <link href="css/sb-admin-' . $col2 . '.css" rel="stylesheet">' . "\n";
echo '  <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>' . "\n";
echo '  <!-- Custom fonts for this template-->' . "\n";
echo '  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">' . "\n";
echo '  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">' . "\n";
echo ' ' . "\n";
echo '</head> ' . "\n";
echo '<body id="page-top">' . "\n";
echo "\n";
echo '  <!-- Page Wrapper -->' . "\n";
echo '  <div id="wrapper">' . "\n";
echo "\n";
echo '    <!-- Sidebar -->' . "\n";
echo '    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">' . "\n";
echo "\n";

if ($logo_header != NULL) {
	echo '      <!-- Sidebar - Brand -->' . "\n";
	echo '      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="colour.php">' . "\n";
	echo '        <div class="sidebar-brand-icon">' . "\n";
	echo '          <img class="img-profile rounded-circle" width="65px" src="' . $logo_header . '">' . "\n";
	echo '        </div>' . "\n";
}
else {
	echo '      <!-- Sidebar - Brand -->' . "\n";
	echo '      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="colour.php">' . "\n";
	echo '        <div class="sidebar-brand-icon">' . "\n";
	echo '          <img class="img-profile rounded-circle" width="65px" src="img/xciptv.png">' . "\n";
	echo '        </div>' . "\n";
}

echo "\n";
echo '      </a>' . "\n";
echo "\n";
echo '      <!-- Divider -->' . "\n";
echo '      <hr class="sidebar-divider my-0">' . "\n";
echo "\n";

if ($ifofuser == '2') {
	echo '      <!-- Nav Item -->' . "\n";
	echo '      <li class="nav-item">' . "\n";
	echo '        <a class="nav-link" href="admin.php">' . "\n";
	echo '          <i class="fas fa-fw fa-cog"></i>' . "\n";
	echo '          <span>Panel Control</span></a>' . "\n";
	echo '      </li>' . "\n";
}

echo '      <!-- Nav Item -->' . "\n";
echo '      <li class="nav-item">' . "\n";
echo '        <a class="nav-link" href="app.php">' . "\n";
echo '          <i class="fas fa-fw fa-home"></i>' . "\n";
echo '          <span>Main App</span></a>' . "\n";
echo '      </li>' . "\n";
echo '      <li class="nav-item">' . "\n";
echo '        <a class="nav-link" href="extra.php">' . "\n";
echo '          <i class="fas fa-fw fa-wrench"></i>' . "\n";
echo '          <span>Extras</span></a>' . "\n";
echo '      </li>' . "\n";
echo "\n";
echo '      <li class="nav-item">' . "\n";
echo '        <a class="nav-link" href="announcement.php">' . "\n";
echo '          <i class="fas fa-fw fa-bullhorn"></i>' . "\n";
echo '          <span>Announcement</span></a>' . "\n";
echo '      </li>' . "\n";
echo '      ' . "\n";
echo '      <li class="nav-item">' . "\n";
echo '        <a class="nav-link" href="maintenance.php">' . "\n";
echo '          <i class="fas fa-fw fa-tachometer-alt"></i>' . "\n";
echo '          <span>Maintenance</span></a>' . "\n";
echo '      </li>' . "\n";
echo "\n";
echo '      <li class="nav-item">' . "\n";
echo '        <a class="nav-link" href="send_message.php">' . "\n";
echo '          <i class="fas fa-fw fa-comment"></i>' . "\n";
echo '          <span>Send Message</span></a>' . "\n";
echo '      </li>' . "\n";
echo "\n";

if ($col7 == '1') {
	echo '      <li class="nav-item">' . "\n";
	echo '        <a class="nav-link" href="vpn.php">' . "\n";
	echo '          <i class="fas fa-fw fa-user-shield"></i>' . "\n";
	echo '          <span>VPN</span></a>' . "\n";
	echo '      </li>' . "\n";
	echo '      ' . "\n";
}

if ($col4 == '1') {
	echo '      <li class="nav-item">' . "\n";
	echo '        <a class="nav-link" href="snoop.php">' . "\n";
	echo '          <i class="fas fa-fw fa-eye"></i>' . "\n";
	echo '          <span>Snoop</span></a>' . "\n";
	echo '      </li>' . "\n";
	echo '      ' . "\n";
}

if ($col5 == '1') {
	echo '      <li class="nav-item">' . "\n";
	echo '        <a class="nav-link" href="users.php">' . "\n";
	echo '          <i class="fas fa-fw fa-user-plus"></i>' . "\n";
	echo '          <span>Connected Users (' . $numRows_count . ')</span></a>' . "\n";
	echo '      </li>' . "\n";
	echo '      ' . "\n";
}

echo '      <li class="nav-item">' . "\n";
echo '        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">' . "\n";
echo '          <i class="fas fa-fw fa-wrench"></i>' . "\n";
echo '          <span>Utilities</span>' . "\n";
echo '        </a>' . "\n";
echo '        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">' . "\n";
echo '          <div class="bg-white py-2 collapse-inner rounded">' . "\n";
echo '            <h6 class="collapse-header">Custom Utilities:</h6>' . "\n";
echo '            <a class="collapse-item" href="player.php"><i class="fas fa-fw fa-play"></i><span> Player Options</span></a>' . "\n";

if ($col3 == '1') {
	echo '            <a class="collapse-item" href="theme.php"><i class="fas fa-fw fa-paint-brush"></i><span> Theme Change</span></a>' . "\n";
}

if ($col6 == '1') {
	echo '            <a class="collapse-item" href="intro.php"><i class="fas fa-fw fa-video"></i><span> Update Intro</span></a>' . "\n";
}

echo '            <a class="collapse-item" href="language.php"><i class="fas fa-fw fa-globe"></i><span> Languages</span></a>' . "\n";
echo '            <a class="collapse-item" href="parent.php"><i class="fas fa-fw fa-unlock"></i><span> Parental Reset</span></a>' . "\n";
echo '            <a class="collapse-item" href="appads.php"><i class="fas fa-fw fa-rocket"></i><span> App Ads</span></a>' . "\n";
echo '            <a class="collapse-item" href="update.php"><i class="fas fa-fw fa-upload"></i><span> Push Update</span></a>' . "\n";
echo '            <a class="collapse-item" href="profile.php"><i class="fas fa-fw fa-user"></i><span> Update Profile</span></a>' . "\n";
echo '          </div>' . "\n";
echo '        </div>' . "\n";
echo '      </li>' . "\n";
echo "\n";
echo '    ' . "\n";
echo '      <li class="nav-item">' . "\n";
echo '        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">' . "\n";
echo '          <i class="fas fa-fw fa-cloud"></i>' . "\n";
echo '          <span>Cloud</span>' . "\n";
echo '        </a>' . "\n";
echo '        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">' . "\n";
echo '        <div class="bg-white py-2 collapse-inner rounded">' . "\n";
echo '        <h6 class="collapse-header">Cloud Uploads:</h6>' . "\n";
echo '        <a class="collapse-item" href="https://www.filelinked.com/login" target="_blank"><i class="fas fa-fw fa-share"></i><span> FileLinked</span></a>' . "\n";
echo '        <a class="collapse-item" href="https://db.tt" target="_blank"><i class="fas fa-fw fa-share"></i><span> DropBox</span></a>' . "\n";
echo '        <a class="collapse-item" href="https://mega.nz/" target="_blank"><i class="fas fa-fw fa-share"></i><span> Mega</span></a>' . "\n";
echo '          </div>' . "\n";
echo '        </div>' . "\n";
echo '      </li>' . "\n";
echo "\n";
echo '      <li class="nav-item">' . "\n";
echo '        <a class="nav-link" href="' . $collink . '" target="_blank">' . "\n";
echo '          <i class="fas fa-fw fa-' . $colicon . '"></i>' . "\n";
echo '          <span>' . $colname . '</span></a>' . "\n";
echo '      </li>' . "\n";
echo '      ' . "\n";
echo '      <li class="nav-item">' . "\n";
echo '        <a class="nav-link" href="logout.php">' . "\n";
echo '          <i class="fas fa-fw fa fa-sign-out"></i>' . "\n";
echo '          <span>Logout</span></a>' . "\n";
echo '      </li>' . "\n";
echo '      ' . "\n";
echo '      <!-- Divider -->' . "\n";
echo '      <hr class="sidebar-divider d-none d-md-block">' . "\n";
echo "\n";
echo '      <!-- Sidebar Toggler (Sidebar) -->' . "\n";
echo '      <div class="text-center d-none d-md-inline">' . "\n";
echo '        <button class="rounded-circle border-0" id="sidebarToggle"></button>' . "\n";
echo '      </div>' . "\n";
echo "\n";
echo '    </ul>' . "\n";
echo '    <!-- End of Sidebar -->' . "\n";
echo "\n";
echo '    <!-- Content Wrapper -->' . "\n";
echo '    <div id="content-wrapper" class="d-flex flex-column">' . "\n";
echo "\n";
echo '      <!-- Main Content -->' . "\n";
echo '      <div id="content">' . "\n";
echo "\n";
echo '        <!-- Topbar -->' . "\n";
echo '        <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow">' . "\n";
echo "\n";
echo '          <!-- Sidebar Toggle (Topbar) -->' . "\n";
echo '          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">' . "\n";
echo '            <i class="fa fa-bars"></i>' . "\n";
echo '          </button>' . "\n";
echo '<div><h5 class="m-0 text-primary">Ultra XC <sup> ' . $version_codeversion . ' +</sup><br>' . $name_header . ' </br></h5></div>' . "\n";
echo "\n";
echo '          <!-- Topbar Navbar -->' . "\n";
echo '          <ul class="navbar-nav ml-auto">' . "\n";
echo "\n";
echo "\n";
echo '            <div class="topbar-divider d-none d-sm-block"></div>' . "\n";
echo "\n";
echo '            <!-- Nav Item - Logout -->' . "\n";
echo '            <li class="nav-item dropdown no-arrow mx-1">' . "\n";
echo '              <a class="nav-link dropdown-toggle" href="logout.php"><span class="badge badge-danger">Logout</span>' . "\n";
echo '                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-red-400"></i>' . "\n";
echo '              </a>' . "\n";
echo '            </li>' . "\n";
echo "\n";
echo '          </ul>' . "\n";
echo "\n";
echo '        </nav>' . "\n";
echo '        <!-- End of Topbar -->' . "\n";
echo "\n";

?>