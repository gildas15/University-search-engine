<?php
namespace AppBundle\isLocation;



class isLocation
{

    public function urlCheck($url)   { 
        $domainName = parse_url($url, PHP_URL_HOST);
        $domainSlipt = preg_split('\.\-',$domainName);
        foreach($domainSlipt as $domainPart)   { 
            if (preg_match("#c+a+m+e+r+o+[uo]n+|s+é+n+é+g+a+l+|south\safrica|afrique\sdu\ssud#i", $domainPart))   
                return $domainPart;
            
            return null;

        }
    }
    
    
        public function lastNodeCheck($lastNode)   { 
        foreach ($lastNode as $lastNodeElement) {
            if (preg_match("#c+a+m+e+r+o+[uo]n+|s+é+n+é+g+a+l+|south\safrica|afrique\sdu\ssud#i", $lastNodeElement))   
            return $lastNodeElement;
        
        }
        return null;

            
        }
    
        public function contactpageNodeCheck($contact)   { 
        foreach ($contact as $contactNode) {
            if (preg_match("#c+a+m+e+r+o+[uo]n+|s+é+n+é+g+a+l+|south\safrica|afrique\sdu\ssud#i", $contactNode))   
            return $contactNode;
        
        }
        return null;
        }
   
    public function firstNodeCheck($firstNode)   { 
    foreach ($firstNode as $firstNodeElement) {
        if (preg_match("#c+a+m+e+r+o+[uo]n+|s+é+n+é+g+a+l+|south\tafrica|afrique\sdu\ssud#i", $firstNodeElement))   
        return $firstNodeElement;
    
    }
    return null;
    }


  
	
}