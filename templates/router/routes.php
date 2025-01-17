<?php
    namespace Templates\Router;

    use App\Controller\AboutController;
    use App\Controller\HomeController;
    use App\Controller\NewsController;
    use Twig\Environment;

    function get_routes(Environment $environment) {
        return [
            '/' => new HomeController($environment),
            '/main-news' =>  new NewsController($environment),
            '/about' => new AboutController($environment),
        ];
    }
