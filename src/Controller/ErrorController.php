<?php
    namespace App\Controller;
    
    use Twig\Environment;
    use App\Service\TemplateRendererService;

    class ErrorController {
        private TemplateRendererService $service;

        public function __construct(Environment $environment)
        {
            $this->service = new TemplateRendererService($environment);
        }

        public function not_found() {
            echo $this->service->render_error('404', [
                'title' => 'Page Not Found'
            ]);
        }
    }