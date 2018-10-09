<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class DossierRepository extends EntityRepository
{
    
    /**
    * {@inheritDoc}
    */
    public function createFindAllQuery()
    {
        return $this->_em->createQuery(
            "
            SELECT bp
            FROM AppBundle:dossier bp
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
            FROM AppBundle:dossier bp
            WHERE bp.id = :id
            "
        );

        $query->setParameter('id', $id);

        return $query;
    }
}