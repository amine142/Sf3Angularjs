<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMSSerializer;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\DocumentRepository")
 * @ORM\Table(name="document")
 * @JMSSerializer\ExclusionPolicy("all")
 */
class Document implements \JsonSerializable
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
     * @ORM\Column(type="string", name="path")
     * @JMSSerializer\Expose
     */
    private $path;

   
    /**
     * @return mixed
     */
    function jsonSerialize()
    {
        return [
            'id'    => $this->id,
            'title' => $this->title,
            'path'  => $this->path,
        ];
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
     * Set title.
     *
     * @param string $title
     *
     * @return Document
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set path.
     *
     * @param string $path
     *
     * @return Document
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}
