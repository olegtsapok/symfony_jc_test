<?php

namespace TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TestBundle\Entity\Discount;
use TestBundle\Form\DiscountType;

/**
 * Discount controller.
 *
 */
class DiscountController extends Controller
{

    /**
     * Lists all Discount entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TestBundle:Discount')->findAll();

        return $this->render('TestBundle:Discount:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Discount entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Discount();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('discount_show', array('id' => $entity->getId())));
        }

        return $this->render('TestBundle:Discount:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Discount entity.
     *
     * @param Discount $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Discount $entity)
    {
        $form = $this->createForm(new DiscountType(), $entity, array(
            'action' => $this->generateUrl('discount_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Discount entity.
     *
     */
    public function newAction()
    {
        $entity = new Discount();
        $form   = $this->createCreateForm($entity);

        return $this->render('TestBundle:Discount:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Discount entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestBundle:Discount')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Discount entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestBundle:Discount:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Discount entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestBundle:Discount')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Discount entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestBundle:Discount:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Discount entity.
    *
    * @param Discount $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Discount $entity)
    {
        $form = $this->createForm(new DiscountType(), $entity, array(
            'action' => $this->generateUrl('discount_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Discount entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestBundle:Discount')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Discount entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('discount_edit', array('id' => $id)));
        }

        return $this->render('TestBundle:Discount:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Discount entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TestBundle:Discount')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Discount entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('discount'));
    }

    /**
     * Creates a form to delete a Discount entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('discount_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
