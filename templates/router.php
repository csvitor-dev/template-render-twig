<?php
    include "../src/Service/current_date.php";

    $date = current_date();

    $ROUTES = [
        '/' => [
            'file_path' => 'front/pages/home.html.twig',
            'vars' => ['title' => 'Home',
             'current_year' => $date],
        ],
        '/main-news' =>  [
            'file_path' => 'front/pages/main-news.html.twig',
            'vars' => ['title' => 'Main News', 'current_year' => $date],
        ],
        '/about' => [
            'file_path' => 'front/pages/about.html.twig',
            'vars' => ['title' => 'About', 'current_year' => $date],
        ],
    ];