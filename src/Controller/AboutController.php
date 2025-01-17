<?php
    namespace App\Controller;

    require "../src/Service/fetch_gh_api.php";
    
    use Twig\Environment;
    use App\Service;
    use App\Service\TemplateRendererService;

    class AboutController {
        private TemplateRendererService $service;
        private mixed $gh_result;

        public function __construct(Environment $environment)
        {
            $this->service = new TemplateRendererService($environment);
            $this->gh_result = Service\fetch_gh_api("csvitor-dev");
        }

        public function index() {
            echo $this->service->render_page('about', [
                'title' => 'About',
                'user' => $this->gh_result,
            ]);
        }
    }