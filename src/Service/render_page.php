<?php
    namespace App\Service;

    require "../src/Service/current_date.php";

    use Twig\Environment;

    function render_page(Environment $twig, string $template, array $vars = []) {
        $default = [
            'title' => 'Finance Hub',
            'current_year' => current_date(),
        ];

        echo $twig->render($template, array_merge($default, $vars));
    }