<?php

namespace Charliemcr\Dispatch\Domain\Orders;


use Ramsey\Uuid\Uuid;

class OrderEntity
{
    const SHIPPING_METHOD_ANC = 1;
    const SHIPPING_METHOD_ROYAL_MAIL = 2;

    private $id;

    /**
     * @var $consignmentNumber string
     */
    private $consignmentNumber;

    /**
     * @var $shippingMethod int
     */
    private $shippingMethod;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

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