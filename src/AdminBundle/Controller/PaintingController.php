<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Painting;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Painting controller.
 *
 */
class PaintingController extends Controller
{
    /**
     * Lists all painting entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paintings = $em->getRepository('AdminBundle:Painting')->findAll();

        return $this->render('AdminBundle:painting:index.html.twig', array(
            'paintings' => $paintings,
        ));
    }

    /**
     * Creates a new painting entity.
     *
     */
    public function newAction(Request $request)
    {
        $painting = new Painting();
        $form = $this->createForm('AdminBundle\Form\PaintingType', $painting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($painting);
            $em->flush($painting);

            return $this->redirectToRoute('painting_show', array('id' => $painting->getId()));
        }

        return $this->render('AdminBundle:painting:new.html.twig', array(
            'painting' => $painting,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a painting entity.
     *
     */
    public function showAction(Painting $painting)
    {
        $deleteForm = $this->createDeleteForm($painting);

        return $this->render('AdminBundle:painting:show.html.twig', array(
            'painting' => $painting,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing painting entity.
     *
     */
    public function editAction(Request $request, Painting $painting)
    {
        $deleteForm = $this->createDeleteForm($painting);
        $editForm = $this->createForm('AdminBundle\Form\PaintingType', $painting);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('painting_edit', array('id' => $painting->getId()));
        }

        return $this->render('AdminBundle:painting:edit.html.twig', array(
            'painting' => $painting,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a painting entity.
     *
     */
    public function deleteAction(Request $request, Painting $painting)
    {
        $form = $this->createDeleteForm($painting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($painting);
            $em->flush($painting);
        }

        return $this->redirectToRoute('painting_index');
    }

    /**
     * Creates a form to delete a painting entity.
     *
     * @param Painting $painting The painting entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Painting $painting)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('painting_delete', array('id' => $painting->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
