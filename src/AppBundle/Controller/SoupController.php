<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Soup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Soup controller.
 *
 * @Route("admin/soup")
 */
class SoupController extends Controller
{
    /**
     * Lists all soup entities.
     *
     * @Route("/", name="admin_soup_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $soups = $em->getRepository('AppBundle:Soup')->findAll();

        return $this->render('soup/index.html.twig', array(
            'soups' => $soups,
        ));
    }

    /**
     * Creates a new soup entity.
     *
     * @Route("/new", name="admin_soup_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $soup = new Soup();
        $form = $this->createForm('AppBundle\Form\SoupType', $soup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($soup);
            $em->flush();

            return $this->redirectToRoute('admin_soup_show', array('id' => $soup->getId()));
        }

        return $this->render('soup/new.html.twig', array(
            'soup' => $soup,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a soup entity.
     *
     * @Route("/{id}", name="admin_soup_show")
     * @Method("GET")
     */
    public function showAction(Soup $soup)
    {
        $deleteForm = $this->createDeleteForm($soup);

        return $this->render('soup/show.html.twig', array(
            'soup' => $soup,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing soup entity.
     *
     * @Route("/{id}/edit", name="admin_soup_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Soup $soup)
    {
        $deleteForm = $this->createDeleteForm($soup);
        $editForm = $this->createForm('AppBundle\Form\SoupType', $soup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_soup_edit', array('id' => $soup->getId()));
        }

        return $this->render('soup/edit.html.twig', array(
            'soup' => $soup,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a soup entity.
     *
     * @Route("/{id}", name="admin_soup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Soup $soup)
    {
        $form = $this->createDeleteForm($soup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($soup);
            $em->flush();
        }

        return $this->redirectToRoute('admin_soup_index');
    }

    /**
     * Creates a form to delete a soup entity.
     *
     * @param Soup $soup The soup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Soup $soup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_soup_delete', array('id' => $soup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
