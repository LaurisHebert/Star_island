<?php

namespace Controllers;

class Controller
{
    const VIEWPAGE = __DIR__ . '/../Views/';
    const EXT = '.tmpl.php';
    // Cette fonction devra être 'echo' pour affichier la page

    /**
     * @param string $layout Name of the folder containing the layout then name of the file separated by a dot
     * @param string $view  Name of the folder containing the template then name of the file separated by a dot
     * @param mixed $data  Data sent to the page to display
     * @return array|bool|string
     */
    public function render(string $layout, string $view, mixed $data = null): array|bool|string
    {
        // Séparation du String récupérer à chaque points et les stocks dans un tableau
        $layout_ar = explode('.', $layout);
        // Ouverture d'une mise en tampon du 'require' du layout
        ob_start();
        // Création du 'require'
        require_once(self::VIEWPAGE . ucfirst($layout_ar[0]) . '/' . $layout_ar[1] . self::EXT);
        // Récupération du 'require' stocker dans une variable
        $layout_content = ob_get_contents();
        // Fermeture de la mise en tampon
        ob_end_clean();
        // Remplacement de '{pageTitle}' et '{pageDescription}' par les valeurs de '$data', dans le layout
        $template = str_replace('{pageTitle}', $data->meta_title, $layout_content);
        $template = str_replace('{pageDescription}',$data->meta_descrition, $template);
        // Séparation du String récupérer à chaque points et les stocks dans un tableau
        $view_ar = explode('.', $view );
        // Ouverture d'une mise en tampon du 'require' du template
        ob_start();
        // Création du 'require'
        require_once(self::VIEWPAGE . ucfirst($view_ar[0]) . '/' . $view_ar[1] . self::EXT);
        // Récupération du 'require' et stockage dans une variable
        $view_content = ob_get_contents();
        // Fermeture de la mise en tampon
        ob_end_clean();
        // Remplacement de '{pageContent}' par le 'require' du template dans le layout
        $template = str_replace('{pageContent}', $view_content, $template);
        // Retourne le 'require' du layout précédemment modifié
        return $template;
    }
}
