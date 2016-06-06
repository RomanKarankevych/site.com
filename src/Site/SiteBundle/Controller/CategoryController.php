<?php

namespace Site\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function indexAction($category)
    {
        //get all categories
        $repository = $this->getDoctrine()
            ->getRepository('SiteBundle:categories');

        $query = $repository->createQueryBuilder('p')->getQuery();
        $categories = $query->getResult();
        $categories_name = array();

        $count = 0;
        foreach ($categories as $obj) {
            $categories_name[$count] = $obj->getName();
            $count++;
        }

       //get id of category

        $repository = $this->getDoctrine()
            ->getRepository('SiteBundle:categories');
        $query = $repository->createQueryBuilder('p')
            ->where('p.name = :category')
            ->setParameter('category', $category)->getQuery();
        $id = $query->getResult();
       // $id = $id->getId();
        $id_of_category=0;
        $count = 0;
        $category_id=array();
        foreach ($id as $obj){
            $id_of_category=$obj->getId();
            $count++;
        }

        //get id products in category
        $repository = $this->getDoctrine()
            ->getRepository('SiteBundle:categoriesproducts');

        $query = $repository->createQueryBuilder('p')
            ->where('p.categoriesId = :id')
            ->setParameter('id', $id_of_category)->getQuery();
        $products = $query->getResult();
        $products_id=array();
        $count=0;
        foreach ($products as $obj){
            $products_id[$count]=$obj->getProductsId();
            $count++;
        }

        //get name of products
        $count=0;
        $products_name=array();
        $repository = $this->getDoctrine()
            ->getRepository('SiteBundle:products');
        $count1=0;
        foreach($products_id as $key=>$value){
            $query = $repository->createQueryBuilder('p')
                ->where('p.id = :id')
                ->setParameter('id', $value)->getQuery();
            $products = $query->getResult();


            foreach ($products as $obj){
                $products_name[$count]=$obj->getName();

            }
            $count++;

        }
        return $this->render('SiteBundle:Category:category.html.twig', array('categories' => $categories_name,
            'products' => $products_name, 'current_category'=>$category));
    }
}
