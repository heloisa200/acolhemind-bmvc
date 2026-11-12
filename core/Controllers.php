<?php

abstract class Controller {
    protected function render($view, $data = []) {
        extract($data);
        $viewFile = "views/{$view}.php";
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            http_response_code(500);
            echo "Erro: A view '{$view}' não existe.";
        }
    }

    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
