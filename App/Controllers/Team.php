<?php

namespace Controllers;

class Team extends Controller
{
    public function display($data = null): array|string
    {
        return $this->render('layouts.default', 'templates.team', $data);
    }

}