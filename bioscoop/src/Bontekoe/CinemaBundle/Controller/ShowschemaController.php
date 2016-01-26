<?php

namespace Bontekoe\CinemaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Bontekoe\CinemaBundle\Entity\Showschema;
use Bontekoe\CinemaBundle\Form\ShowschemaType;

/**
 * Showschema controller.
 *
 * @Route("/showschema")
 */
class ShowschemaController extends Controller
{

    /**
     * Lists all Showschema entities.
     *
     * @Route("/", name="showschema")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BontekoeCinemaBundle:Showschema')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Showschema entity.
     *
     * @Route("/", name="showschema_create")
     * @Method("POST")
     * @Template("BontekoeCinemaBundle:Showschema:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Showschema();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('showschema_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Showschema entity.
     *
     * @param Showschema $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Showschema $entity)
    {
        $form = $this->createForm(new ShowschemaType(), $entity, array(
            'action' => $this->generateUrl('showschema_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Showschema entity.
     *
     * @Route("/new", name="showschema_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Showschema();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Showschema entity.
     *
     * @Route("/{id}", name="showschema_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BontekoeCinemaBundle:Showschema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Showschema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Showschema entity.
     *
     * @Route("/{id}/edit", name="showschema_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BontekoeCinemaBundle:Showschema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Showschema entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Showschema entity.
    *
    * @param Showschema $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Showschema $entity)
    {
        $form = $this->createForm(new ShowschemaType(), $entity, array(
            'action' => $this->generateUrl('showschema_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Showschema entity.
     *
     * @Route("/{id}", name="showschema_update")
     * @Method("PUT")
     * @Template("BontekoeCinemaBundle:Showschema:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BontekoeCinemaBundle:Showschema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Showschema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('showschema_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Showschema entity.
     *
     * @Route("/{id}", name="showschema_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BontekoeCinemaBundle:Showschema')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Showschema entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('showschema'));
    }

    /**
     * Creates a form to delete a Showschema entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('showschema_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
