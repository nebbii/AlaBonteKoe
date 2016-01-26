<?php

namespace Bontekoe\CinemaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Bontekoe\CinemaBundle\Entity\Cinema;
use Bontekoe\CinemaBundle\Form\CinemaType;

/**
 * Cinema controller.
 *
 * @Route("/cinema")
 */
class CinemaController extends Controller
{

    /**
     * Lists all Cinema entities.
     *
     * @Route("/", name="cinema")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BontekoeCinemaBundle:Cinema')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Cinema entity.
     *
     * @Route("/", name="cinema_create")
     * @Method("POST")
     * @Template("BontekoeCinemaBundle:Cinema:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Cinema();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cinema_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Cinema entity.
     *
     * @param Cinema $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cinema $entity)
    {
        $form = $this->createForm(new CinemaType(), $entity, array(
            'action' => $this->generateUrl('cinema_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Cinema entity.
     *
     * @Route("/new", name="cinema_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cinema();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Cinema entity.
     *
     * @Route("/{id}", name="cinema_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BontekoeCinemaBundle:Cinema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cinema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Cinema entity.
     *
     * @Route("/{id}/edit", name="cinema_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BontekoeCinemaBundle:Cinema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cinema entity.');
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
    * Creates a form to edit a Cinema entity.
    *
    * @param Cinema $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cinema $entity)
    {
        $form = $this->createForm(new CinemaType(), $entity, array(
            'action' => $this->generateUrl('cinema_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cinema entity.
     *
     * @Route("/{id}", name="cinema_update")
     * @Method("PUT")
     * @Template("BontekoeCinemaBundle:Cinema:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BontekoeCinemaBundle:Cinema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cinema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cinema_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Cinema entity.
     *
     * @Route("/{id}", name="cinema_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BontekoeCinemaBundle:Cinema')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cinema entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cinema'));
    }

    /**
     * Creates a form to delete a Cinema entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cinema_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
