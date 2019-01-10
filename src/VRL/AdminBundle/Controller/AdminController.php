<?php

namespace VRL\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function dashAction()
    {
        return $this->render('AdminBundle:dash:index.html.twig');
    }
}
