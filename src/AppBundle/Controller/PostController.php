<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Post as PostEntity;

class PostController extends Controller
{
    /**
     * @Route("/", name="post")
     */
    public function indexAction(Request $request)
    {
        $paginator = $post = $this->getEntityManager()->getRepository(PostEntity::class)->getActivePost();
        
        $totalItems = count($paginator);
        $pageSize = 2;
        $pagesCount = ceil($totalItems / $pageSize);
        
        $currentPage = $request->get('currentPage',1);

        $paginator
        ->getQuery()
        ->setFirstResult($pageSize * ($currentPage-1))
        ->setMaxResults($pageSize);

        return $this->render('post/index.html.twig', 
            [
                'pagesCount'=>$pagesCount, 
                'paginator'=>$paginator, 
                'currentPage'=>$currentPage
            ]);
    }

    /**
     * @Route("/post", name="detail")
     */
    public function detailAction(Request $request)
    {
        $id = $request->get('id');
        $post = $this->getEntityManager()->getRepository(PostEntity::class)->find($id);
        $found = !empty($post);
        return $this->render('post/post.html.twig',['post'=>$post, 'found'=> $found]);
    }

    private function getEntityManager() {
        $em = $this->container->get('doctrine')->getManagers();
        return $em['default'];
    }
}
