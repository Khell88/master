<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\SolicitudTransfusion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


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

        $solicitudTransfusions = $em->getRepository('KrytekDataBundle:SolicitudTransfusion')->findBy(array('estado' => 'Procesada'));

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

        $solicitudTransfusions = $em->getRepository('KrytekDataBundle:SolicitudTransfusion')->findBy(array('estado' => 'No procesada'));

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


            $idMotivo = $request->get('motivotransfusion')['Motivo'];
            $motivo = $em->getRepository('KrytekDataBundle:MotivoTransfusion')->find($idMotivo);

            $idDiagnotico = $request->get('solicitud')['Diagnosticos'];

            if ($idDiagnotico != '') {
                $diagnotico = $em->getRepository('KrytekDataBundle:Diagnosticos')->find($idDiagnotico);
                $solicitudTransfusion->setDiagnosticosid($diagnotico);
            }

            $solicitudTransfusion->setEstado('No procesada');

            $solicitudTransfusion->setEstado('No procesada');
            $solicitudTransfusion->setMotivoTransfusionid($motivo);
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
     * Creates a new solicitudTransfusion entity for a Patient.
     *
     * @Route("/new/{idP}/", name="solicitudpaciente_new")
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

            $idMotivo = $request->get('motivotransfusion')['Motivo'];
            $motivo = $em->getRepository('KrytekDataBundle:MotivoTransfusion')->find($idMotivo);

            $idDiagnotico = $request->get('solicitud')['Diagnosticos'];

            if ($idDiagnotico != '') {
                $diagnotico = $em->getRepository('KrytekDataBundle:Diagnosticos')->find($idDiagnotico);
                $solicitudTransfusion->setDiagnosticosid($diagnotico);
            }

            $solicitudTransfusion->setEstado('No procesada');
            $solicitudTransfusion->setUsuarioid($usuario);
            $solicitudTransfusion->setPacienteid($paciente);
            $solicitudTransfusion->setMotivoTransfusionid($motivo);

            $em->persist($solicitudTransfusion);
            $em->flush($solicitudTransfusion);

            return $this->redirectToRoute('solicitudtransfusion_show', array('id' => $solicitudTransfusion->getId()));
        }

        return $this->render('solicitudtransfusion/new_pac_sol.html.twig', array(
            'solicitudTransfusion' => $solicitudTransfusion,
            'form' => $form->createView(),
            'usuario' => $usuario,
            'paciente' => $paciente
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
     * @Route("/{id}/edit/", name="solicitudtransfusion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SolicitudTransfusion $solicitudTransfusion)
    {
        $deleteForm = $this->createDeleteForm($solicitudTransfusion);
        $editForm = $this->createForm('Krytek\DataBundle\Form\SolicitudEditType', $solicitudTransfusion);
        $editForm->handleRequest($request);

        $paciente = $this->getDoctrine()->getManager()->getRepository('KrytekDataBundle:Paciente')->find($solicitudTransfusion->getPacienteid());

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $em  = $this->getDoctrine()->getManager();
            $idMotivo = $request->get('motivotransfusion')['Motivo'];
            $motivo = $em->getRepository('KrytekDataBundle:MotivoTransfusion')->find($idMotivo);

            $idDiagnotico = $request->get('solicitud')['Diagnosticos'];

            if ($idDiagnotico != '') {
                $diagnotico = $em->getRepository('KrytekDataBundle:Diagnosticos')->find($idDiagnotico);
                $solicitudTransfusion->setDiagnosticosid($diagnotico);
            }else{
                $solicitudTransfusion->setDiagnosticosid(null);
            }
            $solicitudTransfusion->setMotivoTransfusionid($motivo);

            $em->persist($solicitudTransfusion);
            $em->flush($solicitudTransfusion);




            return $this->redirectToRoute('solicitudtransfusion_index');
        }

        return $this->render('solicitudtransfusion/edit.html.twig', array(
            'solicitudTransfusion' => $solicitudTransfusion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'paciente'=>$paciente,

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


    public function fillNewAction(Request $request)
    {
        return $this->findMotivo($request);
    }

    /** Fill select with the motivos according to the componente
     * @Route("/{id}/edit/{componente}", name="select_motivos_edit", condition="request.headers.get('X-Requested-With') == 'XMLHttpRequest'")
     *
     */
    public function fillEditAction(Request $request)
    {
        return $this->findMotivo($request);
    }


    /** Fill select with the motivos according to the componente
     * @Route("/new/{idP}/{componente}", name="select_motivos_new", condition="request.headers.get('X-Requested-With') == 'XMLHttpRequest'")
     *
     */
    public function solPacAction(Request $request)
    {
        return $this->findMotivo($request);
    }


    /** Finds a patient from a HC number
     * @Route("/{idhc}/", name="paciente_search", condition="request.headers.get('X-Requested-With') == 'XMLHttpRequest'")
     *
     */
    public function search(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $searchNum = $request->get('searchNum');
        if ($request->get('field') == 'hc') {
            $num = $em->getRepository('KrytekDataBundle:Paciente')->findBy(array('idHc' => $searchNum));
        } else {
            $num = $em->getRepository('KrytekDataBundle:Paciente')->findBy(array('ciPaciente' => $searchNum));
        }
        $response = new JsonResponse();

        if ($num) {
            $response->setData(array(
                'existe' => 'true',
                'field' => $request->get('field')
            ));
        } else {
            $response->setData(array(
                'existe' => 'false'
            ));
        }
        return $response;

    }


    /**
     * Finds a diagnostico and a motivo for that diagnostico
     */
    private function findMotivo(Request $request)
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
                'idmotivo' => $idmotivos,

            ));
        }

        return $response;

    }
}
