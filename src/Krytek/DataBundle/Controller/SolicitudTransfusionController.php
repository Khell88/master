<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\SolicitudTransfusion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

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

        $form = $this->createForm('Krytek\DataBundle\Form\SolicitudTransfusionType', array($solicitudTransfusion, 'usuario'=>$this->getUser()));

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
            ->getForm()
        ;
    }
}
