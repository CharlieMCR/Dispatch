<?php

namespace Charliemcr\Dispatch\Domain\Orders;


class OrderRepository
{
    /**
     * @var OrderEntity
     */
    private $entity;

    public function __construct()
    {
        $this->entity = new OrderEntity();
    }

    /**
     * @return OrderEntity
     */
    public function getEntity(): OrderEntity
    {
        return $this->entity;
    }

    /**
     * @param OrderEntity $entity
     */
    public function setEntity(OrderEntity $entity)
    {
        $this->entity = $entity;
    }
}