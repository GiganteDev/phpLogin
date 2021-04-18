<?php
if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass']) && isset($_POST['email']) && !empty($_POST['email'])) {
    $pass = addslashes($_POST['pass']);
    $user = addslashes($_POST['user']);
    $email = addslashes($_POST['email']);

    require('../conexao.php');
    require('../../classes/usuario/User.class.php');
    $u = new User();
    if($u -> register($email, $user, $pass)) {
        header('Location: ../../auth/login/');
    } else {
        sendToRegisterPage();
    }

} else {
    sendToRegisterPage();
}

function sendToRegisterPage() {
    header('Location: ../../auth/register/');
}
?>

