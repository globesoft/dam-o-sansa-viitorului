<?php

namespace GlobeSoft\DamOSansaViitoruluiBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContentController extends Controller {

    public function homeAction() {
        return $this->render('@DamOSansa/Content/home.html.twig');
    }
}