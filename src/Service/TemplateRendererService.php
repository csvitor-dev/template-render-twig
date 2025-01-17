<?php
    namespace App\Service;

    require '../src/Service/current_date.php';

    use Twig\Environment;   

    class TemplateRendererService {
        private static function validate_template(string $section, string $template): string 
        {
            $file_path = "/front/{$section}/{$template}.html.twig";

            if (file_exists("../templates/" . $file_path) === false) {
                die("Templates not exists");
            }
            return $file_path;
        }

        private static function default_values(): array
        {
            return [
                'title' => 'Finance Hub',
                'current_year' => current_date(),
            ];
        }

        public static function render_page(Environment $env, string $template, $vars = []): void 
        {
            $path = TemplateRendererService::validate_template('pages', $template);
            $default = TemplateRendererService::default_values();
            
            echo $env->render($path, array_merge($default, $vars));
        }

        public static function render_error(Environment $env, string $template, $vars = []): void
        {
            $path = TemplateRendererService::validate_template('errors', $template);
            $default = TemplateRendererService::default_values();
            
            echo $env->render($path, array_merge($default, $vars));
        }
    }