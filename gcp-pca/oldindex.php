<?php
$ip         = $_SERVER['REMOTE_ADDR'];
$infoFromIp = json_decode(file_get_contents("http://ip-api.com/json/" . $ip), true);
$status     = $infoFromIp['status'];
if ($status == "success") {
    date_default_timezone_set("Asia/Kolkata");
    $text = "---" . $ip . " | " . $infoFromIp['country'] . " | " . $infoFromIp['city'] . " | " . $infoFromIp['zip'] . " | " . date('d-m-Y H:i:s') . " | GCP-PCA | " . "---\n";
    $fp   = fopen('../userlog.txt', 'a+');
    fwrite($fp, $text);
    fclose($fp);
}
header("location: https://www.credly.com/badges/45b0d865-e792-483c-b723-74f57ae08af1");
