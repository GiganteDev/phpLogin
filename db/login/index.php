<?php
  if(isset($_POST['user']) && !empty($_POST['user'])) && isset($_POST['pass']) && !empty($_POST['pass'])) {
    $pass = addslashes($_POST['pass']);
    $user = addslashes($_POST['user']);

    require('../conexao.php');
    require('../../classes/usuario/User.class.php');
    $u = new User();
    if($u -> login($user, $pass)) {
        if(isset($_SESSION['idUser'])) {
            header('Location: ../../dashboard/');
        } else {
            sendToLoginPage();
        }
    } else {
        sendToLoginPage();
    }

} else {
    sendToLoginPage();
}

function sendToLoginPage() {
    header('Location: ../../auth/login/');
}
?>