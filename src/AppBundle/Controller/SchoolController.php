<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\university;


class SchoolController extends Controller
{   

    public function authenticationAction(Request $request)
    {
        $university = new university();
        $em = $this->getDoctrine()->getManager();
        $schools = $em->getRepository('AppBundle:university')->findAll();
        return $this->render('pages/menu/school/authentication.html.twig',['schoolsList'=>$schools]);
     
    }
}   

