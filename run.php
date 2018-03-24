#!/data/data/com.termux/files/usr/bin/php
<?php
if(strtolower(substr(PHP_OS, 0, 3)) == "win") {
$bersih="cls";
} else {
$bersih="clear";
}
function input($echo) {
	echo $echo." --> ";
}
menu:
system($bersih);
$green  = "\e[92m";
$red    = "\e[91m";
$yellow = "\e[93m";
$blue   = "\e[36m";
echo "\n$yellow
 _____                                               _   
/__   \  ___  _ __  _ __ ___   _   _ __  __         /_\  
  / /\/ / _ \| '__|| '_ ` _ \ | | | |\ \/ / _____  //_\\ 
 / /   |  __/| |   | | | | | || |_| | >  < |_____|/  _  \
 \/     \___||_|   |_| |_| |_| \__,_|/_/\_\       \_/ \_/";
echo "\n$blue
Author  : Cvar1984
Code    : PHP
Github  : http://github.com/Cvar1984
Team    : BlackHole Security
Version : 0.1 ( Beta )
Date    : 24-03-2018\n";
echo "$red=========================== Cvar1984 ))=====(@)>".$green."\n";
echo "(01) SMS\n";
echo "(02) Wifi\n";
echo "(03) Battery\n";
echo "(04) Call\n";
echo "(05) Info\n";
echo "(06) Contact List\n";
echo "(07) Speak\n";
echo "$red=========================== Cvar1984 ))=====(@)>".$green."\n";
input("Chose");
$pilih=trim(fgets(STDIN));
echo "$red=========================== Cvar1984 ))=====(@)>".$green."\n";
if($pilih == "1" OR $pilih == "01") {
	menu_sms:
	echo "(01) Read inbox )>\n";
	echo "(02) Send Sms )>\n";
	input("Chose");
	$subpilih=trim(fgets(STDIN));
	if($subpilih == "1" OR $subpilih == "01") {
		ob_start();
		system("termux-sms-inbox");
		$out=ob_get_contents();
		ob_end_clean();
		$output=json_decode($out, true);
		foreach ($output as $output) {
		echo "Number   : ".$output["number"]."\n";
		echo "Received : ".$output["received"]."\n";
		echo "Text     : ".$output["body"]."\n\n";
		}
		echo "Press".$yellow." [ENTER] ".$green."Back To menu";
		fgets(STDIN);
		goto menu;
	}	elseif($subpilih == "2" OR $subpilih == "02") {
		input("Phone number");
		$no=trim(fgets(STDIN));
		input("Text");
		$isi=trim(fgets(STDIN));
		system("termux-sms-send -n ".$no." ".$isi);
		echo "Press".$yellow." [ENTER] ".$green."Back To menu";
		fgets(STDIN);
		goto menu;
	} else {
		goto menu_sms;
	}
} elseif($pilih == "2" OR $pilih == "02") {
	ob_start();
	system("termux-wifi-connectioninfo");
	$out=ob_get_contents();
	ob_end_clean();
	$output=json_decode($out, true);
	echo "SSID      : ".$output["ssid"]."\n";
	echo "Status    : ".$output["supplicant_state"]."\n";
	echo "H-SSID    : ".$output["ssid_hidden"]."\n";
	echo "BSSID     : ".$output["bssid"]."\n";
	echo "Frequency : ".$output["frequency_mhz"]." MHZ\n";
	echo "IP        : ".$output["ip"]."\n";
	echo "Speed     : ".$output["link_speed_mbps"]." MBPS\n";
	echo "MAC       : ".$output["mac_address"]."\n";
	echo "Net ID    : ".$output["network_id"]."\n\n";
	echo "Press".$yellow." [ENTER] ".$green."Back To menu";
		fgets(STDIN);
		goto menu;
} elseif($pilih == "3" OR $pilih == "03") {
	ob_start();
	system("termux-battery-status");
	$out=ob_get_contents();
	ob_end_clean();
	$output=json_decode($out, true);
	echo "Health      : ".$output["health"]."\n";
	echo "Percentage  : ".$output["percentage"]."\n";
	echo "Charging    : ".$output["plugged"]."\n";
	echo "Status      : ".$output["status"]."\n";
	echo "Temperature : ".$output["temperature"]."\n\n";
	echo "Press".$yellow." [ENTER] ".$green."Back To menu";
		fgets(STDIN);
		goto menu;
} elseif($pilih == "4" OR $pilih == "04") {
	input("Phone number");
	$no=trim(fgets(STDIN));
	system("termux-telephony-call ".$no);
	echo "Press".$yellow." [ENTER] ".$green."Back To menu";
		fgets(STDIN);
		goto menu;
} elseif($pilih == "5" OR $pilih == "05") {
	system("termux-info");
	echo "Press".$yellow." [ENTER] ".$green."Back To menu";
		fgets(STDIN);
		goto menu;
} elseif($pilih == "6" OR $pilih == "06") {
	ob_start();
	system("termux-contact-list");
	$out=ob_get_contents();
	ob_end_clean();
	$output=json_decode($out, true);
	foreach($output as $output) {
	echo "Name   : ".$output["name"]."\n";
	echo "Number : ".$output["number"]."\n\n";
	}
	echo "Press".$yellow." [ENTER] ".$green."Back To menu";
		fgets(STDIN);
		goto menu;
} elseif($pilih == "7" OR $pilih == "07") {
	input("Text To Speak");
	$speak=trim(fgets(STDIN));
	system("termux-tts-speak ".$speak);
	echo "Press".$yellow." [ENTER] ".$green."Back To menu";
		fgets(STDIN);
		goto menu;
} else {
	goto menu;
}