<?php
    namespace App\Service;

    require '../src/Service/current_date.php';

    use Twig\Environment;   

    class TemplateRendererService {
        private Environment $twig;
        private array $default_values;

        public function __construct(Environment $environment)
        {
            $this->twig = $environment;
            $this->default_values = [
                'title' => 'Finance Hub',
                'current_year' => current_date(),
            ];
        }

        private static function validate_template(string $section, string $template): string 
        {
            $file_path = "/front/{$section}/{$template}.html.twig";

            if (file_exists("../templates/" . $file_path) === false) {
                die("Templates not exists");
            }
            return $file_path;
        }

        public function render_page(string $template, $vars = []): void 
        {
            $path = TemplateRendererService::validate_template('pages', $template);
            
            echo $this->twig->render($path, array_merge($this->default_values, $vars));
        }

        public function render_error(string $template, $vars = []): void
        {
            $path = TemplateRendererService::validate_template('errors', $template);
            
            echo $this->twig->render($path, array_merge($this->default_values, $vars));
        }
    }