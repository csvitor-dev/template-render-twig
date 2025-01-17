<?php
    namespace App\Controller;
    
    use Twig\Environment;
    use App\Service\TemplateRendererService;

    class NewsController {
        private TemplateRendererService $service;

        public function __construct(Environment $environment)
        {
            $this->service = new TemplateRendererService($environment);
        }

        public function index() {
            echo $this->service->render_page('main-news', [
                'title' => 'Main News'
            ]);
        }
    }