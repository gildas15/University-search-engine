<?php

namespace AppBundle\SearchActions;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\higherInstitute;
use Elastica\Query\Terms;
use Elastica\Query;
use Elastica\Query\BoolQuery;


class Search
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    public function searchResult(array $values)
    {
        $finder = $this->container->get('fos_elastica.finder.app.scholarCrawler');
        $boolQuery = new BoolQuery();
       
        
        $tagsQuery = new \Elastica\Query\Match();
        //search degree and study area in pages contents
        $tagsQuery->setFieldQuery('searchContent', $values['AreaOfStudy']);
        $boolQuery->addMust($tagsQuery);

        $countryQuery = new \Elastica\Query\Match();
        $countryQuery->setFieldQuery('country', $values['country']);
        $boolQuery->addMust($countryQuery);


        $results = $finder->find($boolQuery);
        //paginate elasticsearch result
        //$totalResults = $finder->findPaginated($results);
        //$totalResults->setMaxPerPage(2);
        //$totalResults->setCurrentPage(1);
        //$elasticaManager = $this->container->get('fos_elastica.manager');
        //$results = $elasticaManager->getRepository(higherInstitute::class)->search($values);
        return $results;
        
    }

     
}