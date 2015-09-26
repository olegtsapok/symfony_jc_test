<?php

namespace TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TestBundle\Entity\Product;
use TestBundle\Form\ProductType;

/**
 * Product controller.
 *
 */
class SiteController extends Controller
{

    /**
     * Index page.
     *
     */
    public function indexAction()
    {
        return $this->render('TestBundle:Site:index.html.twig', array());
    }

}
