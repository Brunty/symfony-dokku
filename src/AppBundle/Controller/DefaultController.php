<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

        $number = $session->get('random_number', null);

        if ($number === null) {
            $number = random_int(0, PHP_INT_MAX);
            $session->set('random_number', $number);
        }
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir'      => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'hostname'      => $_SERVER['HOSTNAME'],
            'random_number' => $number
        ]);
    }
}
