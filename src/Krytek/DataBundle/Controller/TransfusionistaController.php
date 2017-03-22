<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\Transfusionista;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Transfusionistum controller.
 *
 * @Route("transfusionista")
 */
class TransfusionistaController extends Controller
{
    /**
     * Lists all transfusionistum entities.
     *
     * @Route("/", name="transfusionista_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transfusionistas = $em->getRepository('KrytekDataBundle:Transfusionista')->findAll();

        return $this->render('transfusionista/index.html.twig', array(
            'transfusionistas' => $transfusionistas,
        ));
    }

    /**
     * Creates a new transfusionistum entity.
     *
     * @Route("/new", name="transfusionista_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $transfusionistum = new Transfusionistum();
        $form = $this->createForm('Krytek\DataBundle\Form\TransfusionistaType', $transfusionistum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transfusionistum);
            $em->flush($transfusionistum);

            return $this->redirectToRoute('transfusionista_show', array('id' => $transfusionistum->getId()));
        }

        return $this->render('transfusionista/new.html.twig', array(
            'transfusionistum' => $transfusionistum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a transfusionistum entity.
     *
     * @Route("/{id}", name="transfusionista_show")
     * @Method("GET")
     */
    public function showAction(Transfusionista $transfusionistum)
    {
        $deleteForm = $this->createDeleteForm($transfusionistum);

        return $this->render('transfusionista/show.html.twig', array(
            'transfusionistum' => $transfusionistum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing transfusionistum entity.
     *
     * @Route("/{id}/edit", name="transfusionista_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Transfusionista $transfusionistum)
    {
        $deleteForm = $this->createDeleteForm($transfusionistum);
        $editForm = $this->createForm('Krytek\DataBundle\Form\TransfusionistaType', $transfusionistum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transfusionista_edit', array('id' => $transfusionistum->getId()));
        }

        return $this->render('transfusionista/edit.html.twig', array(
            'transfusionistum' => $transfusionistum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a transfusionistum entity.
     *
     * @Route("/{id}", name="transfusionista_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Transfusionista $transfusionistum)
    {
        $form = $this->createDeleteForm($transfusionistum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($transfusionistum);
            $em->flush($transfusionistum);
        }

        return $this->redirectToRoute('transfusionista_index');
    }

    /**
     * Creates a form to delete a transfusionistum entity.
     *
     * @param Transfusionista $transfusionistum The transfusionistum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Transfusionista $transfusionistum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transfusionista_delete', array('id' => $transfusionistum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
