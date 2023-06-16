<?php

namespace Controllers;
class Page extends Controller
{
    public function display($data = null): array|string
    {
        if (!empty($data) && is_object($data)) :
            $this->setPageTitle($data->getTitle());
            $this->setPageDescription($data->getDescription());
        elseif (!empty($data) && is_array($data)) :
            $this->setPageTitle($data['title']);
            $this->setPageDescription($data['description']);
        endif;

        if (is_object($data) && $data->getMetaTitle() === "BigEvent") :
            $display = $this->render('layouts.bigEvent', 'templates.bigEvent', $data);
        else :
            $display = $this->render('layouts.default', 'templates.accueil', $data);
        endif;

        return $display;
    }

}
