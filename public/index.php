<?php
    date_default_timezone_set("America/Sao_Paulo");
    require "../vendor/autoload.php";
    require "../src/Service/render_page.php";
    require "../templates/router/routes.php";
    
    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;
    use App\Service;
    use Templates\Router;

    $loader = new FilesystemLoader('../templates/');
    $twig = new Environment($loader, [
        'cache' => '../var/cache',
    ]);

    $path = $_SERVER['REQUEST_URI'];
    $_ROUTES = Router\get_routes();

    if (array_key_exists($path, $_ROUTES)) {
        $route = $_ROUTES[$path];

        Service\render_page($twig, $route['file_path'], $route['vars']);
        return;
    }
    Service\render_page($twig, 'front/errors/404.html.twig', [
        'title' => 'Page Not Found',
    ]);
    