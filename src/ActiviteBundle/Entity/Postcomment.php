<?php
/**
 * Created by PhpStorm.
 * User: poste
 * Date: 13/04/2019
 * Time: 02:14
 */

namespace ActiviteBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="ActiviteBundle\Repository\PostcommentRepository")
 * @ORM\Table(name="postcomment")
 * @ORM\HasLifecycleCallbacks()
 */

class Postcomment
{


    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", unique=false)
     */
    private $content;




    /**
     * @ORM\ManyToOne(targetEntity="ActiviteBundle\Entity\Activite", inversedBy="comments")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id_activite")
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @Assert\DateTime
     */
    private $posted_at;


    /**
     * @ORM\PrePersist
     */

    public function setPostedAt()
    {
        $this->posted_at = new \DateTime('now');
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }



    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }
    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

}

