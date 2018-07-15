<?php

namespace Charliemcr\Dispatch\Domain\Orders;


use Charliemcr\Dispatch\Infrastructure\Entity;

/**
 * Emulates an Order Entity
 *
 * Class OrderEntity
 * @package Charliemcr\Dispatch\Domain\Orders
 */
class OrderEntity extends Entity
{
    const SHIPPING_METHOD_ANC = 1;
    const SHIPPING_METHOD_ROYAL_MAIL = 2;

    /**
     * @var $consignmentNumber string
     */
    private $consignmentNumber;

    /**
     * @var $shippingMethod int
     */
    private $shippingMethod;



    /**
     * @return int
     */
    public function getShippingMethod(): int
    {
        return $this->shippingMethod;
    }

    /**
     * @param int $shippingMethod
     */
    public function setShippingMethod(int $shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;
    }

    /**
     * @return string
     */
    public function getConsignmentNumber(): string
    {
        return $this->consignmentNumber;
    }

    /**
     * @param string $consignmentNumber
     */
    public function setConsignmentNumber(string $consignmentNumber)
    {
        $this->consignmentNumber = $consignmentNumber;
    }
}