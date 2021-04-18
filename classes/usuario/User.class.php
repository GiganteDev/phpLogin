<?php
class User {
    public function login($user, $pass) {
        Global $pdo;
        $sql = "SELECT * FROM usuarios WHERE user = :user";
        $sql = $pdo -> prepare($sql);
        $sql -> bindValue("user", $user);
        $sql -> execute();
        if($sql -> rowCount() < 1) {
            return false;
        }

        if($sql -> rowCount() > 0) {
            $data = $sql -> fetch();
            if (password_verify($pass, $data['pass'])) {
                $_SESSION['idUser'] = $data['id'];
                return true;
            } else {
                return false;
            }
        }
    }

    public function register($email, $user, $pass) {
        Global $pdo;
        $sql = "INSERT INTO `usuarios`(`user`, `email`, `pass`) VALUES (:user, :email, :pass)";
        $sql = $pdo -> prepare($sql);
        $sql -> bindValue("user", $user);
        $sql -> bindValue("email", $email);
        $sql -> bindValue("pass", password_hash($pass, PASSWORD_DEFAULT));
        $sql -> execute();
        return true;
    }
}
?>