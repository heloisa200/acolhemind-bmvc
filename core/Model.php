<?php

abstract class Model {
    protected static $db = null;

    protected static function conectar() {
        if (self::$db === null) {
            self::$db = new PDO('sqlite::memory:');
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            self::configurarTabelas();
        }
        return self::$db;
    }

    private static function configurarTabelas() {
        self::$db->exec("CREATE TABLE IF NOT EXISTS user_account (id INTEGER PRIMARY KEY AUTOINCREMENT, email TEXT UNIQUE, senha TEXT)");
        self::$db->exec("CREATE TABLE IF NOT EXISTS relatos_clinicos (id INTEGER PRIMARY KEY AUTOINCREMENT, paciente_nome TEXT, sintomas TEXT)");
        
        self::$db->exec("INSERT OR IGNORE INTO user_account (id, email, senha) VALUES (1, 'heloisa@unb.br', 'senha123')");
        self::$db->exec("INSERT OR IGNORE INTO relatos_clinicos (id, paciente_nome, sintomas) VALUES (1, 'Paciente Exemplo TDAH', 'Crise de ansiedade pré-consulta, relata taquicardia.')");
    }
}
