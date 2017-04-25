<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\MotivoTransfusion;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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

        $motivoTransfusions = $em->getRepository('KrytekDataBundle:MotivoTransfusion')->myFinder();

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
        $form->add('CreateAndNew', SubmitType::class, array('label' => 'Create & New'));
        $form->add('Create', SubmitType::class, array('label' => 'Create & Finish'));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($motivoTransfusion);
            $em->flush($motivoTransfusion);
            if ($form->get('CreateAndNew')->isClicked())
                return $this->redirectToRoute('motivotransfusion_new');
            else
                return $this->redirectToRoute('motivotransfusion_index');
        }

        return $this->render('motivotransfusion/new.html.twig', array(
            'motivoTransfusion' => $motivoTransfusion,
            'form' => $form->createView(),
        ));
    }

    /** Fill select with the motivos according to the componente
     * @Route("/{componente}", name="select_motivo", condition="request.headers.get('X-Requested-With') == 'XMLHttpRequest'")
     *
     */
    public function fillAction(Request $request)
    {

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);


        $em = $this->getDoctrine()->getManager();
        $componente = $request->get('comp');
        if ($componente !== 'Concentrado de eritrocitos')
            $motivos = $em->getRepository('KrytekDataBundle:MotivoTransfusion')->findMotivosComponentes($componente);
        else
            $motivos = $em->getRepository('KrytekDataBundle:MotivoTransfusion')->findMotivosDiagnostico($componente);
        $response = new JsonResponse();
        $response->setData(array(
            'motivo' => $serializer->serialize($motivos, 'json')
        ));

        return $response;

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
            ->getForm();
    }


}
