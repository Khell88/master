<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\Servicios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Servicio controller.
 *
 * @Route("servicios")
 */
class ServiciosController extends Controller
{
    /**
     * Lists all servicio entities.
     *
     * @Route("/", name="servicios_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $servicios = $em->getRepository('KrytekDataBundle:Servicios')->findAll();

        return $this->render('servicios/index.html.twig', array(
            'servicios' => $servicios,
        ));
    }

    /**
     * Creates a new servicio entity.
     *
     * @Route("/new", name="servicios_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $servicio = new Servicios();
        $form = $this->createForm('Krytek\DataBundle\Form\ServiciosType', $servicio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servicio);
            $em->flush($servicio);

            return $this->redirectToRoute('servicios_show', array('id' => $servicio->getId()));
        }

        return $this->render('servicios/new.html.twig', array(
            'servicio' => $servicio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a servicio entity.
     *
     * @Route("/{id}", name="servicios_show")
     * @Method("GET")
     */
    public function showAction(Servicios $servicio)
    {
        $deleteForm = $this->createDeleteForm($servicio);

        return $this->render('servicios/show.html.twig', array(
            'servicio' => $servicio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing servicio entity.
     *
     * @Route("/{id}/edit", name="servicios_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Servicios $servicio)
    {
        $deleteForm = $this->createDeleteForm($servicio);
        $editForm = $this->createForm('Krytek\DataBundle\Form\ServiciosType', $servicio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('servicios_edit', array('id' => $servicio->getId()));
        }

        return $this->render('servicios/edit.html.twig', array(
            'servicio' => $servicio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a servicio entity.
     *
     * @Route("/{id}", name="servicios_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Servicios $servicio)
    {
        $form = $this->createDeleteForm($servicio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($servicio);
            $em->flush($servicio);
        }

        return $this->redirectToRoute('servicios_index');
    }

    /**
     * Creates a form to delete a servicio entity.
     *
     * @param Servicios $servicio The servicio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Servicios $servicio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('servicios_delete', array('id' => $servicio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
