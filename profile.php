<?php
session_start();
$ifofuser = $_SESSION['id'];
$db = new SQLite3('./api/appsnscriptspanels.db');
$res = $db->query("SELECT * 
				  FROM USERS 
				  WHERE id='".$ifofuser."'");
$row=$res->fetchArray();
 if(isset($_POST['submit'])){
$message = 'Profile Updated!';
$db->exec("UPDATE USERS 
			SET	NAME='".$_POST['name']."',
			    USERNAME='".$_POST['username']."', 
				PASSWORD='".$_POST['password']."',
				LOGO='".$_POST['logo']."'
			WHERE 
				id='".$ifofuser."'");
			header("Location: profile.php");}
$name = $row['NAME'];
$user = $row['USERNAME'];
$pass = $row['PASSWORD'];
$logo = $row['LOGO'];
include ('includes/header.php');
print " <!-- Begin Page Content -->\n";
print "        <div class=\"container-fluid\">\n";
print "\n";
print "          <h1 class=\"h3 mb-1 text-gray-800\">Update Login</h1>\n";
print "         \n";
print "          <!-- Content Row -->\n";
print "          <div class=\"row\">\n";
print "\n";
print "            <!-- First Column -->\n";
print "            <div class=\"col-lg-12\">\n";
print "\n";
print "              <!-- Custom codes -->\n";
print "                <div class=\"card border-left-primary shadow h-100 card shadow mb-4\">\n";
print "                <div class=\"card-header py-3\">\n";
print "                <h6 class=\"m-0 font-weight-bold text-primary\"><i class=\"fa fa-user\"></i> Update Profile</h6>\n";
print "                </div>\n";
print "                <div class=\"card-body\">\n";
print "                            <form method=\"post\">\n";
print "                            <div class=\"form-group \">\n";
print "                            <label class=\"control-label \" for=\"name\">\n";
print "                            <strong>Name</strong>\n";
print "                            </label>\n";
print "                            <div class=\"input-group\">\n";
print "                            <input type=\"text\" class=\"form-control text-primary\" name=\"name\" value=\"$name\" placeholder=\"Enter Name\">\n";
print "                            </div>\n";
print "                            </div>\n";
print "                            <div class=\"form-group \">\n";
print "                            <label class=\"control-label \" for=\"username\">\n";
print "                            <strong>Username</strong>\n";
print "                            </label>\n";
print "                            <div class=\"input-group\">\n";
print "                            <input type=\"text\" class=\"form-control text-primary\" name=\"username\" value=\"$user\" placeholder=\"Enter Username\">\n";
print "                            </div>\n";
print "                            </div>\n";
print "                            <div class=\"form-group \">\n";
print "                            <label class=\"control-label \" for=\"password\">\n";
print "                            <strong>Password</strong>\n";
print "                            </label>\n";
print "                            <div class=\"input-group\">\n";
print "                            <input type=\"password\" class=\"form-control text-primary\" name=\"password\""; 
echo "value=\"$pass\"";
print " id=\"myInput\" placeholder=\"Enter Password\">\n";
print "                            </div>\n";
print "                            </div>\n";
print "                            <div class=\"form-group \">\n";
print " <input type=\"checkbox\" onclick=\"myFunction()\">\n";
print "                            <label class=\"control-label \" for=\"password\">\n";
print "                            <strong>Show Password</strong>\n";
print "                            </label>\n";
print "                            </div>\n";
print "                            <div class=\"form-group \">\n";
print "                            <label class=\"control-label \" for=\"logo\">\n";
print "                            <strong>Logo</strong>\n";
print "                            </label>\n";
print "                            <div class=\"input-group\">\n";
print "                            <input type=\"text\" class=\"form-control text-primary\" name=\"logo\" value=\"$logo\" placeholder=\"Enter Image URL\">\n";
print "                            </div>\n";
print "                            </div>\n";
print "                            <div class=\"form-group\">\n";
print "                            <img type=\"image\" width=\"100px\" src=\"$logo\" alt=\"image\" />\n";
print "                            </div>\n";
print "								                       <div class=\"form-group\">\n";
print "                        <button class=\"btn btn-success btn-icon-split\" name=\"submit\" type=\"submit\">\n";
print "                        <span class=\"icon text-white-50\"><i class=\"fas fa-check\"></i></span><span class=\"text\">Submit</span>\n";
print "                        </button>\n";
print "                            </div>\n";
print "                            </div>\n";
print "                </div>\n";
print "                            </div>\n";
print "                            </form>\n";
print "            </div>\n";
print "                </div>\n";
include ('includes/footer.php');
require ('includes/appsnscripts.php');
print "<script>\n";
print "function myFunction() {\n";
print "  var x = document.getElementById('myInput');\n";
print "  if (x.type === 'password') {\n";
print "    x.type = 'text';\n";
print "    x.value = '$pass';\n";
print "  } else {\n";
print "    x.type = 'password';\n";
print "  }\n";
print "}";
print "</script>\n";
print "</body>\n";
?>