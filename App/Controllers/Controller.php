<?php

namespace Controllers;

class Controller
{
    const VIEWPAGE = __DIR__ . '/../Views/';
    const EXT = '.tmpl.php';
    public function render(string $layout, string $view, $data = null): array|bool|string
    {
        // Récupère les données

        // Récupère le layout
        $layout_ar = explode('.', $layout);

        ob_start();
        require_once(self::VIEWPAGE . ucfirst($layout_ar[0]) . '/' . $layout_ar[1] . self::EXT);
        $layout_content = ob_get_contents();
        ob_end_clean();

        $template = str_replace('{pageTitle}', $data->meta_title, $layout_content);
        $template = str_replace('{pageDescription}',$data->meta_descrition, $template);

        // Récupère le template de contenus
        $view_ar = explode('.', $view );

        ob_start();
        require_once(self::VIEWPAGE . ucfirst($view_ar[0]) . '/' . $view_ar[1] . self::EXT);
        $view_content = ob_get_contents();
        ob_end_clean();

        return str_replace('{pageContent}', $view_content, $template);
    }
}
