<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\MotivoTransfusion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Motivotransfusion controller.
 *
 * @Route("motivotransfusion")
 */
class MotivoTransfusionController extends Controller
{
    /**
     * Lists all motivoTransfusion entities.
     *
     * @Route("/", name="motivotransfusion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $motivoTransfusions = $em->getRepository('KrytekDataBundle:MotivoTransfusion')->findAll();

        return $this->render('motivotransfusion/index.html.twig', array(
            'motivoTransfusions' => $motivoTransfusions,
        ));
    }

    /**
     * Creates a new motivoTransfusion entity.
     *
     * @Route("/new", name="motivotransfusion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $motivoTransfusion = new Motivotransfusion();
        $form = $this->createForm('Krytek\DataBundle\Form\MotivoTransfusionType', $motivoTransfusion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($motivoTransfusion);
            $em->flush($motivoTransfusion);

            return $this->redirectToRoute('motivotransfusion_show', array('id' => $motivoTransfusion->getId()));
        }

        return $this->render('motivotransfusion/new.html.twig', array(
            'motivoTransfusion' => $motivoTransfusion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a motivoTransfusion entity.
     *
     * @Route("/{id}", name="motivotransfusion_show")
     * @Method("GET")
     */
    public function showAction(MotivoTransfusion $motivoTransfusion)
    {
        $deleteForm = $this->createDeleteForm($motivoTransfusion);

        return $this->render('motivotransfusion/show.html.twig', array(
            'motivoTransfusion' => $motivoTransfusion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing motivoTransfusion entity.
     *
     * @Route("/{id}/edit", name="motivotransfusion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MotivoTransfusion $motivoTransfusion)
    {
        $deleteForm = $this->createDeleteForm($motivoTransfusion);
        $editForm = $this->createForm('Krytek\DataBundle\Form\MotivoTransfusionType', $motivoTransfusion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('motivotransfusion_edit', array('id' => $motivoTransfusion->getId()));
        }

        return $this->render('motivotransfusion/edit.html.twig', array(
            'motivoTransfusion' => $motivoTransfusion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a motivoTransfusion entity.
     *
     * @Route("/{id}", name="motivotransfusion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MotivoTransfusion $motivoTransfusion)
    {
        $form = $this->createDeleteForm($motivoTransfusion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($motivoTransfusion);
            $em->flush($motivoTransfusion);
        }

        return $this->redirectToRoute('motivotransfusion_index');
    }

    /**
     * Creates a form to delete a motivoTransfusion entity.
     *
     * @param MotivoTransfusion $motivoTransfusion The motivoTransfusion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MotivoTransfusion $motivoTransfusion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('motivotransfusion_delete', array('id' => $motivoTransfusion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
