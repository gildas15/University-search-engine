<?php
namespace AppBundle\RedisDataOrganization;

use Symfony\Component\Cache\Adapter\RedisAdapter;



class RedisServer
{
   

   
    
    public function listRightPush($listName, $pageUrl)   { 
        $client = $this->redisConnection();
        $client->RPUSH($listName,$pageUrl);
    }
    
    public function listLeftPush($listName, $pageUrl)   { 
        $client = $this->redisConnection();
        $client->LPUSH($listName,$pageUrl);
    }

    public function leftPOP($listName)   { 
        $client = $this->redisConnection();
       return $client->LPOP($listName);
    }

    public function rightPOP($listName)   { 
        $client = $this->redisConnection();
        return $client->RPOP($listName);
     }

     public function ListLenght($listName)   { 
        $client = $this->redisConnection();
        return $client->LLEN($listName);
     }

     public function KeyExist($listName,$domainName) {
        $client = $this->redisConnection();
        return $client->exists($domainName); 
     }
    //hashmap 

   
    public function HashMapSet($domainUrl, $pagerui, $pageUrl)   {
        $client = $this->redisConnection();
        $client-> HMSET($domainUrl, $pagerui, $pageUrl);
    }

    public function HashGetAll($domainUrl)   {
        $client = $this->redisConnection();
        return $client->HGETALL($domainUrl);
    }

    public function HashDelete($domainUrl)   {
        $client = $this->redisConnection();
        $client->HDEL($domainUrl);
    }


   
   




    public function redisConnection()   {

        $redisClient = RedisAdapter::createConnection(
            // provide a string dsn
            'redis://localhost:6379',
                
            // associative array of configuration options
            array(
                'lazy' => false,
                'persistent' => 0,
                'persistent_id' => null,
                'timeout' => 30,
                'read_timeout' => 0,
                'retry_interval' => 0,
             )
        
        );
        return $redisClient;
        
    }
    
}