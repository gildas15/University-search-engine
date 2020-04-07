<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\isUniversity\isUniversity;
use AppBundle\isLocation\isLocation;
use AppBundle\RedisDataOrganization\RedisServer;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use AppBundle\Entity\schoolCrawler;

ini_set("max_execution_time", 0);
class CrawlerController extends Controller
{

        
    public function crawlerAction(Request $request)
    {
        $client = new Client();
        $redisServer = new RedisServer();
        $isUniversity = new isUniversity();
        //https://curlie.org/Reference/Education/Colleges_and_Universities/Africa/South_Africa/
        $initials_urls = array('https://cuib-cameroon.org/','https://www.mandela.ac.za/');
        //extract links form initials url's and push into the queue
        foreach($initials_urls as $initials_url)   {
        $crawler = $client->request('GET', $initials_url);
        $this->extractPushLinks($crawler);
        }

        while($redisServer->ListLenght('crawl_urls')!=0) {
            //left pop from the list
            $pageUrl = $redisServer->leftPOP('crawl_urls');
            $currentPageHtml = $client->request('GET', $pageUrl);
            //extract links and save from the above page url
            $this->extractPushLinks($currentPageHtml);
            //check if the link correspond to a university link
            $firstNode = $currentPageHtml->filter('body');
            if( $firstNode->filter('img')->count()>=1) {
                $param = $firstNode->filter('img')->eq(0)->attr('alt');
            }

            else {
                //code to handle the exception
                $firstNode = $currentPageHtml->filter('body');
                $param = $firstNode->children()->eq(0)->text();
            }
               
            

            if(!$isUniversity->firstNodeElementCheck($param)) 
                continue;

            if(!$isUniversity->pageTitleCheck( $currentPageHtml->filter('title')->text()))
                continue;

            if(!$isUniversity->domainCheck(parse_url($pageUrl, PHP_URL_HOST)))
                continue;
            //Add University to the hash map
              $redisServer->HashMapSet(parse_url($pageUrl, PHP_URL_HOST),parse_url($pageUrl, PHP_URL_PATH),$pageUrl);
              
              $RedisServer->listRightPush('domainNames',parse_url($pageUrl, PHP_URL_HOST));
             if($redisServer->ListLenght('domainNames') == 2) 
                break;
        }
        
            while($redisServer->ListLenght('domainNames')!=0)   {
                $domainName = $redisServer->leftPOP('domainNames');
            //for each domain get the university website 
            $UniversitiesWebsite = $redisServer->HashGetAll($domainName);
           //get the university content
            $schoolData = $this->locationRequirements($universityWebsite,$client);
                if($schoolData !=null)
                    $this->updateDatabase($location,$SchooldomainName,$schoolData); 
                continue;
            }  
    }


    function extractPushLinks($crawler)     { 
        $RedisServer = new  RedisServer();
        $links_count = $crawler->filter('a')->count();

        if($links_count > 0){

            $links = $crawler->filter('a')->links();

            foreach ($links as $link) {

                $page_link = $link->getURI();
                $RedisServer->listRightPush('crawl_urls',$page_link);

            }
            return true;
        } 
        
        else {

            return false;
        }

        
    }

    function FirstNodeIsValid($firstNode)       {
        foreach ($firstNode as $domElement) {
            if(preg_match("#universit[yé]|institut?e|college|école|supérieur?e|highe?r?#i", $domElement)){
                return $domElement;
            }
            return null;
        }
    }

    function locationRequirements($universityWebsite,$client)     {
        $schoolInfo=array();
        foreach($universityWebsite as $path=>$schoolPageUrl)   {
            //check for pages that contain any of the various degree program
           $pageNode = $client->request('GET', $schoolPageUrl);
            $this->searchContent($pageNode,$schoolInfo);
        }

        foreach($universityWebsite as $path=>$schoolPageUrl)   {
            //if contact page exist
            if(preg_match("#contact#i", $path)) {
                //get the contact page content
             $contactContent = $client->request('GET', $schoolPageUrl);
             //get school contact email if exist
             $ContactNode = $contactContent->filter('body');
            if($this->getSchoolContactEmail($ContactNode)!=null)
            array_push($schoolInfo,$this->getSchoolContactEmail($ContactNode)->text()); 
             //check country requirements
            $location = $isLocation->contactpageNodeCheck($contactContent);
                if($location !=null) {
                    array_push($schoolInfo,$location->text()); 
                    return $schoolInfo;

                }
   
                return null;
                
            }
        }
        //if contact page does not exist on a website
        //check location requirements on header and footer
        $client = new Client();
        $isLocation = new  isLocation();
        $homepage = $client->request('GET', $SchooldomainName);
        $firstNode = $homepage->filter('body')->children()->first();
        $footer = $homepage->filter('body')->children()->last();
        //get school contact info in header or footer
        if($this->getSchoolContactEmail($firstNode)!=null)
            array_push($schoolInfo,$this->getSchoolContactEmail($firstNode)->text());
        //if location if find either in header or footer
        if($isLocation->firstNodeCheck($firstNode)!=null)   { 
            array_push($schoolInfo,$isLocation->firstNodeCheck($firstNode)->text());
            return  $schoolInfo;
        }
        if($isLocation->lastNodeCheck( $footer)!=null)  { 
            array_push($schoolInfo,$isLocation->lastNodeCheck($footer)->text());
            return  $schoolInfo;
        }
        return null;

    }

    function searchContent($pageNode,$schoolInfo){
        if(preg_match("#Licence|Bachelor|Master|Doctorat|PHD|BTS|HND|#i", $pageNode->text())){
            foreach ($pageNode as $domElement)  {
                array_push($schoolInfo,$domElement->text());
                break;   
                }
        }
    }


    function getSchoolContactEmail($contactContent)     {
        foreach ($contactContent as $contactNode) {
            if (preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $contactNode))   
            return $contactNode;
        
        }
        return null;
    }

    function updateDatabase($location,$SchooldomainName, $schoolInfo)      {
          $schoolCrawler = new schoolCrawler();
          $client = new Client();
          $homepage = $client->request('GET', $SchooldomainName);
          $firstNode = $homepage->filter('body')->children()->first();
          $schoolCrawler->setSchoolDomainName($SchooldomainName);
          $schoolCrawler->setSchoolName($this->FirstNodeIsValid($firstNode)->text());
          if( $firstNode->filter('img')->count()>=1) {
            $logoPath = $firstNode->filter('img')->eq(0)->attr('src');
            $schoolCrawler->setSchoolLogo($logoPath );
        }
          $schoolCrawler->setContactEmail($schoolInfo[count($schoolInfo)-2]);
          $schoolCrawler->setCountry($schoolInfo[count($schoolInfo)-1]);
          unset($schoolInfo[count($schoolInfo)-1]);
          unset($schoolInfo[count($schoolInfo)-2]);
          $schoolCrawler->setSearchContent($schoolInfo);
          $em = $this->getDoctrine()->getManager();
          $em->persist($schoolCrawler);
          $em->flush();



    }

}
