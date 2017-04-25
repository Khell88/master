<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 4/23/2017
 * Time: 16:51
 */

namespace Krytek\DataBundle\Controller;


use Krytek\DataBundle\Entity\Diagnosticos;
use Krytek\DataBundle\Entity\DiagnosticosMotivo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Solicitudtransfusion controller.
 *
 * @Route("diagnosticosmotivo")
 */

class DiagnosticosMotivoController extends Controller
{
    /**
     * Lists all diagnosticosMotivo entities.
     *
     * @Route("/", name="diagnosticosmotivo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

       // $diagnosticosMotivo = $em->getRepository('KrytekDataBundle:Diagnosticos')->findBy(array));


    }

    /**
     * Creates a new diagnostico entity.
     *
     * @Route("/new", name="diagnosticosmotivo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $diagnosticomotiv =null;
        $form = $this->createForm('Krytek\DataBundle\Form\DiagnosticosMotivoType', $diagnosticomotiv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idmotiv = $request->get('diagnosticos_motivo');

            $motivo = $em->getRepository('KrytekDataBundle:MotivoTransfusion')->findOneBy(array('id'=>$idmotiv['Motivos']));
            $diag = $em->getRepository('KrytekDataBundle:Diagnosticos')->findOneBy(array('id'=>$idmotiv['Diagnosticos']));


            $diag->addMotivoTransfusionid($motivo);
           // $motivo->addDiagnosticosid($diag->getId());
            $em->persist($diag);
            $em->flush();

            return $this->redirectToRoute('diagnosticosmotivo_new');
        }

        return $this->render('diagmotiv/new.html.twig', array(
            'diagnosticosmotiv' => $diagnosticomotiv,
            'form' => $form->createView(),
        ));
    }
}