<?php
require_once __DIR__ . '/includes/confirm_header.php';
$confirm = isset($_POST['confirm']) ? $_POST['confirm'] : '';
if($confirm !== 'confirm'){
    header('Location: index.html');
    exit;
}

// フォームから送信されたデータを取得
$case = $_POST['case'];
$name1 = $_POST['name1'];
$name2 = $_POST['name2'];
$address = $_POST['address'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$case = $_POST['case'];
$privacy = $_POST['privacy'];
$message = $_POST['message'];
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">

<title>phpform</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="">
<link rel="shortcut icon" href="">
<link rel="stylesheet" href="./css/init.css">
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main class="page infomail" style="padding: 100px 0;">
        <div class="infomail--inner">
            <h1 class="title title--contents">
                お問い合わせフォーム - 確認画面
                <span>CONTACT</span>
            </h1>
            <form id="myForm" method="post" >
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                <dl class="formGroup">
                    <dt>
                        <label>種別（複数選択可）</label>
                    </dt>
                    <dd class="inputEmail">
                        <?php foreach($case as $value) { ?>
                            <div>
                                <?php echo $value; ?><br/>
                                <input type="hidden" name="case[]" value="<?php echo $value; ?>">
                            </div>
                        <?php } ?>
                      
                    </dd>
                  </dl>
                <dl class="formGroup">
                    <dt>
                        <label class="required">名前</label>
                    </dt>
                    <dd class="inputName">
                       <?php echo $name1; ?> <?php echo $name2; ?>
                       <input type="hidden" name="name1" value="<?php echo $name1; ?> <?php echo $name2; ?>">
                    </dd>
                </dl>
                <dl class="formGroup">
                    <dt>
                        <label class="required">住所</label>
                    </dt>
                    <dd class="inputAddress">
                        <?php echo $address; ?>
                        <input type="hidden" name="address" value="<?php echo $address; ?>">
                    </dd>
                </dl>
                <dl class="formGroup">
                    <dt>
                        <label class="required">E-mail</label>
                    </dt>
                    <dd class="inputEmail">
                        <?php echo $email; ?>
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                    </dd>
                </dl>
                <dl class="formGroup">
                    <dt>
                        <label class="required">電話番号</label>
                    </dt>
                    <dd class="inputEmail">
                        <?php echo $tel; ?>
                        <input type="hidden" name="tel" value="<?php echo $tel; ?>">
                    </dd>
                </dl>
                <dl class="formGroup">
                    <dt>
                        <label class="required">お問い合わせ内容</label>
                    </dt>
                    <dd class="inputBirth">
                       <?php echo nl2br($message); ?>
                       <input type="hidden" name="message" value="<?php echo $message; ?>">
                    </dd>
                </dl>
               
                <div class="privacyCheck">
                <input 
                    type="checkbox" 
                    name="privacy"
                    id="privacy"
                    />
                <label class="checkbox" For='privacy'>個人情報取り扱い事項に同意します</label>
                </div>
                <div class="submit">
                    <input type="submit" value="確認画面へ"/>
                </div>
             </form>
        </div>
    </main>
    <script src="./js/form.send.js"></script>
</body>
</html>