<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\PruebasLaboratorio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pruebaslaboratorio controller.
 *
 * @Route("pruebaslaboratorio")
 */
class PruebasLaboratorioController extends Controller
{
    /**
     * Lists all pruebasLaboratorio entities.
     *
     * @Route("/", name="pruebaslaboratorio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pruebasLaboratorios = $em->getRepository('KrytekDataBundle:PruebasLaboratorio')->findAll();

        return $this->render('pruebaslaboratorio/index.html.twig', array(
            'pruebasLaboratorios' => $pruebasLaboratorios,
        ));
    }

    /**
     * Creates a new pruebasLaboratorio entity.
     *
     * @Route("/new", name="pruebaslaboratorio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pruebasLaboratorio = new Pruebaslaboratorio();
        $form = $this->createForm('Krytek\DataBundle\Form\PruebasLaboratorioType', $pruebasLaboratorio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pruebasLaboratorio);
            $em->flush($pruebasLaboratorio);

            return $this->redirectToRoute('pruebaslaboratorio_show', array('id' => $pruebasLaboratorio->getId()));
        }

        return $this->render('pruebaslaboratorio/new.html.twig', array(
            'pruebasLaboratorio' => $pruebasLaboratorio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pruebasLaboratorio entity.
     *
     * @Route("/{id}", name="pruebaslaboratorio_show")
     * @Method("GET")
     */
    public function showAction(PruebasLaboratorio $pruebasLaboratorio)
    {
        $deleteForm = $this->createDeleteForm($pruebasLaboratorio);

        return $this->render('pruebaslaboratorio/show.html.twig', array(
            'pruebasLaboratorio' => $pruebasLaboratorio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pruebasLaboratorio entity.
     *
     * @Route("/{id}/edit", name="pruebaslaboratorio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PruebasLaboratorio $pruebasLaboratorio)
    {
        $deleteForm = $this->createDeleteForm($pruebasLaboratorio);
        $editForm = $this->createForm('Krytek\DataBundle\Form\PruebasLaboratorioType', $pruebasLaboratorio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pruebaslaboratorio_edit', array('id' => $pruebasLaboratorio->getId()));
        }

        return $this->render('pruebaslaboratorio/edit.html.twig', array(
            'pruebasLaboratorio' => $pruebasLaboratorio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pruebasLaboratorio entity.
     *
     * @Route("/{id}", name="pruebaslaboratorio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PruebasLaboratorio $pruebasLaboratorio)
    {
        $form = $this->createDeleteForm($pruebasLaboratorio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pruebasLaboratorio);
            $em->flush($pruebasLaboratorio);
        }

        return $this->redirectToRoute('pruebaslaboratorio_index');
    }

    /**
     * Creates a form to delete a pruebasLaboratorio entity.
     *
     * @param PruebasLaboratorio $pruebasLaboratorio The pruebasLaboratorio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PruebasLaboratorio $pruebasLaboratorio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pruebaslaboratorio_delete', array('id' => $pruebasLaboratorio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
