<?php
session_start();

require_once __DIR__ . '/mail_config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Composer のオートローダーの読み込み（ファイルの位置によりパスを適宜変更）
require __DIR__ . '/vendor/autoload.php';
//エラーメッセージ用日本語言語ファイルを読み込む場合（25行目の指定も必要）
require __DIR__ . '/vendor/phpmailer/phpmailer/language/phpmailer.lang-ja.php';

//レスポンスヘッダーをJSONに設定
header('Content-Type: application/json');
$response = [
    'status' => 'error',
    'message' => 'メール送信に失敗しました。'
];

//csrfチェック
if (empty($_SESSION['csrf_token']) || $_SESSION['csrf_token'] !== $_POST['csrf_token']) {
    $response['message'] = 'csrf token error :'.$_SESSION['csrf_token'].' : '.$_POST['csrf_token'];
    echo json_encode($response);
    exit;
}

//言語、内部エンコーディングを指定
mb_language("japanese");
mb_internal_encoding("UTF-8");

// インスタンスを生成（引数に true を指定して例外 Exception を有効に）
$mail = new PHPMailer(true);
 
//日本語用設定
$mail->CharSet = "iso-2022-jp";
$mail->Encoding = "7bit";
 
//エラーメッセージ用言語ファイルを使用する場合に指定
$mail->setLanguage('ja', 'vendor/phpmailer/phpmailer/language/');

$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Host = MAIL_HOST;
$mail->Port = MAIL_PORT;
$mail->SMTPAuth = true;
$mail->isHTML(true);
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);

 //ユーザへの送信
 $mail->addAddress('wataru4183.78@gmail.com');
 $mail->Subject = sprintf(sprintf('%s様 お問い合わせ-控え', 'wataru'));

 $mail->Body = 'test';

 try {
     $mail->send();
     $response['status'] = 'success';
     $response['message'] = 'メール送信に成功しました。';
     //セッションを破棄
     session_destroy();
     echo json_encode($response);
 } catch (\Exception $e) {
     $response['message'] = $e->getMessage();
     echo json_encode($response);
 }