<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\Bolsa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bolsa controller.
 *
 * @Route("bolsa")
 */
class BolsaController extends Controller
{
    /**
     * Lists all bolsa entities.
     *
     * @Route("/", name="bolsa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bolsas = $em->getRepository('KrytekDataBundle:Bolsa')->findAll();

        return $this->render('bolsa/index.html.twig', array(
            'bolsas' => $bolsas,
        ));
    }

    /**
     * Creates a new bolsa entity.
     *
     * @Route("/new", name="bolsa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bolsa = new Bolsa();
        $form = $this->createForm('Krytek\DataBundle\Form\BolsaType', $bolsa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bolsa);
            $em->flush($bolsa);

            return $this->redirectToRoute('bolsa_show', array('id' => $bolsa->getId()));
        }

        return $this->render('bolsa/new.html.twig', array(
            'bolsa' => $bolsa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bolsa entity.
     *
     * @Route("/{id}", name="bolsa_show")
     * @Method("GET")
     */
    public function showAction(Bolsa $bolsa)
    {
        $deleteForm = $this->createDeleteForm($bolsa);

        return $this->render('bolsa/show.html.twig', array(
            'bolsa' => $bolsa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bolsa entity.
     *
     * @Route("/{id}/edit", name="bolsa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bolsa $bolsa)
    {
        $deleteForm = $this->createDeleteForm($bolsa);
        $editForm = $this->createForm('Krytek\DataBundle\Form\BolsaType', $bolsa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bolsa_edit', array('id' => $bolsa->getId()));
        }

        return $this->render('bolsa/edit.html.twig', array(
            'bolsa' => $bolsa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bolsa entity.
     *
     * @Route("/{id}", name="bolsa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bolsa $bolsa)
    {
        $form = $this->createDeleteForm($bolsa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bolsa);
            $em->flush($bolsa);
        }

        return $this->redirectToRoute('bolsa_index');
    }

    /**
     * Creates a form to delete a bolsa entity.
     *
     * @param Bolsa $bolsa The bolsa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bolsa $bolsa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bolsa_delete', array('id' => $bolsa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
