<?php

namespace Controllers;
class Page extends Controller
{
    public function display($data = null): array|string
    {
        // Vérification du "meta_title" de $data
        if ($data->meta_title === "BigEvent") :
            // Appel de la fonction render de notre classe, obtenus par l'extension de Controller
            $display = $this->render('layouts.bigEvent', 'templates.'.strtolower($data->meta_title), $data);
        else :
            // Appel de la fonction render de notre classe, obtenus par l'extension de Controller
            $display = $this->render('layouts.default', 'templates.'.strtolower($data->meta_title), $data);
        endif;

        return $display;
    }

}
