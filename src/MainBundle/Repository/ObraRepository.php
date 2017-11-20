<?php

namespace MainBundle\Repository;

/**
 * ObraRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ObraRepository extends \Doctrine\ORM\EntityRepository {

    public function getAllObras() {
        $em = $this->getEntityManager();

        $dql = `SELECT 
                    OB.id,
                    OB.title AS titulo,
                    OB.body AS cuerpo,
                    IMA.id AS imagen_id,
                    IMA.name AS imagen_nombre,
                    IMA.updated_at AS updatedAt,
                    IMA.image AS imagen
                FROM MainBundle\Entity\Obra OB INNER JOIN MainBundle\Entity\Image IMA ON OB.id = IMA.obra_id
                ORDER	BY OB.id`
        ;

        $query = $em->createQuery($dql);

        return $query;
    }

}