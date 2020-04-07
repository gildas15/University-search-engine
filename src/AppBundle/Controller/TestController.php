<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\isUniversity\isUniversity;
use AppBundle\isLocation\isLocation;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\RedisDataOrganization\RedisServer;
use AppBundle\Entity\schoolCrawler;



class TestController extends Controller
{   

    public function testAction(Request $request)
    {

        $searchContent = array('E-learning','LA FACULTE DES SCIENCES JURIDIQUES ET POLITIQUES','SJP (Sciences Juridiques et Politiques)','L\'INSTITUT DE RECHERCHES SUR L\'ENSEIGNEMENT DE LA MATHEMATIQUE, DE LA PHYSIQUE ET DE LA TECHNOLOGIE');
        $schoolCrawler = new schoolCrawler();
        $CrawlerRepository = $this->getDoctrine()->getRepository(schoolCrawler::class);
        $university =$CrawlerRepository->findOneByschoolDomainName('www.ucad.sn');
        $university->setSearchContent($searchContent);
        $em = $this->getDoctrine()->getManager();
        $em->persist($university);
        $em->flush();
        return new Response(
            '<html><body>Lucky number: 5</body></html>'
        ); 
    }
}   

