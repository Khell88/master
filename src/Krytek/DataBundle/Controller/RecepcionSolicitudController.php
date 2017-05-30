<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\RecepcionSolicitud;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Recepcionsolicitud controller.
 *
 * @Route("recepcionsolicitud")
 */
class RecepcionSolicitudController extends Controller
{
    /**
     * Lists all recepcionSolicitud entities.
     *
     * @Route("/", name="recepcionsolicitud_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recepcionSolicituds = $em->getRepository('KrytekDataBundle:RecepcionSolicitud')->findAll();

        return $this->render('recepcionsolicitud/index.html.twig', array(
            'recepcionSolicituds' => $recepcionSolicituds,
        ));
    }

    /**
     * Creates a new recepcionSolicitud entity.
     *
     * @Route("/new", name="recepcionsolicitud_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $recepcionSolicitud = new Recepcionsolicitud();

        $em = $this->getDoctrine()->getManager();
        $solicitud = $em->getRepository('KrytekDataBundle:SolicitudTransfusion')->findOneBy(array('id' => $request->get('id')));

        $form = $this->createForm('Krytek\DataBundle\Form\RecepcionSolicitudType', $recepcionSolicitud);
        $form->add('CreateAndNew', SubmitType::class, array('label' => 'Create'));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recepcionSolicitud);
            $em->flush($recepcionSolicitud);

            return $this->redirectToRoute('recepcionsolicitud_show', array('id' => $recepcionSolicitud->getId()));
        }

        return $this->render('recepcionsolicitud/new.html.twig', array(
            'recepcionSolicitud' => $recepcionSolicitud,
            'form' => $form->createView(),
            'solicitudTransfusion' => $solicitud
        ));
    }


    /** Fill select with the bolsas according to the componente
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
     * Finds and displays a recepcionSolicitud entity.
     *
     * @Route("/{id}/show", name="recepcionsolicitud_show")
     * @Method("GET")
     */
    public function showAction(RecepcionSolicitud $recepcionSolicitud)
    {
        $deleteForm = $this->createDeleteForm($recepcionSolicitud);

        return $this->render('recepcionsolicitud/show.html.twig', array(
            'recepcionSolicitud' => $recepcionSolicitud,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing recepcionSolicitud entity.
     *
     * @Route("/{id}/edit", name="recepcionsolicitud_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, RecepcionSolicitud $recepcionSolicitud)
    {
        $deleteForm = $this->createDeleteForm($recepcionSolicitud);
        $editForm = $this->createForm('Krytek\DataBundle\Form\RecepcionSolicitudType', $recepcionSolicitud);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recepcionsolicitud_edit', array('id' => $recepcionSolicitud->getId()));
        }

        return $this->render('recepcionsolicitud/edit.html.twig', array(
            'recepcionSolicitud' => $recepcionSolicitud,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a recepcionSolicitud entity.
     *
     * @Route("/{id}/delete", name="recepcionsolicitud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, RecepcionSolicitud $recepcionSolicitud)
    {
        $form = $this->createDeleteForm($recepcionSolicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($recepcionSolicitud);
            $em->flush($recepcionSolicitud);
        }

        return $this->redirectToRoute('recepcionsolicitud_index');
    }

    /**
     * Creates a form to delete a recepcionSolicitud entity.
     *
     * @param RecepcionSolicitud $recepcionSolicitud The recepcionSolicitud entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RecepcionSolicitud $recepcionSolicitud)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recepcionsolicitud_delete', array('id' => $recepcionSolicitud->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
