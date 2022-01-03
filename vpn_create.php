<?php

$jsondata = file_get_contents('./api/main.json');
$data = json_decode($jsondata, true);
$json = $data['app'];
$UiD = $json['customerid'];
$id = $json['id'];
$db1 = new SQLite3('./api/appsnscriptspanelsvpn.db');

if (isset($_POST['submit'])) {
	$db1->exec('INSERT INTO vpn(userid, vpn_appid, vpn_country, vpn_state, vpn_config, vpn_status, auth_type, auth_embedded, username, password, date) VALUES(\'' . $_POST['userid'] . '\', \'' . $_POST['vpn_appid'] . '\', \'' . $_POST['vpn_country'] . '\', \'' . $_POST['vpn_state'] . '\', \'' . $_POST['vpn_config'] . '\', \'' . $_POST['vpn_status'] . '\', \'' . $_POST['auth_type'] . '\', \'' . $_POST['auth_embedded'] . '\', \'' . $_POST['username'] . '\', \'' . $_POST['password'] . '\', \'' . $_POST['date'] . '\')');
	$db1->close();
	$msgg = '<div class="alert alert-primary" id="flash-msg"><h4><i class="icon fa fa-check"></i>VPN Added.</h4></div>';
	header('Location: vpn.php');
}

include 'includes/header.php';
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
echo '          <h1 class="h3 mb-1 text-gray-800">Create VPN</h1>' . "\n";
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
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-user-shield"></i> Enter VPN Details </h6>' . "\n";
echo '                </div>' . "\n";
echo '            <div class="card-body">' . "\n";
echo '                <form action="" method="post" enctype="multipart/form-data">' . "\n";
echo '                        <div class="col-lg-6">' . "\n";
echo '                            <form method="post">' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label" for="vpn_country">' . "\n";
echo '                                        <strong>Country</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input type="hidden" class="form-control" name="userid" value="' . $UiD . '">' . "\n";
echo '                                        <input type="hidden" class="form-control" name="vpn_appid" value="' . $id . '">' . "\n";
echo '                                        <select class="select form-control text-primary" id="select" name="vpn_country" required >' . "\n";
echo "\t\t\t\t\t\t\t\t\t" . '    <option value="GB">Great Britain</option>' . "\n";
echo "\t\t\t\t\t\t\t\t\t" . '    <option value="US">United States</option>' . "\n";
echo "\t\t\t\t\t\t\t\t\t" . '    <option value="AF">Afghanistan</option>' . "\n";
echo '                <option value="AL">Albania</option>' . "\n";
echo '                <option value="DZ">Algeria</option>' . "\n";
echo '                <option value="AS">American Samoa</option>' . "\n";
echo '                <option value="AD">Andorra</option>' . "\n";
echo '                <option value="AO">Angola</option>' . "\n";
echo '                <option value="AI">Anguilla</option>' . "\n";
echo '                <option value="AQ">Antarctica</option>' . "\n";
echo '                <option value="AG">Antigua and Barbuda</option>' . "\n";
echo '                <option value="AR">Argentina</option>' . "\n";
echo '                <option value="AM">Armenia</option>' . "\n";
echo '                <option value="AW">Aruba</option>' . "\n";
echo '                <option value="AU">Australia</option>' . "\n";
echo '                <option value="AT">Austria</option>' . "\n";
echo '                <option value="AZ">Azerbaijan</option>' . "\n";
echo '                <option value="BS">Bahamas</option>' . "\n";
echo '                <option value="BH">Bahrain</option>' . "\n";
echo '                <option value="BD">Bangladesh</option>' . "\n";
echo '                <option value="BB">Barbados</option>' . "\n";
echo '                <option value="BY">Belarus</option>' . "\n";
echo '                <option value="BE">Belgium</option>' . "\n";
echo '                <option value="BZ">Belize</option>' . "\n";
echo '                <option value="BJ">Benin</option>' . "\n";
echo '                <option value="BM">Bermuda</option>' . "\n";
echo '                <option value="BT">Bhutan</option>' . "\n";
echo '                <option value="BO">Bolivia</option>' . "\n";
echo '                <option value="BA">Bosnia and Herzegovina</option>' . "\n";
echo '                <option value="BW">Botswana</option>' . "\n";
echo '                <option value="BV">Bouvet Island</option>' . "\n";
echo '                <option value="BR">Brazil</option>' . "\n";
echo '                <option value="BQ">British Indian Ocean Territory</option>' . "\n";
echo '                <option value="IO">Brunei Darussalam</option>' . "\n";
echo '                <option value="BG">Bulgaria</option>' . "\n";
echo '                <option value="BF">Burkina Faso</option>' . "\n";
echo "\t" . '<option value="BI">Burundi</option>' . "\n";
echo "\t" . '<option value="KH">Cambodia</option>' . "\n";
echo "\t" . '<option value="CM">Cameroon</option>' . "\n";
echo "\t" . '<option value="CA">Canada</option>' . "\n";
echo "\t" . '<option value="CV">Cape Verde</option>' . "\n";
echo "\t" . '<option value="KY">Cayman Islands</option>' . "\n";
echo "\t" . '<option value="CF">Central African Republic</option>' . "\n";
echo "\t" . '<option value="TD">Chad</option>' . "\n";
echo "\t" . '<option value="CL">Chile</option>' . "\n";
echo "\t" . '<option value="CN">China</option>' . "\n";
echo "\t" . '<option value="CX">Christmas Island</option>' . "\n";
echo "\t" . '<option value="CC">Cocos (Keeling) Islands</option>' . "\n";
echo "\t" . '<option value="CO">Colombia</option>' . "\n";
echo "\t" . '<option value="KM">Comoros</option>' . "\n";
echo "\t" . '<option value="CG">Congo</option>' . "\n";
echo "\t" . '<option value="CD">Congo, the Democratic Republic of the</option>' . "\n";
echo "\t" . '<option value="CK">Cook Islands</option>' . "\n";
echo "\t" . '<option value="CR">Costa Rica</option>' . "\n";
echo "\t" . '<option value="CI">Côte d\'Ivoire</option>' . "\n";
echo "\t" . '<option value="HR">Croatia</option>' . "\n";
echo "\t" . '<option value="CU">Cuba</option>' . "\n";
echo "\t" . '<option value="CW">Curaçao</option>' . "\n";
echo "\t" . '<option value="CY">Cyprus</option>' . "\n";
echo "\t" . '<option value="CZ">Czech Republic</option>' . "\n";
echo "\t" . '<option value="DK">Denmark</option>' . "\n";
echo "\t" . '<option value="DJ">Djibouti</option>' . "\n";
echo "\t" . '<option value="DM">Dominica</option>' . "\n";
echo "\t" . '<option value="DO">Dominican Republic</option>' . "\n";
echo "\t" . '<option value="EC">Ecuador</option>' . "\n";
echo "\t" . '<option value="EG">Egypt</option>' . "\n";
echo "\t" . '<option value="SV">El Salvador</option>' . "\n";
echo "\t" . '<option value="GQ">Equatorial Guinea</option>' . "\n";
echo "\t" . '<option value="ER">Eritrea</option>' . "\n";
echo "\t" . '<option value="EE">Estonia</option>' . "\n";
echo "\t" . '<option value="ET">Ethiopia</option>' . "\n";
echo "\t" . '<option value="FK">Falkland Islands (Malvinas)</option>' . "\n";
echo "\t" . '<option value="FO">Faroe Islands</option>' . "\n";
echo "\t" . '<option value="FJ">Fiji</option>' . "\n";
echo "\t" . '<option value="FI">Finland</option>' . "\n";
echo "\t" . '<option value="FR">France</option>' . "\n";
echo "\t" . '<option value="GF">French Guiana</option>' . "\n";
echo "\t" . '<option value="PF">French Polynesia</option>' . "\n";
echo "\t" . '<option value="TF">French Southern Territories</option>' . "\n";
echo "\t" . '<option value="GA">Gabon</option>' . "\n";
echo "\t" . '<option value="GM">Gambia</option>' . "\n";
echo "\t" . '<option value="GE">Georgia</option>' . "\n";
echo "\t" . '<option value="DE">Germany</option>' . "\n";
echo "\t" . '<option value="GH">Ghana</option>' . "\n";
echo "\t" . '<option value="GI">Gibraltar</option>' . "\n";
echo "\t" . '<option value="GR">Greece</option>' . "\n";
echo "\t" . '<option value="GL">Greenland</option>' . "\n";
echo "\t" . '<option value="GD">Grenada</option>' . "\n";
echo "\t" . '<option value="GP">Guadeloupe</option>' . "\n";
echo "\t" . '<option value="GU">Guam</option>' . "\n";
echo "\t" . '<option value="GT">Guatemala</option>' . "\n";
echo "\t" . '<option value="GG">Guernsey</option>' . "\n";
echo "\t" . '<option value="GN">Guinea</option>' . "\n";
echo "\t" . '<option value="GW">Guinea-Bissau</option>' . "\n";
echo "\t" . '<option value="GY">Guyana</option>' . "\n";
echo "\t" . '<option value="HT">Haiti</option>' . "\n";
echo "\t" . '<option value="HM">Heard Island and McDonald Islands</option>' . "\n";
echo "\t" . '<option value="VA">Holy See (Vatican City State)</option>' . "\n";
echo "\t" . '<option value="HN">Honduras</option>' . "\n";
echo "\t" . '<option value="HK">Hong Kong</option>' . "\n";
echo "\t" . '<option value="HU">Hungary</option>' . "\n";
echo "\t" . '<option value="IS">Iceland</option>' . "\n";
echo "\t" . '<option value="IN">India</option>' . "\n";
echo "\t" . '<option value="ID">Indonesia</option>' . "\n";
echo "\t" . '<option value="IR">Iran, Islamic Republic of</option>' . "\n";
echo "\t" . '<option value="IQ">Iraq</option>' . "\n";
echo "\t" . '<option value="IE">Ireland</option>' . "\n";
echo "\t" . '<option value="IM">Isle of Man</option>' . "\n";
echo "\t" . '<option value="IL">Israel</option>' . "\n";
echo "\t" . '<option value="IT">Italy</option>' . "\n";
echo "\t" . '<option value="JM">Jamaica</option>' . "\n";
echo "\t" . '<option value="JP">Japan</option>' . "\n";
echo "\t" . '<option value="JE">Jersey</option>' . "\n";
echo "\t" . '<option value="JO">Jordan</option>' . "\n";
echo "\t" . '<option value="KZ">Kazakhstan</option>' . "\n";
echo "\t" . '<option value="KE">Kenya</option>' . "\n";
echo "\t" . '<option value="KI">Kiribati</option>' . "\n";
echo "\t" . '<option value="KP">Korea, Democratic People\'s Republic of</option>' . "\n";
echo "\t" . '<option value="KR">Korea, Republic of</option>' . "\n";
echo "\t" . '<option value="KW">Kuwait</option>' . "\n";
echo "\t" . '<option value="KG">Kyrgyzstan</option>' . "\n";
echo "\t" . '<option value="LA">Lao People\'s Democratic Republic</option>' . "\n";
echo "\t" . '<option value="LV">Latvia</option>' . "\n";
echo "\t" . '<option value="LB">Lebanon</option>' . "\n";
echo "\t" . '<option value="LS">Lesotho</option>' . "\n";
echo "\t" . '<option value="LR">Liberia</option>' . "\n";
echo "\t" . '<option value="LY">Libya</option>' . "\n";
echo "\t" . '<option value="LI">Liechtenstein</option>' . "\n";
echo "\t" . '<option value="LT">Lithuania</option>' . "\n";
echo "\t" . '<option value="LU">Luxembourg</option>' . "\n";
echo "\t" . '<option value="MO">Macao</option>' . "\n";
echo "\t" . '<option value="MK">Macedonia, the former Yugoslav Republic of</option>' . "\n";
echo "\t" . '<option value="MG">Madagascar</option>' . "\n";
echo "\t" . '<option value="MW">Malawi</option>' . "\n";
echo "\t" . '<option value="MY">Malaysia</option>' . "\n";
echo "\t" . '<option value="MV">Maldives</option>' . "\n";
echo "\t" . '<option value="ML">Mali</option>' . "\n";
echo "\t" . '<option value="MT">Malta</option>' . "\n";
echo "\t" . '<option value="MH">Marshall Islands</option>' . "\n";
echo "\t" . '<option value="MQ">Martinique</option>' . "\n";
echo "\t" . '<option value="MR">Mauritania</option>' . "\n";
echo "\t" . '<option value="MU">Mauritius</option>' . "\n";
echo "\t" . '<option value="YT">Mayotte</option>' . "\n";
echo "\t" . '<option value="MX">Mexico</option>' . "\n";
echo "\t" . '<option value="FM">Micronesia, Federated States of</option>' . "\n";
echo "\t" . '<option value="MD">Moldova, Republic of</option>' . "\n";
echo "\t" . '<option value="MC">Monaco</option>' . "\n";
echo "\t" . '<option value="MN">Mongolia</option>' . "\n";
echo "\t" . '<option value="ME">Montenegro</option>' . "\n";
echo "\t" . '<option value="MS">Montserrat</option>' . "\n";
echo "\t" . '<option value="MA">Morocco</option>' . "\n";
echo "\t" . '<option value="MZ">Mozambique</option>' . "\n";
echo "\t" . '<option value="MM">Myanmar</option>' . "\n";
echo "\t" . '<option value="NA">Namibia</option>' . "\n";
echo "\t" . '<option value="NR">Nauru</option>' . "\n";
echo "\t" . '<option value="NP">Nepal</option>' . "\n";
echo "\t" . '<option value="NL">Netherlands</option>' . "\n";
echo "\t" . '<option value="NC">New Caledonia</option>' . "\n";
echo "\t" . '<option value="NZ">New Zealand</option>' . "\n";
echo "\t" . '<option value="NI">Nicaragua</option>' . "\n";
echo "\t" . '<option value="NE">Niger</option>' . "\n";
echo "\t" . '<option value="NG">Nigeria</option>' . "\n";
echo "\t" . '<option value="NU">Niue</option>' . "\n";
echo "\t" . '<option value="NF">Norfolk Island</option>' . "\n";
echo "\t" . '<option value="MP">Northern Mariana Islands</option>' . "\n";
echo "\t" . '<option value="NO">Norway</option>' . "\n";
echo "\t" . '<option value="OM">Oman</option>' . "\n";
echo "\t" . '<option value="PK">Pakistan</option>' . "\n";
echo "\t" . '<option value="PW">Palau</option>' . "\n";
echo "\t" . '<option value="PS">Palestinian Territory, Occupied</option>' . "\n";
echo "\t" . '<option value="PA">Panama</option>' . "\n";
echo "\t" . '<option value="PG">Papua New Guinea</option>' . "\n";
echo "\t" . '<option value="PY">Paraguay</option>' . "\n";
echo "\t" . '<option value="PE">Peru</option>' . "\n";
echo "\t" . '<option value="PH">Philippines</option>' . "\n";
echo "\t" . '<option value="PN">Pitcairn</option>' . "\n";
echo "\t" . '<option value="PL">Poland</option>' . "\n";
echo "\t" . '<option value="PT">Portugal</option>' . "\n";
echo "\t" . '<option value="PR">Puerto Rico</option>' . "\n";
echo "\t" . '<option value="QA">Qatar</option>' . "\n";
echo "\t" . '<option value="RE">Réunion</option>' . "\n";
echo "\t" . '<option value="RO">Romania</option>' . "\n";
echo "\t" . '<option value="RU">Russian Federation</option>' . "\n";
echo "\t" . '<option value="RW">Rwanda</option>' . "\n";
echo "\t" . '<option value="BL">Saint Barthélemy</option>' . "\n";
echo "\t" . '<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>' . "\n";
echo "\t" . '<option value="KN">Saint Kitts and Nevis</option>' . "\n";
echo "\t" . '<option value="LC">Saint Lucia</option>' . "\n";
echo "\t" . '<option value="MF">Saint Martin (French part)</option>' . "\n";
echo "\t" . '<option value="PM">Saint Pierre and Miquelon</option>' . "\n";
echo "\t" . '<option value="VC">Saint Vincent and the Grenadines</option>' . "\n";
echo "\t" . '<option value="WS">Samoa</option>' . "\n";
echo "\t" . '<option value="SM">San Marino</option>' . "\n";
echo "\t" . '<option value="ST">Sao Tome and Principe</option>' . "\n";
echo "\t" . '<option value="SA">Saudi Arabia</option>' . "\n";
echo "\t" . '<option value="SN">Senegal</option>' . "\n";
echo "\t" . '<option value="RS">Serbia</option>' . "\n";
echo "\t" . '<option value="SC">Seychelles</option>' . "\n";
echo "\t" . '<option value="SL">Sierra Leone</option>' . "\n";
echo "\t" . '<option value="SG">Singapore</option>' . "\n";
echo "\t" . '<option value="SX">Sint Maarten (Dutch part)</option>' . "\n";
echo "\t" . '<option value="SK">Slovakia</option>' . "\n";
echo "\t" . '<option value="SI">Slovenia</option>' . "\n";
echo "\t" . '<option value="SB">Solomon Islands</option>' . "\n";
echo "\t" . '<option value="SO">Somalia</option>' . "\n";
echo "\t" . '<option value="ZA">South Africa</option>' . "\n";
echo "\t" . '<option value="GS">South Georgia and the South Sandwich Islands</option>' . "\n";
echo "\t" . '<option value="SS">South Sudan</option>' . "\n";
echo "\t" . '<option value="ES">Spain</option>' . "\n";
echo "\t" . '<option value="LK">Sri Lanka</option>' . "\n";
echo "\t" . '<option value="SD">Sudan</option>' . "\n";
echo "\t" . '<option value="SR">Suriname</option>' . "\n";
echo "\t" . '<option value="SJ">Svalbard and Jan Mayen</option>' . "\n";
echo "\t" . '<option value="SZ">Swaziland</option>' . "\n";
echo "\t" . '<option value="SE">Sweden</option>' . "\n";
echo "\t" . '<option value="CH">Switzerland</option>' . "\n";
echo "\t" . '<option value="SY">Syrian Arab Republic</option>' . "\n";
echo "\t" . '<option value="TW">Taiwan, Province of China</option>' . "\n";
echo "\t" . '<option value="TJ">Tajikistan</option>' . "\n";
echo "\t" . '<option value="TZ">Tanzania, United Republic of</option>' . "\n";
echo "\t" . '<option value="TH">Thailand</option>' . "\n";
echo "\t" . '<option value="TL">Timor-Leste</option>' . "\n";
echo "\t" . '<option value="TG">Togo</option>' . "\n";
echo "\t" . '<option value="TK">Tokelau</option>' . "\n";
echo "\t" . '<option value="TO">Tonga</option>' . "\n";
echo "\t" . '<option value="TT">Trinidad and Tobago</option>' . "\n";
echo "\t" . '<option value="TN">Tunisia</option>' . "\n";
echo "\t" . '<option value="TR">Turkey</option>' . "\n";
echo "\t" . '<option value="TM">Turkmenistan</option>' . "\n";
echo "\t" . '<option value="TC">Turks and Caicos Islands</option>' . "\n";
echo "\t" . '<option value="TV">Tuvalu</option>' . "\n";
echo "\t" . '<option value="UG">Uganda</option>' . "\n";
echo "\t" . '<option value="UA">Ukraine</option>' . "\n";
echo "\t" . '<option value="AE">United Arab Emirates</option>' . "\n";
echo "\t" . '<option value="UM">United States Minor Outlying Islands</option>' . "\n";
echo "\t" . '<option value="UY">Uruguay</option>' . "\n";
echo "\t" . '<option value="UZ">Uzbekistan</option>' . "\n";
echo "\t" . '<option value="VU">Vanuatu</option>' . "\n";
echo "\t" . '<option value="VE">Venezuela, Bolivarian Republic of</option>' . "\n";
echo "\t" . '<option value="VN">Viet Nam</option>' . "\n";
echo "\t" . '<option value="VG">Virgin Islands, British</option>' . "\n";
echo "\t" . '<option value="VI">Virgin Islands, U.S.</option>' . "\n";
echo "\t" . '<option value="WF">Wallis and Futuna</option>' . "\n";
echo "\t" . '<option value="EH">Western Sahara</option>' . "\n";
echo "\t" . '<option value="YE">Yemen</option>' . "\n";
echo "\t" . '<option value="ZM">Zambia</option>' . "\n";
echo "\t" . '<option value="ZW">Zimbabwe</option>' . "\n";
echo '                                    </select>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="vpn_state">' . "\n";
echo '                                        <strong>State / Region</strong> ' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input class="form-control text-primary" id="description" name="vpn_state" placeholder="Enter State" type="text" />' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label requiredField" for="vpn_status" />' . "\n";
echo '                                        <strong>Status</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <select class="select form-control text-primary" id="select" name="vpn_status" >' . "\n";
echo '                                        <option value="ACTIVE">' . "\n";
echo '                                            ACTIVE' . "\n";
echo '                                        </option>' . "\n";
echo '                                        <option value="INACTIVE">' . "\n";
echo '                                            INACTIVE' . "\n";
echo '                                        </option>' . "\n";
echo '                                    </select>' . "\n";
echo '                                </div>' . "\n";
echo '                                 <div class="form-group">' . "\n";
echo '                                    <label class="control-label" for="auth_type"><strong>Auth Type</strong></label>' . "\n";
echo '                                    <select class="select form-control text-primary" id="select" name="auth_type">' . "\n";
echo '                                        <option value="up">Username and Password</option>' . "\n";
echo '                                        <option value="noup">No Username and Password</option>' . "\n";
echo '                                    </select>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group">' . "\n";
echo '                                    <label class="control-label" for="auth_embedded"><strong>Auth Embedded</strong></label>' . "\n";
echo '                                    <select class="select form-control text-primary" id="select" name="auth_embedded">' . "\n";
echo '                                        <option value="NO">NO</option>' . "\n";
echo '                                        <option value="YES">YES</option>' . "\n";
echo '                                    </select>' . "\n";
echo '                                </div>';
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="username">' . "\n";
echo '                                        <strong>Username</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input type="text" class="form-control text-primary" name="username" placeholder="Enter Username" id="discription" />' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="password">' . "\n";
echo '                                        <strong>Password</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group"> ' . "\n";
echo '                                        <input type="text" class="form-control text-primary" name="password" placeholder="Enter Password" id="discription" />' . "\n";
echo '                                        <input type="hidden" class="form-control" name="date" value="';
echo date('Y-m-d h:i:s');
echo ' ">' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo "\n";
echo '                                <div class="form-group ">' . "\n";
echo '                                    <label class="control-label " for="vpn_config">' . "\n";
echo '                                        <strong>URL</strong>' . "\n";
echo '                                    </label>' . "\n";
echo '                                    <div class="input-group">' . "\n";
echo '                                        <input type="text" class="form-control text-primary" name="vpn_config" id="vpn_config" placeholder="Enter File URL"  />' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                                <div class="form-group">' . "\n";
echo '                                    <div>' . "\n";
echo '                                        <button class="btn btn-success btn-icon-split" name="submit" type="submit">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Submit</span>' . "\n";
echo '                        </button>' . "\n";
echo '                        <a button class="btn btn-primary btn-icon-split" id="button" href="./vpn_create_upload.php">' . "\n";
echo '                        <span class="icon text-white-50"><i class="fa fa-cloud-upload"></i></span><span class="text">Upload</span>' . "\n";
echo '                        </button></a>' . "\n";
echo '                                    </div>' . "\n";
echo '                                </div>' . "\n";
echo '                            </form>' . "\n";
echo '                        </div>' . "\n";
echo '                    </div>' . "\n";
echo '                </div>' . "\n";
echo '            </div>' . "\n";
echo '        </div>' . "\n";
echo '    </div>' . "\n";
echo '    <br><br><br>';
include 'includes/footer.php';
require 'includes/appsnscripts.php';
echo '</body>' . "\n";

?>