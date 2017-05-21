<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\SolicitudTransfusion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Solicitudtransfusion controller.
 *
 * @Route("solicitudtransfusion")
 */
class SolicitudTransfusionController extends Controller
{
    /**
     * Lists all solicitudTransfusion entities.
     *
     * @Route("/", name="solicitudtransfusion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $solicitudTransfusions = $em->getRepository('KrytekDataBundle:SolicitudTransfusion')->findAll();

        return $this->render('solicitudtransfusion/index.html.twig', array(
            'solicitudTransfusions' => $solicitudTransfusions
        ));
    }

    /**
     * Lists all solicitudTransfusion entities.
     *
     * @Route("/procesadas", name="solicitudtransfusion_procesadas")
     * @Method("GET")
     */
    public function indexProcesadasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $solicitudTransfusions = $em->getRepository('KrytekDataBundle:SolicitudTransfusion')->findBy(array('procesada'=>'Procesada'));

        return $this->render('solicitudtransfusion/index.html.twig', array(
            'solicitudTransfusions' => $solicitudTransfusions
        ));
    }

    /**
     * Lists all solicitudTransfusion entities.
     *
     * @Route("/noprocesadas", name="solicitudtransfusion_noprocesadas")
     * @Method("GET")
     */
    public function indexNoProcesadasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $solicitudTransfusions = $em->getRepository('KrytekDataBundle:SolicitudTransfusion')->findBy(array('procesada'=>'No procesada'));

        return $this->render('solicitudtransfusion/index.html.twig', array(
            'solicitudTransfusions' => $solicitudTransfusions
        ));
    }

    /**
     * Creates a new solicitudTransfusion entity.
     *
     * @Route("/new", name="solicitudtransfusion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $solicitudTransfusion = new Solicitudtransfusion();

        $form = $this->createForm('Krytek\DataBundle\Form\SolicitudTransfusionType', $solicitudTransfusion);
        $usuario = $this->getUser();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
//            \DateTime::createFromFormat();

            /*$solicitud = $request->get('solicitud');
            $fecha = new \DateTime();
            $fecha->modify($solicitud['fecha']);
            $solicitudTransfusion->setFecha($fecha);
            $fecha->modify($solicitud['fechaARealizar']);
            $solicitudTransfusion->setFechaARealizar($fecha);

            $hora = new \DateTime();
            $hora->setTime(($solicitud['hora']['hour']), ($solicitud['hora']['minute']));
            $solicitudTransfusion->setHora($hora);
            $hora->setTime(($solicitud['horaARealizar']['hour']), ($solicitud['horaARealizar']['minute']));
            $solicitudTransfusion->setHoraARealizar($hora);

            $solicitudTransfusion->setObjetivo('Mejorar Oxigenación');*/


            $solicitudTransfusion->setProcesada('No procesada');
            $solicitudTransfusion->setUsuarioid($usuario);
            $em->persist($solicitudTransfusion);
            $em->flush($solicitudTransfusion);

            return $this->redirectToRoute('solicitudtransfusion_show', array('id' => $solicitudTransfusion->getId()));
        }

        return $this->render('solicitudtransfusion/new.html.twig', array(
            'solicitudTransfusion' => $solicitudTransfusion,
            'form' => $form->createView(),
            'usuario' => $usuario
        ));
    }


    /**
     * Finds and displays a solicitudTransfusion entity.
     *
     * @Route("/show/{id}", name="solicitudtransfusion_show")
     * @Method("GET")
     */
    public function showAction(SolicitudTransfusion $solicitudTransfusion)
    {
        $deleteForm = $this->createDeleteForm($solicitudTransfusion);

        return $this->render('solicitudtransfusion/show.html.twig', array(
            'solicitudTransfusion' => $solicitudTransfusion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing solicitudTransfusion entity.
     *
     * @Route("/{id}/edit", name="solicitudtransfusion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SolicitudTransfusion $solicitudTransfusion)
    {
        $deleteForm = $this->createDeleteForm($solicitudTransfusion);
        $editForm = $this->createForm('Krytek\DataBundle\Form\SolicitudTransfusionType', $solicitudTransfusion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('solicitudtransfusion_edit', array('id' => $solicitudTransfusion->getId()));
        }

        return $this->render('solicitudtransfusion/edit.html.twig', array(
            'solicitudTransfusion' => $solicitudTransfusion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a solicitudTransfusion entity.
     *
     * @Route("/{id}", name="solicitudtransfusion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SolicitudTransfusion $solicitudTransfusion)
    {
        $form = $this->createDeleteForm($solicitudTransfusion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($solicitudTransfusion);
            $em->flush($solicitudTransfusion);
        }

        return $this->redirectToRoute('solicitudtransfusion_index');
    }

    /**
     * Creates a form to delete a solicitudTransfusion entity.
     *
     * @param SolicitudTransfusion $solicitudTransfusion The solicitudTransfusion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SolicitudTransfusion $solicitudTransfusion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('solicitudtransfusion_delete', array('id' => $solicitudTransfusion->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /** Fill select with the motivos according to the componente
     * @Route("/{componente}", name="select_motivos", condition="request.headers.get('X-Requested-With') == 'XMLHttpRequest'")
     *
     */
    public function fillAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        if (!$request->get('diag')) {
            $componente = $request->get('comp');
            $motivos = $em->getRepository('KrytekDataBundle:MotivoTransfusion')->findMotivosComponentes($componente);

            $motivosc = new \ArrayObject();
            $idmotivos = new \ArrayObject();
            foreach ($motivos as $motivo) {
                $motivosc->append($motivo->getDescripcion());
                $idmotivos->append($motivo->getId());
            }

            $response = new JsonResponse();
            $response->setData(array(
                'motivo' => $motivosc,
                'idmotivo' => $idmotivos
            ));

        } else {
            $componente = $request->get('comp');
            $diag = $em->getRepository('KrytekDataBundle:Diagnosticos')->find($componente);

            $motivos = new \ArrayObject();
            $idmotivos = new \ArrayObject();

            foreach ($diag->getMotivoTransfusionid() as $motivo) {
                $motivos->append($motivo->getDescripcion());
                $idmotivos->append($motivo->getId());
            }
            $response = new JsonResponse();
            $response->setData(array(
                'motivo' => $motivos,
                'idmotivo' => $idmotivos
            ));
        }

        return $response;
    }


    public function solPacAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        if (!$request->get('diag')) {
            $componente = $request->get('comp');
            $motivos = $em->getRepository('KrytekDataBundle:MotivoTransfusion')->findMotivosComponentes($componente);

            $motivosc = new \ArrayObject();
            $idmotivos = new \ArrayObject();
            foreach ($motivos as $motivo) {
                $motivosc->append($motivo->getDescripcion());
                $idmotivos->append($motivo->getId());
            }

            $response = new JsonResponse();
            $response->setData(array(
                'motivo' => $motivosc,
                'idmotivo' => $idmotivos
            ));

        } else {
            $componente = $request->get('comp');
            $diag = $em->getRepository('KrytekDataBundle:Diagnosticos')->find($componente);

            $motivos = new \ArrayObject();
            $idmotivos = new \ArrayObject();

            foreach ($diag->getMotivoTransfusionid() as $motivo) {
                $motivos->append($motivo->getDescripcion());
                $idmotivos->append($motivo->getId());
            }
            $response = new JsonResponse();
            $response->setData(array(
                'motivo' => $motivos,
                'idmotivo' => $idmotivos
            ));
        }

        return $response;
    }

    /**
     * Creates a new solicitudTransfusion entity for a Patient.
     *
     * @Route("/new/{idP}", name="solicitudpaciente_new")
     * @Method({"GET", "POST"})
     */
    public function newTransAction(Request $request)
    {
        $solicitudTransfusion = new Solicitudtransfusion();
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm('Krytek\DataBundle\Form\SolicitudPacienteType', $solicitudTransfusion);
        $usuario = $this->getUser();
        $paciente = $em->getRepository('KrytekDataBundle:Paciente')->find($request->get('idP'));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $solicitudTransfusion->setProcesada('No procesada');
            $solicitudTransfusion->setUsuarioid($usuario);
            $solicitudTransfusion->setPacienteid($paciente);
            $em->persist($solicitudTransfusion);
            $em->flush($solicitudTransfusion);

            return $this->redirectToRoute('solicitudtransfusion_show', array('id' => $solicitudTransfusion->getId()));
        }

        return $this->render('solicitudtransfusion/new_pac_sol.html.twig', array(
            'solicitudTransfusion' => $solicitudTransfusion,
            'form' => $form->createView(),
            'usuario' => $usuario,
            'paciente'=>$paciente
        ));
    }


    /** Finds a patient from a HC number
     * @Route("/{idhc}/", name="paciente_hc", condition="request.headers.get('X-Requested-With') == 'XMLHttpRequest'")
     *
     */
    public function searchHC(Request $request){

        $em = $this->getDoctrine()->getManager();
        $hc_num = $request->get('hc');
        $hc = $em->getRepository('KrytekDataBundle:Paciente')->findBy(array('idHc'=>$hc_num));
        $response = new JsonResponse();

        if($hc){
            $response->setData(array(
                'existe'=>'true'
            ));
        }
        else{
            $response->setData(array(
                'existe'=>'false'
            ));
        }
        return $response;

    }
}
