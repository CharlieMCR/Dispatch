<?php

namespace Charliemcr\Dispatch\Infrastructure;

/**
 * Emulates an ancestor Repository class
 * Class Repository
 * @package Charliemcr\Dispatch\Infrastructure
 */
class Repository
{
    /**
     * @var Entity
     */
    private $entity;

    public function __construct()
    {
        $this->entity = new Entity();
    }

    /**
     * @return Entity
     */
    public function getEntity(): Entity
    {
        return $this->entity;
    }

    /**
     * @param Entity $entity
     */
    public function setEntity(Entity $entity)
    {
        $this->entity = $entity;
    }
}