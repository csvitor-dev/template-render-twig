<?php
    namespace Templates\Router;

    require "../src/Service/fetch_gh_api.php";
    
    use App\Service;

    function get_routes(): array {
        $csvitor_dev = Service\fetch_gh_api("csvitor-dev");

        return [
            '/' => [
                'file_path' => 'home',
                'vars' => [],
            ],
            '/main-news' =>  [
                'file_path' => 'main-news',
                'vars' => ['title' => 'Main News'],
            ],
            '/about' => [
                'file_path' => 'about',
                'vars' => ['title' => 'About', 'user' => $csvitor_dev],
            ],
        ];
    }
