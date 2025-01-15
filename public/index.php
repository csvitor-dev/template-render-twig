<?php
    require "../vendor/autoload.php";
    include "../templates/router.php";
    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;
    date_default_timezone_set("America/Sao_Paulo");

    $loader = new FilesystemLoader('../templates/');
    $twig = new Environment($loader);

    $path = $_SERVER['REQUEST_URI'];

    if (array_key_exists($path, $ROUTES)) {
        $route = $ROUTES[$path];
        echo $twig->render($route['file_path'], $route['vars']);
        return;
    }
    echo $twig->render('front/errors/404.html.twig', [
        'title' => 'Page Not Found'
    ]);
    