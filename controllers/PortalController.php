<?php


class PortalController extends Controller {
    public function index() {
        session_start();
        if (!isset($_SESSION['logado'])) {
            return $this->render('login');
        }
        $relatos = RelatoClinico::listarTodos();
        return $this->render('portal', ['relatos' => $relatos]);
    }

    public function autenticar() {
        session_start();
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (UserAccount::autenticar($email, $senha)) {
            $_SESSION['logado'] = true;
            header('Location: /portal');
            exit;
        }
        return $this->render('login', ['erro' => 'Usuário ou senha incorretos.']);
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /portal');
        exit;
    }
}
