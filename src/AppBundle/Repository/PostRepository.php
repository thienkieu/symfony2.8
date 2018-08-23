<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use \Doctrine\ORM\Tools\Pagination\Paginator;

class PostRepository extends EntityRepository
{
    public function getActivePost()
    {
        $query = $this->_em->createQuery('SELECT p FROM \AppBundle\Entity\Post p WHERE p.active = 1 ');
        $paginator  = new Paginator($query);
        return $paginator;
    }
}