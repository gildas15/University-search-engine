<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\university;


class studentMenuController extends Controller
{   

    public function indexAction(Request $request)
    {
        $university = new university();
        //get the connected student
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        //get university of interested of the student
        $em = $this->getDoctrine()->getManager();
        $universityInterest = $em->getRepository('AppBundle:university')->findByScholarId($user);
        return $this->render('pages/menu/student/menu.html.twig',['universitiesInterest'=>$universityInterest]);
     
    }
}   

