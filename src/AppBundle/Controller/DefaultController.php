<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Post as PostEntity;

class DefaultController extends Controller
{
    /**
     * @Route("/remove", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->container->get('doctrine')->getManagers();
        $post = $em['default']->getRepository(PostEntity::class)->find(1);
        var_dump($post);die;
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}
