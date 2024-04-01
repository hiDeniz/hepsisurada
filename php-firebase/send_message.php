<?php
include "dbconfig.php";
 
$URL = "https://hepsisuradacs306-default-rtdb.firebaseio.com/Messages.json?orderBy=%22userID%22&equalTo=$userID";
$pureURL = "https://hepsisuradacs306-default-rtdb.firebaseio.com/Messages.json";

$userID = $_POST['uid'];
$msg = $_POST['message'];


function send_msg($msg, $name, $userID) { 
    global $pureURL;
    $ch = curl_init();
    $msg_json = new stdClass();
    $msg_json->msg = $msg;
    $msg_json->name = $name;
    $time = date("d/m/Y H:i:s");
        $day = (int) sprintf("%02d", substr($time, 0, 2));
        $month = (int) sprintf("%02d", substr($time, 3, 2));
        $year = (int) sprintf("%04d", substr($time, 6, 4));
        $hour = (int) sprintf("%02d", substr($time, 11, 2));
        $minute = (int) sprintf("%02d", substr($time, 14, 2));
        $sec = (int) sprintf("%02d", substr($time, 17, 2));
        // Combine the day, month, year, hour, and minute into a single integer value
        $int_value = $year * 10000000000 + $month * 100000000 + $day * 1000000 + $hour * 10000 + 100* $minute + $sec;
        $msg_json->time = $time;
        $msg_json->int_value = $int_value;
    $msg_json->userID = $userID;
    $encoded_json_obj = json_encode($msg_json); 
    curl_setopt_array($ch, array(CURLOPT_URL => $pureURL,
                                CURLOPT_POST => TRUE,
                                CURLOPT_RETURNTRANSFER => TRUE,
                                CURLOPT_HTTPHEADER => array('Content-Type: application/json' ),
                                CURLOPT_POSTFIELDS => $encoded_json_obj ));
    $response = curl_exec($ch); 
    header("Location: http://localhost/hepsisurada/php-firebase/tickets.php");
    exit();
    return $response;
}

if (!empty ($msg) && !empty($userID)){
    $admin_msg = $msg;
    send_msg($admin_msg, "admin", intval($userID));
    echo $user_msg;
}

?>