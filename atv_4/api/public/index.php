<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    use Slim\Factory\AppFactory;

    require __DIR__ . '/../vendor/autoload.php';

    $app = AppFactory::create();

    $app->addBodyParsingMiddleware();

    $app->addRoutingMiddleware();

    // Inclui o arquivo de rotas para usuários

    require "../app/routes/user.php";
    require "../app/routes/message.php";

    $errorMiddleware = $app->addErrorMiddleware(true, true, true);

    // Executa Aplicação
    
    $app->run();
