<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use AppBundle\Traits\Timestampable;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation as JMSSerializer;

/**
 * Redacteur
 *
 * @ORM\Table(name="public.utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\UserRepository")
 * @UniqueEntity(
 *     fields={"email"},
 *     message="Ce rédacteur existe déjà dans ce référentiel"
 * )
 * * @JMSSerializer\ExclusionPolicy("all")
 */
class User implements UserInterface
{
    
    //use Timestampable;
    
    /**
     * @var int
     * 
     * @JMSSerializer\Expose
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     * 
     * @JMSSerializer\Expose
     * @Assert\NotNull(message="Le nom de l'utilisateur doit être renseigné")
     * @ORM\Column(name="nom",  type="string", length=255, nullable=false))
     */
    private $nom;
    
    /**
     * @var string
     * 
     * @JMSSerializer\Expose
     * @Assert\NotNull(message="Le prénom de l'utilisateur doit être renseigné")
     * @ORM\Column(name="prenom",  type="string", length=255, nullable=false))
     */
    private $prenom;
    
    /**
     * @var string
     * 
     * @JMSSerializer\Expose
     * @Assert\NotNull(message="L'email de l'utilisateur doit être renseigné")
     * @Assert\Email(
     *     message = "L'email {{ value }} n'est pas un email valide",
     *     checkMX = true
     * )
     * @ORM\Column(name="email",  type="string", length=255, nullable=false, unique=true)
     */
    private $email;

    /**
     * @var string
     * 
     * @JMSSerializer\Expose
     * @Assert\NotNull(message="Le code de l'utilisateur doit être renseigné")
     * @Assert\Length(
     *      min = 3,
     *      max = 3,
     *      exactMessage = "Le code de l'utilisateur (trigramme) doit être composé de {{ limit }} caractères"
     * )
     * @ORM\Column(name="code",  type="string", length=255, nullable=false))
     */
    private $code;
    
    /**
     * Identifiant du ldap
     * @var type 
     */
    private $uid;
  
     /**
     * Identifiant unique de connection du sso
     * @var type 
     */
    private $username;
    
    
    /**
     * @var array
     * 
     * @ORM\Column(name="roles",type="json_array", nullable=true)
     * @var array
     */
    private $roles = array();
   
    public function getRoles() 
    {
        return $this->roles;
    }
    
    public function getSalt() {
        ;
    }
    
    public function getPassword() {
        ;
    }
    
    
    public function eraseCredentials() {
        ;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set code.
     *
     * @param string $code
     *
     * @return User
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set roles.
     *
     * @param array|null $roles
     *
     * @return User
     */
    public function setRoles($roles = null)
    {
        $this->roles = $roles;

        return $this;
    }
    
    
    /**
     * {@inheritdoc}
     */
    public function __toString() 
    {
        return $this->getNom() . ' ' . $this->getPrenom();
    }
    
     /**
     * get username.
     *
     * @return string|null
     */
    public function getUsername() 
    {
        return $this->username;
    }

     /**
     * Set username.
     *
     * @param string|null $username
     *
     * @return User
     */
    public function setUsername($username) 
    {
        $this->username = $username;
        return $this;
    }
    
    /**
     * get uid.
     *
     * @return string|null
     */
    public function getUid()
    {
        return $this->uid;
    }
    
    /**
    * Set username.
    *
    * @param string|null $uid
    *
    * @return User
    */
    public function setUid($uid) 
    {
        $this->uid = $uid;
        return $this;
    }
}
