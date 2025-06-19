<?php
session_start();

$confirm = isset($_POST['confirm']) ? $_POST['confirm'] : '';
if($confirm !== 'confirm'){
    header('Location: index.html');
    exit;
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  }
  $csrf_token = $_SESSION['csrf_token'];