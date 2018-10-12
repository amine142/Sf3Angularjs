<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMSSerializer;
use JMS\Serializer\Annotation\Type;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\DossierRepository")
 * @ORM\Table(name="dossier")
 * @JMSSerializer\ExclusionPolicy("all")
 */
class Dossier implements \JsonSerializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMSSerializer\Expose
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="title")
     * @JMSSerializer\Expose
     */
    private $title;

    /**
     * @ORM\Column(type="string", name="body")
     * @JMSSerializer\Expose
     */
    private $body;

    /** 
     * @ORM\Column(type="object", name="documents")
     * @Type("ArrayCollection<AppBundle\Entity\Document>")
     * @JMSSerializer\Expose
     */
    private $documents;

    /**
     * @param mixed $body
     * @return Dossier
     */
    public function __construct() 
    {
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection(array());
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Dossier
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     * @return Dossier
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    


    /**
     * Set documents.
     *
     * @param \stdClass $documents
     *
     * @return Dossier
     */
    public function setDocuments($documents)
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * Get documents.
     *
     * @return \stdClass
     */
    public function getDocuments()
    {
        return $this->documents;
    }
    
    /**
     * @return mixed
     */
    function jsonSerialize()
    {
        return [
            'id'    => $this->id,
            'title' => $this->title,
            'body'  => $this->body,
            'documents' => $this->documents
        ];
    }
}
