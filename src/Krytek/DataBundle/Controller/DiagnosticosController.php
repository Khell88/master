<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\Diagnosticos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Diagnostico controller.
 *
 * @Route("diagnosticos")
 */
class DiagnosticosController extends Controller
{
    /**
     * Lists all diagnostico entities.
     *
     * @Route("/", name="diagnosticos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $diagnosticos = $em->getRepository('KrytekDataBundle:Diagnosticos')->findAll();

        return $this->render('diagnosticos/index.html.twig', array(
            'diagnosticos' => $diagnosticos,
        ));
    }

    /**
     * Creates a new diagnostico entity.
     *
     * @Route("/new", name="diagnosticos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $diagnostico = new Diagnosticos();
        $form = $this->createForm('Krytek\DataBundle\Form\DiagnosticosType', $diagnostico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($diagnostico);
            $em->flush($diagnostico);

            return $this->redirectToRoute('diagnosticos_show', array('id' => $diagnostico->getId()));
        }

        return $this->render('diagnosticos/new.html.twig', array(
            'diagnostico' => $diagnostico,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a diagnostico entity.
     *
     * @Route("/{id}", name="diagnosticos_show")
     * @Method("GET")
     */
    public function showAction(Diagnosticos $diagnostico)
    {
        $deleteForm = $this->createDeleteForm($diagnostico);

        return $this->render('diagnosticos/show.html.twig', array(
            'diagnostico' => $diagnostico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing diagnostico entity.
     *
     * @Route("/{id}/edit", name="diagnosticos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Diagnosticos $diagnostico)
    {
        $deleteForm = $this->createDeleteForm($diagnostico);
        $editForm = $this->createForm('Krytek\DataBundle\Form\DiagnosticosType', $diagnostico);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('diagnosticos_edit', array('id' => $diagnostico->getId()));
        }

        return $this->render('diagnosticos/edit.html.twig', array(
            'diagnostico' => $diagnostico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a diagnostico entity.
     *
     * @Route("/{id}", name="diagnosticos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Diagnosticos $diagnostico)
    {
        $form = $this->createDeleteForm($diagnostico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($diagnostico);
            $em->flush($diagnostico);
        }

        return $this->redirectToRoute('diagnosticos_index');
    }

    /**
     * Creates a form to delete a diagnostico entity.
     *
     * @param Diagnosticos $diagnostico The diagnostico entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Diagnosticos $diagnostico)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('diagnosticos_delete', array('id' => $diagnostico->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
