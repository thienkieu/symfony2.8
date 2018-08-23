<?php 

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @ORM\Table(name="posts")
 */
class Post
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    public $title;

    /**
     * @ORM\Column(type="string", length=150)
     */
    public $author;

    /**
     * @ORM\Column(type="string", length=50)
     */
    public $short_text;

    /**
     * @ORM\Column(type="text")
     */
    public $long_text;

    /**
     * @ORM\Column(type="boolean")
     */
    public $active;

    /**
     * @ORM\Column(type="datetime")
     */
    public $created;
    
}