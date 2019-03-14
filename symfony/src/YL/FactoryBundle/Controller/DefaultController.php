<?php

namespace YL\FactoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YLFactoryBundle:Default:index.html.twig');
    }
}
