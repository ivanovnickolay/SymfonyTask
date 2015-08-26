<?php

namespace TaskBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TaskBundle\Entity\Subtask;
use TaskBundle\Form\SubtaskType;

/**
 * Subtask controller.
 *
 */
class SubtaskController extends Controller
{

    /**
     * Lists all Subtask entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TaskBundle:Subtask')->findAll();

        return $this->render('TaskBundle:Subtask:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Subtask entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Subtask();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subtask_show', array('id' => $entity->getId())));
        }

        return $this->render('TaskBundle:Subtask:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Subtask entity.
     *
     * @param Subtask $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Subtask $entity)
    {
        $form = $this->createForm(new SubtaskType(), $entity, array(
            'action' => $this->generateUrl('subtask_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Subtask entity.
     *
     */
    public function newAction()
    {
        $entity = new Subtask();
        $form   = $this->createCreateForm($entity);

        return $this->render('TaskBundle:Subtask:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Subtask entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TaskBundle:Subtask')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subtask entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TaskBundle:Subtask:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Subtask entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TaskBundle:Subtask')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subtask entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TaskBundle:Subtask:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Subtask entity.
    *
    * @param Subtask $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Subtask $entity)
    {
        $form = $this->createForm(new SubtaskType(), $entity, array(
            'action' => $this->generateUrl('subtask_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Subtask entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TaskBundle:Subtask')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subtask entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('subtask_edit', array('id' => $id)));
        }

        return $this->render('TaskBundle:Subtask:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Subtask entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TaskBundle:Subtask')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Subtask entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('subtask'));
    }

    /**
     * Creates a form to delete a Subtask entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subtask_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
