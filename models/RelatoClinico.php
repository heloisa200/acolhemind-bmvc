<?php


class RelatoClinico extends Model {
    
    public static function listarTodos() {
        $db = self::conectar();
        return $db->query("SELECT * FROM relatos_clinicos ORDER BY id DESC")->fetchAll();
    }

    
    public static function salvar($nome, $sintomas) {
        $db = self::conectar();
        $stmt = $db->prepare("INSERT INTO relatos_clinicos (paciente_nome, sintomas) VALUES (:nome, :sintomas)");
        return $stmt->execute([':nome' => $nome, ':sintomas' => $sintomas]);
    }

   
    public static function excluir($id) {
        $db = self::conectar();
        $stmt = $db->prepare("DELETE FROM relatos_clinicos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }
}
