<?php

namespace Krytek\DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/data")
     */
    public function indexAction()
    {
        return $this->render('KrytekDataBundle:Default:index.html.twig');
    }
}
