<?php
if (!isset($_GET["ip"])) {
	exit("[ERROR] No IP\n");
}
echo "Got \"".$_GET["ip"]."\"\n";
if (preg_match("/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/", $_GET["ip"])==0) {
	exit("[ERROR] Format\n");
}
$ipfile=file_GET_contents("ip.txt");
preg_match_all("/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/", $ipfile, $m);
$ip=$m[0];
if (in_array($_GET["ip"], $ip)) {
	exit("[Warning] Duplicate\n");
}
$ip[]=$_GET["ip"];
$ok=file_put_contents("ip.txt", implode("\n", $ip));
if ($ok===false) {
	exit("[ERROR] Write \"ip.txt\" fail. Please chmod 777.\n");
}
echo "[OK] Added \"".$_GET["ip"]."\"\n";