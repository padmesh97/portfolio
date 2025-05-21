<?php
$ip         = $_SERVER['REMOTE_ADDR'];
$infoFromIp = json_decode(file_get_contents("http://ip-api.com/json/" . $ip), true);
$status     = $infoFromIp['status'];
if ($status == "success") {
    date_default_timezone_set("Asia/Kolkata");
    $text = "---" . $ip . " | " . $infoFromIp['country'] . " | " . $infoFromIp['city'] . " | " . $infoFromIp['zip'] . " | " . date('d-m-Y H:i:s') . " | RESUME DOWNLOADED | " . "---\n";
    $fp   = fopen('userlog.txt', 'a+');
    fwrite($fp, $text);
    fclose($fp);
}
header("location: ./files/padmesh_resume_v12_1_software_developer.pdf");
