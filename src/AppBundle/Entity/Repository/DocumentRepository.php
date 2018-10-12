<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class DocumentRepository extends EntityRepository
{
    
    /**
    * {@inheritDoc}
    */
    public function createFindAllQuery()
    {
        return $this->_em->createQuery(
            "
            SELECT bp
            FROM AppBundle:document bp
            "
        );
    }

    /**
     * {@inheritDoc}
     */
    public function createFindOneByIdQuery(int $id)
    {
        $query = $this->_em->createQuery(
            "
            SELECT bp
            FROM AppBundle:document bp
            WHERE bp.id = :id
            "
        );

        $query->setParameter('id', $id);

        return $query;
    }
}