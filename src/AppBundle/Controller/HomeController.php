<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\SearchFormType;
use AppBundle\Form\ShareFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\SearchActions\Search;
use AppBundle\Entity\university;
class HomeController extends Controller
{
    
    public function indexAction(Request $request,Search $search,Session $session)
    {  
        $searchform = $this->createForm(SearchFormType::class);
        $searchform->handleRequest($request);
        if ($searchform->isSubmitted() && $searchform->isValid()) {
            $values =  $searchform->getData();
            $searchResults = $search->searchResult($values);
            $session->set('searchResults', $searchResults);
            return $this->redirectToRoute('result', array(
                'AreaOfStudy'=>$values['AreaOfStudy'], 'degree'=>$values['degree'],'country'=>$values['country']));
                
        }
          return $this->render('main/index.html.twig', array('search_form' => $searchform, 
          'search_form' => $searchform->createView()));
    }


    //result page
    public function searchAction(Request $request, Search $search,Session $session)
    {
        $shareform = $this->createForm(ShareFormType::class);
        $searchform = $this->createForm(SearchFormType::class);
        $searchform->handleRequest($request);
        $shareform->handleRequest($request);
        //if search form is submitted
        if ($searchform->isSubmitted() && $searchform->isValid()) {
            $values =  $searchform->getData();
            //if user initiate a new seearch
                $searchResults = $search->searchResult($values);
                $session->set('searchResults', $searchResults);
                return $this->redirectToRoute('result', array(
                    'AreaOfStudy'=>$values['AreaOfStudy'], 'degree'=>$values['degree'],'country'=>$values['country']));
                     
        }
        //if share form is submitted
        if ($shareform->isSubmitted() && $shareform->isValid()) {
            $shareData =  $shareform->getData();
            //send visitor mail 
           $date = date('d-M-y H:i:s');
           $message = (new \Swift_Message('University Search'))
           ->setFrom($shareData['fromEmail'])
           ->setTo($shareData['toEmail'])
           ->setBody(
               $this->renderView(
                   'EmailsTemplates/share.html.twig',
                   array('schoolName'=>$shareData['schoolName'], 'schoolWebsite'=>$shareData['website'],'message'=>$shareData['message'], 'fromEmail'=>$shareData['fromEmail'])
               ),
               'text/html'
           )
           ;

           $this->get('mailer')->send($message);
           return $this->redirectToRoute('result', array(
            'AreaOfStudy'=>$shareData['AreaOfStudy'], 'degree'=>$shareData['degree'],'country'=>$shareData['country']));
        }
        $searchResults = $session->get('searchResults');
        return $this->render('pages/searchResult.html.twig', array('search_form' => $searchform, 'search_form' => $searchform->createView(), 'share_form' => $shareform,
        'search_results'=>$searchResults));
    }



    public function contentAction($website, $content, $schoolName, $schoolJob)     {
        return $this->render('pages/universityContent.html.twig', array( 
        'website'=>$website,
        'content'=>$content, 
        'schoolName'=>$schoolName,
        'schoolJob'=>$schoolJob));
    }
    //send invitation to university of interested
    public function invitationAction(Request $request)  {
        //get user personal information
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        //send invitation to university
        $date = date('d-M-y H:i:s');
        $message = (new \Swift_Message('University Search'))
        ->setFrom($user->getEmail())
        ->setTo($request->attributes->get('schoolEmail'))
        ->setBody(
            $this->renderView(
                'EmailsTemplates/universityInvitation.html.twig',
                array('schoolName'=>$request->attributes->get('schoolName'))
            ),
            'text/html'
        )
        ;

        $this->get('mailer')->send($message);

        return $this->redirectToRoute('result', array(
        'AreaOfStudy'=>$request->attributes->get('AreaOfStudy'), 'degree'=>$request->attributes->get('degree'),'country'=>$request->attributes->get('country')));
                
    }  
     //save University of interested in the database
     public function saveAction(Request $request)  {
        $university = new university();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $university->setScholarId($user);
        $university->setUniversityName($request->attributes->get('schoolName'));
        $university->setUniversityLogo($request->attributes->get('schoolLogo'));
        $university->setContactEmail($request->attributes->get('schoolEmail'));
        $university->setDomainName($request->attributes->get('DomainName'));
        $em = $this->getDoctrine()->getManager();
          $em->persist($university);
          $em->flush();

        return $this->redirectToRoute('result', array(
        'AreaOfStudy'=>$request->attributes->get('AreaOfStudy'), 'degree'=>$request->attributes->get('degree'),'country'=>$request->attributes->get('country')));
                
    }    
    
}
