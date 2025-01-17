<?php
    namespace Template;

    require "../src/Service/fetch_gh_api.php";
    
    use App\Service;

    function get_routes(): array {
        $csvitor_dev = Service\fetch_gh_api("csvitor-dev");

        return [
            '/' => [
                'file_path' => 'front/pages/home.html.twig',
                'vars' => [],
            ],
            '/main-news' =>  [
                'file_path' => 'front/pages/main-news.html.twig',
                'vars' => ['title' => 'Main News'],
            ],
            '/about' => [
                'file_path' => 'front/pages/about.html.twig',
                'vars' => ['title' => 'About', 'user' => $csvitor_dev],
            ],
        ];
    }
