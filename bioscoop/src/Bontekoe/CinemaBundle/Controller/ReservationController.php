<?php
namespace Bontekoe\CinemaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Bontekoe\CinemaBundle\Entity\Reservation;
use Bontekoe\CinemaBundle\Form\ReservationType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Reservation controller.
 *
 * @Route("/reservation")
 */
class ReservationController extends Controller
{

    /**
     * Lists all Reservation entities.
     *
     * @Route("/", name="reservation")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BontekoeCinemaBundle:Reservation')->findAll();

        return array(
            'entities' => $entities
        );
    }

    /**
     * Creates a new Reservation entity.
     *
     * @Route("/", name="reservation_create")
     * @Method("POST")
     * @Security("has_role('ROLE_CONTENTEDITOR')")
     * @Template("BontekoeCinemaBundle:Reservation:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Reservation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reservation_showschema', array(
                'id' => $entity->getId()
            )));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView()
        );
    }

    /**
     * Creates a form to create a Reservation entity.
     *
     * @param Reservation $entity
     *            The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Reservation $entity)
    {
        $form = $this->createForm(new ReservationType(), $entity, array(
            'action' => $this->generateUrl('reservation_create'),
            'method' => 'POST'
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Create'
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Reservation entity.
     *
     * @Route("/new", name="reservation_new")
     * @Method("GET")
     * @Security("has_role('ROLE_USER')")
     * @Template()
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();

        $showschemaEntity = $em->getRepository('BontekoeCinemaBundle:Showschema')->find($this->getRequest()
            ->get("showschema_id"));

        $entity = new Reservation();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'showschemaEntity' => $showschemaEntity,
            'form' => $form->createView()
        );
    }

    /**
     * Displays a form to create a new Reservation entity.
     *
     * @Route("/get-ordered-seats", name="reservation_get_ordered_seats")
     * @Method("GET")
     * @Security("has_role('ROLE_USER')")
     */
    public function getOrderedSeatsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $showschemaEntity = $em->getRepository('BontekoeCinemaBundle:Showschema')->find($this->getRequest()
            ->get("showschema_id"));

        $reservations = $em->getRepository('BontekoeCinemaBundle:Reservation')->findByShowschema($showschemaEntity);

        $seats = array();

        foreach ($reservations as $reservation) {
            array_push($seats, array(
                "row" => $reservation->getRow(),
                "rowSeat" => $reservation->getRowSeat(),
                "mySeat" => ($reservation->getUser() == $this->getUser() && $reservation->getPaid() == false)
            ));
        }

        return new JsonResponse($seats);
    }

    /**
     * Displays a form to create a new Reservation entity.
     *
     * @Route("/seat", name="reservation_order-seat")
     * @Method("PUT")
     * @Security("has_role('ROLE_USER')")
     */
    public function orderSeatAction()
    {
        $em = $this->getDoctrine()->getManager();

        $showschemaEntity = $em->getRepository('BontekoeCinemaBundle:Showschema')->find($this->getRequest()
            ->get("showschema_id"));

        $row = $this->getRequest()->get("row");
        $rowSeat = $this->getRequest()->get("rowSeat");

        $reservation = $em->getRepository('BontekoeCinemaBundle:Reservation')->findBy(array(
            "row" => $row,
            "rowSeat" => $rowSeat,
            "showschema" => $showschemaEntity
        ));

        if ($reservation) {
            Throw new \Exception("Seat has been taken");
        }

        $reservation = new Reservation();
        $reservation->setShowschema($showschemaEntity);
        $reservation->setRow($row);
        $reservation->setRowSeat($rowSeat);
        $reservation->setUser($this->getUser());
        $reservation->setPaid(false);

        $em->persist($reservation);
        $em->flush();

        return new Response();
    }

    /**
     * Displays a form to create a new Reservation entity.
     *
     * @Route("/seat", name="reservation_release-seat")
     * @Method("DELETE")
     * @Security("has_role('ROLE_USER')")
     */
    public function releaseSeatAction()
    {
        $em = $this->getDoctrine()->getManager();

        $showschemaEntity = $em->getRepository('BontekoeCinemaBundle:Showschema')->find($this->getRequest()
            ->get("showschema_id"));

        $row = $this->getRequest()->get("row");
        $rowSeat = $this->getRequest()->get("rowSeat");

        $reservation = $em->getRepository('BontekoeCinemaBundle:Reservation')->findOneBy(array(
            "row" => $row,
            "rowSeat" => $rowSeat,
            "showschema" => $showschemaEntity,
            "user" => $this->getUser()
        ));

        if (! $reservation) {
            Throw new \Exception("Reservation not found");
        }

        $em->remove($reservation);
        $em->flush();

        return new Response();
    }

    /**
     * Displays a form to create a new Reservation entity.
     *
     * @Route("/seat", name="reservation_update_seat")
     * @Method("POST")
     * @Security("has_role('ROLE_USER')")
     */
    public function updateSeatAction()
    {
        $em = $this->getDoctrine()->getManager();

        $showschemaEntity = $em->getRepository('BontekoeCinemaBundle:Showschema')->find($this->getRequest()
            ->get("showschema_id"));

        $row = $this->getRequest()->get("row");
        $rowSeat = $this->getRequest()->get("rowSeat");
        $type = $this->getRequest()->get("type");

        $reservation = $em->getRepository('BontekoeCinemaBundle:Reservation')->findOneBy(array(
            "row" => $row,
            "rowSeat" => $rowSeat,
            "showschema" => $showschemaEntity,
            "user" => $this->getUser()
        ));

        if (! $reservation) {
            Throw new \Exception("Reservation not found");
        }

        $reservation->setType($type);

        $em->flush();

        return new Response();
    }

    /**
     * Displays a form to create a new Reservation entity.
     *
     * @Route("/cancel", name="reservation_cancel")
     * @Method("DELETE")
     * @Security("has_role('ROLE_USER')")
     */
    public function cancelAction()
    {
        $em = $this->getDoctrine()->getManager();

        $showschemaEntity = $em->getRepository('BontekoeCinemaBundle:Showschema')->find($this->getRequest()
            ->get("showschema_id"));

        $reservations = $em->getRepository('BontekoeCinemaBundle:Reservation')->findBy(array(
            "showschema" => $showschemaEntity,
            "user" => $this->getUser()
        ));

        foreach ($reservations as $reservation) {
            $em->remove($reservation);
        }

        $em->flush();

        return new Response();
    }

    /**
     * Do the payment
     *
     * @Route("/payment", name="reservation_payment")
     * @Security("has_role('ROLE_USER')")
     * @Method("GET")
     */
    public function paymentAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('BontekoeCinemaBundle:Reservation')->findBy(array(
            "user" => $this->getUser(),
            "paid" => false
        ));

        if (!$reservations) {
            return $this->redirectToRoute("movie");
        }

        $amount = 0;

        foreach ($reservations as $reservation) {
            switch ($reservation->getType()) {
                case "Adult":
                    $amount += 9.95;
                    break;
                case "Child":
                    $amount += 5.95;
                    break;
                case "Student":
                    $amount += 7.95;
                    break;
            }
        }

        //$amount = count($reservations) * 9.95;

        $mollie = new \Mollie_API_Client();
        $mollie->setApiKey("test_9cS95KJggAFt4XpAjrYaKV6agKiNEY");

        $session = new Session();

        if (!$session->has("payment-id")) {
            $payment = $mollie->payments->create(array(
                "amount" => $amount,
                "description" => "My first API payment",
                "redirectUrl" => "http://" . $this->getRequest()->getHttpHost() . $this->generateUrl('reservation_payment')
            ));

            $session->set("payment-id", $payment->id);

            return new RedirectResponse($payment->getPaymentUrl());
        } else {
            $payment = $mollie->payments->get($session->get("payment-id"));
        }

        if ($payment->isPaid()) {
            print "BETAALD";

            foreach ($reservations as $reservation) {
                $reservation->setPaid(true);
            }

            $em->flush();

            $session->remove("payment-id");
        } else {
            print "NIET BETAALD <br />";

            $session->remove("payment-id");

            print '<a href="http://' . $this->getRequest()->getHttpHost() . $this->generateUrl('reservation_payment') .'">Probeer nog eens</a>';
        }

        return new Response();
    }

    /**
     * Finds and displays a Reservation entity.
     *
     * @Route("/{id}", name="reservation_showschema")
     * @Method("GET")
     * @Template()
     */
    public function showschemaAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BontekoeCinemaBundle:Reservation')->find($id);

        if (! $entity) {
            throw $this->createNotFoundException('Unable to find Reservation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView()
        );
    }

    /**
     * Displays a form to edit an existing Reservation entity.
     *
     * @Route("/{id}/edit", name="reservation_edit")
     * @Method("GET")
     * @Security("has_role('ROLE_CONTENTEDITOR')")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BontekoeCinemaBundle:Reservation')->find($id);

        if (! $entity) {
            throw $this->createNotFoundException('Unable to find Reservation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        );
    }

    /**
     * Creates a form to edit a Reservation entity.
     *
     * @param Reservation $entity
     *            The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Reservation $entity)
    {
        $form = $this->createForm(new ReservationType(), $entity, array(
            'action' => $this->generateUrl('reservation_update', array(
                'id' => $entity->getId()
            )),
            'method' => 'PUT'
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Update'
        ));

        return $form;
    }

    /**
     * Edits an existing Reservation entity.
     *
     * @Route("/{id}", name="reservation_update")
     * @Method("PUT")
     * @Template("BontekoeCinemaBundle:Reservation:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BontekoeCinemaBundle:Reservation')->find($id);

        if (! $entity) {
            throw $this->createNotFoundException('Unable to find Reservation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reservation_edit', array(
                'id' => $id
            )));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        );
    }

    /**
     * Deletes a Reservation entity.
     *
     * @Route("/{id}", name="reservation_delete")
     * @Security("has_role('ROLE_CONTENTEDITOR')")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BontekoeCinemaBundle:Reservation')->find($id);

            if (! $entity) {
                throw $this->createNotFoundException('Unable to find Reservation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reservation'));
    }

    /**
     * Creates a form to delete a Reservation entity by id.
     *
     * @param mixed $id
     *            The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservation_delete', array(
                'id' => $id
            )))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'label' => 'Delete'
            ))
            ->getForm();
    }
}
