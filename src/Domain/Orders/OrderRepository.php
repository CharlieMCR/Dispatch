<?php

namespace Charliemcr\Dispatch\Domain\Orders;


use Charliemcr\Dispatch\Infrastructure\Repository;

/**
 * Emulates an Order Repository
 *
 * Class OrderRepository
 * @package Charliemcr\Dispatch\Domain\Orders
 */
class OrderRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
        $this->setEntity(new OrderEntity());
    }
}