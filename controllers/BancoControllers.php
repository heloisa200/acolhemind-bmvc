<?php

class BancoController extends Controller {
    public function criar() {
        $data = json_decode(file_get_contents('php://input'), true);
        $nome = $data['paciente_nome'] ?? null;
        $sintomas = $data['sintomas'] ?? null;

        if (!$nome || !$sintomas) {
            return $this->json(["erro" => "Atributos 'paciente_nome' e 'sintomas' obrigatórios."], 400);
        }

        if (RelatoClinico::salvar($nome, $sintomas)) {
            return $this->json(["mensagem" => "Criado com sucesso!"], 201);
        }
        return $this->json(["erro" => "Falha ao salvar."], 500);
    }

    // DELETE via terminal Linux
    public function deletar() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            return $this->json(["erro" => "ID é obrigatório na URL."], 400);
        }

        if (RelatoClinico::excluir($id)) {
            return $this->json(["mensagem" => "Registro deletado."], 200);
        }
        return $this->json(["erro" => "Registro não encontrado."], 404);
    }
}
