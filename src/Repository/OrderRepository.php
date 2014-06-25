<?php

namespace Clickbus\Repository;

use Doctrine\ORM\EntityRepository;

class OrderRepository extends EntityRepository
{

    /**
     * Get all entities
     *
     * @return array
     */
    public function getAll()
    {
        $query = $this->getAllQuery();

        return $query->getResult();
    }
}
