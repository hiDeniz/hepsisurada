<?php
    $userID = $_GET['userID'];  // set a default value of 1 if no userID parameter is passed
    $URL = "https://hepsisuradacs306-default-rtdb.firebaseio.com/Messages.json?orderBy=%22userID%22&equalTo=$userID";
    $pureURL = "https://hepsisuradacs306-default-rtdb.firebaseio.com/Messages.json";

    header("refresh: 15"); // Refresh the page every 15 seconds (for new messages)



    function compare_int_value($a, $b) {
        if ($a['int_value'] == $b['int_value']) {
          return 0;
        }
        return ($a['int_value'] < $b['int_value']) ? -1 : 1;
      }



    function get_messages() { 
        global $URL;
        $ch = curl_init();
        curl_setopt_array($ch, [ CURLOPT_URL => $URL,
                                CURLOPT_POST => FALSE, // It will be a get request 
                                CURLOPT_RETURNTRANSFER => true, ]);
        $response = curl_exec($ch); 
        curl_close($ch);
        $messages = json_decode($response, true);

        usort($messages, 'compare_int_value');
        return $messages;
    }
    
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
        header("Location: http://localhost/hepsisurada/php-firebase/chatAdminPage.php?userID=$userID");
        exit();
        return $response;
    }


    include "../config.php";
     $sql_command = "SELECT * FROM users WHERE uid = $_GET[userID]";
     $result = mysqli_query($db, $sql_command);
     $row = mysqli_fetch_array($result);
     $userName = $row['uName'];
     $msg_res_json = get_messages();
     global $userID;

    if (isset($_POST['usermsg'])) {
        $user_msg = $_POST['usermsg'];
        send_msg($user_msg, "admin", intval($userID));
        echo $user_msg;
    }

?>


<style>
:root {
  --body-bg: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
  --msger-bg: #fff;
  --border: 2px solid #ddd;
  --left-msg-bg: #218aff;
  --right-msg-bg: #1c732a;
}

html {
  box-sizing: border-box;
}

*,
*:before,
*:after {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-image: var(--body-bg);
  font-family: Helvetica, sans-serif;
}

.msger {
  display: flex;
  flex-flow: column wrap;
  justify-content: space-between;
  width: 100%;
  max-width: 867px;
  margin: 25px 10px;
  height: calc(100% - 50px);
  border: var(--border);
  border-radius: 5px;
  background: var(--msger-bg);
  box-shadow: 0 15px 15px -5px rgba(0, 0, 0, 0.2);
}

.msger-header {
  display: flex;
  justify-content: space-between;
  padding: 10px;
  border-bottom: var(--border);
  background: #eee;
  color: #666;
}

.msger-chat {
  flex: 1;
  overflow-y: auto;
  padding: 10px;
}
.msger-chat::-webkit-scrollbar {
  width: 6px;
}
.msger-chat::-webkit-scrollbar-track {
  background: #ddd;
}
.msger-chat::-webkit-scrollbar-thumb {
  background: #bdbdbd;
}
.msg {
  display: flex;
  align-items: flex-end;
  margin-bottom: 10px;
}
.msg:last-of-type {
  margin: 0;
}
.msg-img {
  width: 50px;
  height: 50px;
  margin-right: 10px;
  background: #ddd;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  border-radius: 50%;
}
.msg-bubble {
  max-width: 450px;
  padding: 15px;
  border-radius: 15px;
  background: var(--left-msg-bg);
}
.msg-info {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}
.msg-info-name {
  margin-right: 10px;
  font-weight: bold;
}
.msg-info-time {
  font-size: 0.85em;
}

.left-msg .msg-bubble {
  border-bottom-left-radius: 0;
}

.right-msg {
  flex-direction: row-reverse;
}
.right-msg .msg-bubble {
  background: var(--right-msg-bg);
  color: #fff;
  border-bottom-right-radius: 0;
}
.right-msg .msg-img {
  margin: 0 0 0 10px;
}

.msger-inputarea {
  display: flex;
  padding: 10px;
  border-top: var(--border);
  background: #eee;
}
.msger-inputarea * {
  padding: 10px;
  border: none;
  border-radius: 3px;
  font-size: 1em;
}
.msger-input {
  flex: 1;
  background: #ddd;
}
.msger-send-btn {
  margin-left: 10px;
  background: rgb(0, 196, 65);
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.23s;
}
.msger-send-btn:hover {
  background: rgb(0, 180, 50);
}








</style>

<!DOCTYPE html>
<section class="msger">
  <header class="msger-header">
    <div class="msger-header-title">
      <i class="fas fa-comment-alt"></i> Hepsisurada Support  | Logged as: ADMIN
    </div>
    <div class="msger-header-options">
      <span><i class="fas fa-cog"></i></span>
    </div>
  </header>

  <main class="msger-chat">
  <?php
     



     $keys = array_keys($msg_res_json);
     for ($i = 0; $i < count($keys); $i++){
         $chat_msg = $msg_res_json[$keys[$i]];
         $name = $chat_msg['name'];
         $msg = $chat_msg['msg'];
         $time = $chat_msg['time'];
         if ($name == 'admin') {
             $from = 'msg right-msg';
             $imgSrc = "url(https://i.hizliresim.com/izaawpo.jpg)";
         } else {
             $from = 'msg left-msg';
             $imgSrc = "url(https://icons.iconarchive.com/icons/icons8/windows-8/512/Users-Guest-icon.png)";
         }
        echo  '
        <li class="'.$from.'">
        <div class="msg-img" style="background-image: '.$imgSrc.'"></div>
        <div class="msg-bubble">
          <div class="msg-info">
            <div class="msg-info-name">'.$name.'</div>
            <div class="msg-info-time">'.$time.'</div>
          </div>
          <div class="msg-text">'.$msg.'</div>
        </div>
        </li>
        ';
     }
 ?>
  </main>

  <form class="msger-inputarea" action = "chatAdminPage.php?userID=<?php echo $userID; ?>" method = "POST">
    <input name = "usermsg" type="text" class="msger-input" placeholder="Enter your message...">
    <button type="submit" class="msger-send-btn">Send</button>
  </form>
</section>