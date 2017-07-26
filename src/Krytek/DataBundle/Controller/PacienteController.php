<?php

namespace Krytek\DataBundle\Controller;

use Krytek\DataBundle\Entity\Paciente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Paciente controller.
 *
 * @Route("paciente")
 */
class PacienteController extends Controller
{
    /**
     * Lists all paciente entities.
     *
     * @Route("/", name="paciente_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pacientes = $em->getRepository('KrytekDataBundle:Paciente')->findAll();

        return $this->render('paciente/index.html.twig', array(
            'pacientes' => $pacientes,
        ));
    }

    /**
     * Creates a new paciente entity.
     *
     * @Route("/new", name="paciente_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $paciente = new Paciente();
        $form = $this->createForm('Krytek\DataBundle\Form\PacienteType', $paciente);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $paciente_old = $em->getRepository('KrytekDataBundle:Paciente')->findBy(array('ciPaciente' => $paciente->getCiPaciente()));
            if ($paciente_old == null) {
                $em->persist($paciente);
                $em->flush($paciente);
                return $this->redirectToRoute('paciente_show', array('id' => $paciente->getId()));
            } else {
                $data_error = 'Ya existe un paciente con ese numero de identidad';
                $form = $this->createForm('Krytek\DataBundle\Form\PacienteType', array($paciente, 'existe' => $data_error));
                $form->handleRequest($request);
            }

        }

        return $this->render('paciente/new.html.twig', array(
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a paciente entity.
     *
     * @Route("/show/{id}", name="paciente_show")
     * @Method("GET")
     */
    public function showAction(Paciente $paciente)
    {
        $deleteForm = $this->createDeleteForm($paciente);

        return $this->render('paciente/show.html.twig', array(
            'paciente' => $paciente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing paciente entity.
     *
     * @Route("/{id}/edit", name="paciente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Paciente $paciente)
    {
        $deleteForm = $this->createDeleteForm($paciente);
        $editForm = $this->createForm('Krytek\DataBundle\Form\PacienteType', $paciente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('paciente_edit', array('id' => $paciente->getId()));
        }

        return $this->render('paciente/edit.html.twig', array(
            'paciente' => $paciente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a paciente entity.
     *
     * @Route("/{id}", name="paciente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Paciente $paciente)
    {
        $form = $this->createDeleteForm($paciente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paciente);
            $em->flush($paciente);
        }

        return $this->redirectToRoute('paciente_index');
    }

    /**
     * Creates a form to delete a paciente entity.
     *
     * @param Paciente $paciente The paciente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Paciente $paciente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('paciente_delete', array('id' => $paciente->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }


    /**
     * Shows the data for existing patient
     * @Route("/show/{ci}", name="show_patient", condition="request.headers.get('X-Requested-With') == 'XMLHttpRequest'")
     *
     */
    function showPatient(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $ci = $request->get('ciP');

        $patient = $em->getRepository('KrytekDataBundle:Paciente')->findOneBy(array('ciPaciente' => $ci));

        $response = new JsonResponse();

        if ($patient != null) {
            $enconder = array(new JsonEncoder());
            $normalizer = array(new ObjectNormalizer());

            $serializer = new Serializer($normalizer, $enconder);

            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'patient' => $serializer->serialize($patient, 'json'),

            ));
            return $response;
        } else {

            $response->setData(array(
                'response' => 'failure'
            ));
        }
        return $response;
    }

    /** Fill select with the motivos according to the componente
     * @Route("/solicitud/", name="solictudtransfusion_pac")
     *
     */
    public function solicitudPaciente(Request $request)
    {

        return $this->redirectToRoute('solicitudtransfusion_new');
    }

    /** Finds a patient from a HC number
     * @Route("/{idhc}/", name="paciente_c", condition="request.headers.get('X-Requested-With') == 'XMLHttpRequest'")
     *
     */
    public function searchHC(Request $request){

        $em = $this->getDoctrine()->getManager();
        $hc_num = $request->get('hc');
        $hc = $em->getRepository('KrytekDataBundle:Paciente')->findBy(array('idHc'=>$hc_num));
        $response = new JsonResponse();

        if($hc){
            $response->setData(array(
                'existe'=>'true'
            ));
        }
        else{
            $response->setData(array(
                'existe'=>'false'
            ));
        }
        return $response;

    }
}
