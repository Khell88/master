<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 3/22/2017
 * Time: 19:36
 */

namespace Krytek\DataBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("inicio")
 */
class MainController extends Controller
{

    /**
     * @Route("/", name="main")
     */
    public function mainAction()
    {
        return $this->render('@KrytekData/Default/index.html.twig');
    }
}