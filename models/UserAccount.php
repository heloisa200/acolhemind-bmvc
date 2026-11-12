<?php

class UserAccount extends Model {
    public static function autenticar($email, $senha) {
        $db = self::conectar();
        $stmt = $db->prepare("SELECT * FROM user_account WHERE email = :email AND senha = :senha");
        $stmt->execute([':email' => $email, ':senha' => $senha]);
        return $stmt->fetch() ? true : false;
    }
}
