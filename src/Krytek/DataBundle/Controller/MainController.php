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
     * @Route("/", name="inicio")
     */
    public function mainAction()
    {
        $em = $this->getDoctrine()->getManager();
        $estado = 'No procesada';
        $max_result = 8;

        $solicitudes = $em->getRepository('KrytekDataBundle:SolicitudTransfusion')->findFiveUnprocessed($estado,$max_result);


        return $this->render('@KrytekData/Default/index.html.twig',array('solicitudes'=>$solicitudes));
    }
}