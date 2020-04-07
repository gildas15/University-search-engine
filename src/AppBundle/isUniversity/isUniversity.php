<?php
namespace AppBundle\isUniversity;



class isUniversity
{

    public function firstNodeElementCheck($firstNodeElement)
    {
        if (preg_match("#universit[yé]|institute?|college|école|supérieure?|highe?r?#i", $firstNodeElement))   {
            return true;
        }

        else {
            return false;
        }

    }


    public function pageTitleCheck($pageTitle)
    {
        if (preg_match("#universit[yé]|institute?|college|école|supérieure?|highe?r?#i", $pageTitle))   {
            return true;
        }

        else {
            return false;
        }

    }


    public function domainCheck($domainName)
    {

       
        //get the domain name part that contains the university initials or name
         $domainPartsArray = preg_split('\.\-',$domainName);
        foreach($domainPart as $domainPartsArray)     {
              if(preg_match("#un?i?v?e?r?s?i?t?[yé]?|institute?|college|école|supérieure?|highe?r?|educ?a?t?i?o?n?#i", $domainPart))    {
                return true;
              }
              return false;
        }
          

      
    }


	
}