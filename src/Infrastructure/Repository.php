<?php

namespace Charliemcr\Dispatch\Infrastructure;

use Pimple\Container;

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

    /**
     * @var Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
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