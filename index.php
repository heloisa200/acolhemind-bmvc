<?php
spl_autoload_register(function ($class) {
    $pastas = ['core', 'controllers', 'models'];
    foreach ($pastas as $pasta) {
        $arquivo = __DIR__ . "/{$pasta}/{$class}.php";
        if (file_exists($arquivo)) {
            include_once $arquivo;
            return;
        }
    }
});

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/portal' || $uri === '/portal/') {
    $portal = new PortalController();
    ($method === 'POST') ? $portal->autenticar() : $portal->index();
} elseif ($uri === '/portal/logout') {
    $portal = new PortalController();
    $portal->logout();
} elseif ($uri === '/banco' || $uri === '/banco/') {
    $banco = new BancoController();
    if ($method === 'POST') {
        $banco->criar();
    } elseif ($method === 'DELETE') {
        $banco->deletar();
    } else {
        http_response_code(405);
        echo json_encode(["erro" => "O recurso 'banco' só aceita POST ou DELETE via cURL."]);
    }
} else {
    http_response_code(404);
    echo "Página não encontrada no Framework BMVC.";
}
