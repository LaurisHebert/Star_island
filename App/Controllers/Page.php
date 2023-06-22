<?php

namespace Controllers;
class Page extends Controller
{
    public function display($data = null): array|string
    {
        if ($data->pageName === "BigEvent") :
            $display = $this->render('layouts.bigEvent', 'templates.'.strtolower($data->meta_title), $data);
        else :
            $display = $this->render('layouts.default', 'templates.'.strtolower($data->meta_title), $data);
        endif;

        return $display;
    }

}
