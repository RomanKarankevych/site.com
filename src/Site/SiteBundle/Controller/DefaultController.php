<?php

namespace Site\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping as ORM;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //get all categories
        $repository = $this->getDoctrine()
            ->getRepository('SiteBundle:categories');

        $query = $repository->createQueryBuilder('p')->getQuery();
        $categories = $query->getResult();
        $categories_name=array();

        $count=0;
        foreach ($categories as $obj){
            $categories_name[$count]=$obj->getName();
            $count++;
        }

        //get all products

        $repository = $this->getDoctrine()
            ->getRepository('SiteBundle:products');

        $query = $repository->createQueryBuilder('p')->getQuery();
        $products = $query->getResult();
        $products_name=array();

        $count=0;
        foreach ($products as $obj){
            $products_name[$count]=$obj->getName();
            $count++;
        }

        return $this->render('SiteBundle:Default:index.html.twig', array('categories'=>$categories_name,
            'products'=>$products_name));
    }
}
