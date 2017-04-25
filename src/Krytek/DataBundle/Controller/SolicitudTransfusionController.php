<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\SolicitudTransfusion;
use Krytek\DataBundle\Form\PacienteType;
use Krytek\DataBundle\Form\SolicitudTransfusionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;

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
     * Creates a new solicitudTransfusion entity.
     *
     * @Route("/new", name="solicitudtransfusion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $solicitudTransfusion = new Solicitudtransfusion();

        $form = $this->createForm(SolicitudTransfusionType::class, $solicitudTransfusion);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($solicitudTransfusion);
            $em->flush($solicitudTransfusion);

            return $this->redirectToRoute('solicitudtransfusion_show', array('id' => $solicitudTransfusion->getId()));
        }

        return $this->render('solicitudtransfusion/new.html.twig', array(
            'solicitudTransfusion' => $solicitudTransfusion,
            'form' => $form->createView(),
        ));
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
            foreach ($motivos as $motivo)
                $motivosc->append($motivo->getDescripcion());
            $response = new JsonResponse();
            $response->setData(array(
                'motivo' => $motivosc
            ));

        } else {
            $componente = $request->get('comp');
            $diag = $em->getRepository('KrytekDataBundle:Diagnosticos')->find($componente);

            $motivos = new \ArrayObject();
            foreach ($diag->getMotivoTransfusionid() as $motivo)
                $motivos->append($motivo->getDescripcion());

            $response = new JsonResponse();
            $response->setData(array(
                'motivo' => $motivos
            ));
        }

        return $response;

    }

    /**
     * Finds and displays a solicitudTransfusion entity.
     *
     * @Route("/{id}", name="solicitudtransfusion_show")
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
}
