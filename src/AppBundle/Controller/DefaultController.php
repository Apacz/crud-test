<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Dish;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Template()
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dishes = $em->getRepository(Dish::class)->findAll();
        // replace this example code with whatever you need
        return array('dishes' => $dishes);
    }

    /**
     * @Route("/dish/{id}", name="homepage_dish")
     */
    public function dishAction(Dish $dish)
    {
        return array('dish' => $dish);
    }
}
