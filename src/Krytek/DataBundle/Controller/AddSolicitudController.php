<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 5/16/2017
 * Time: 13:43
 */

namespace Krytek\DataBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AddSolicitudController extends Controller
{
    /**
     * @Route("/agregar/solicitud", name="add_solicitud")
     */
    public function addSolicituAction(Request $request)
    {
        // replace this example code with whatever you need
        /* return $this->render('default/index.html.twig', [
             'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
         ]);*/

        return $this->render('searches/add_solicitud.html.twig');

    }

    /**
     * Shows the data for existing patient
     * @Route("/agregar/{ci}", name="show_patient1", condition="request.headers.get('X-Requested-With') == 'XMLHttpRequest'")
     *
     */
    function showPatient(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $ci = $request->get('ciP');

        $patient = $em->getRepository('KrytekDataBundle:Paciente')->findOneBy(array('ciPaciente' => $ci));

        $response = new JsonResponse();

        if ($patient != null) {
            $enconder = array(new JsonEncoder());
            $normalizer = array(new ObjectNormalizer());

            $serializer = new Serializer($normalizer, $enconder);

            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'patient' => $serializer->serialize($patient, 'json'),

            ));
            return $response;
        } else {

            $response->setData(array(
                'response' => 'failure'
            ));
        }
        return $response;
    }


    /** Redirecting to the form
     * @Route("/agregar/solicitud/{ci}", name="solictudtransfusion_paciente")
     *
     */
    public function solicitudPacienteAction(Request $request)
    {

        return $this->redirectToRoute('solicitudpaciente_new', array('idP'=>$request->get('ci')));
    }

    /** Redirecting to the form
     * @Route("/agregar/solicitud/", name="solictudtransfusion")
     *
     */
    public function solicitudAction(Request $request)
    {

        return $this->redirectToRoute('solicitudtransfusion_new');
    }

}