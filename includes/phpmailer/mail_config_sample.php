<?php
// このファイルは単体でアクセスされた場合には何も表示しない
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // 直接アクセスされたときの処理（例：403 Forbiddenで終了）
  http_response_code(403);
  exit('Forbidden');
}
//phpmailer情報
define('MAIL_HOST', '');
define('MAIL_PORT', 587);
define('MAIL_USERNAME', '');
define('MAIL_PASSWORD', '');
define('MAIL_ENCRYPTION', '');
define('MAIL_CHARSET', '');

// 送信先
define('MAIL_TO', '');
define('MAIL_TO_NAME', '');
define('MAIL_FROM', '');
define('MAIL_FROM_NAME', '');
define('MAIL_RETURN_PATH', '');

