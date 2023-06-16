<?php

namespace Controllers;

class Controller
{
    const VIEWPAGE = __DIR__ . '/../Views/';
    const EXT = '.tmpl.php';
    protected string $pageTitle = 'StarIsland/';
    protected string $pageDescription = '';

    public function render(string $layout, string $view, $data = null): array|bool|string
    {
        // Récupère le layout
        $layout_ar = explode('.', $layout);

        ob_start();
        require_once(self::VIEWPAGE . ucfirst($layout_ar[0]) . '/' . $layout_ar[1] . self::EXT);
        $layout_content = ob_get_contents();
        ob_end_clean();

        $template = str_replace('{pageTitle}', $this->pageTitle, $layout_content);
        $template = str_replace('{pageDescription}', $this->pageDescription, $template);

        // Récupère le template de contenus
        $view_ar = explode('.', $view );

        ob_start();
        require_once('/Applications/XAMPP/xamppfiles/htdocs/projets/Star_island/App/Views/Templates/bigEvent.tmpl.php');
        $view_content = ob_get_contents();
        ob_end_clean();

        return str_replace('{pageContent}', $view_content, $template);
    }
    public function setPageTitle(string $pageTitle): void
    {
        $this->pageTitle .= $pageTitle;
    }
    /**
     * @param string $pageDescription
     */
    public function setPageDescription(string $pageDescription): void
    {
        $this->pageDescription = $pageDescription;
    }
    /**
     * @return string
     */
    public function getPageTitle(): string
    {
        return $this->pageTitle;
    }
    /**
     * @return string
     */
    private function getPageDescription() : string
    {
        return $this->pageDescription;

    }
}
