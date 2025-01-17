<?php
    date_default_timezone_set("America/Sao_Paulo");
    require "../vendor/autoload.php";
    require "../templates/router/routes.php";

    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;
    use App\Controller\ErrorController;
    use Templates\Router;

    $loader = new FilesystemLoader('../templates/');
    $twig = new Environment($loader, [
        'cache' => '../var/cache',
    ]);
    $error = new ErrorController($twig);

    $path = $_SERVER['REQUEST_URI'];
    $_ROUTES = Router\get_routes($twig);

    if (array_key_exists($path, $_ROUTES)) {
        $controller = $_ROUTES[$path];

        $controller->index();
        return;
    }
    $error->not_found();
    