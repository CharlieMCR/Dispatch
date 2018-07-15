<?php

namespace Charliemcr\Dispatch\Domain\Orders;


use Charliemcr\Dispatch\Infrastructure\Entity;
use Ramsey\Uuid\Uuid;

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
     * @var $batchId Uuid
     */
    private $batchId;

    /**
     * @return int
     */
    public function getShippingMethod(): int
    {
        return $this->shippingMethod;
    }

    /**
     * @param int $shippingMethod
     *
     * @return $this
     */
    public function setShippingMethod(int $shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;
        return $this;
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
     *
     * @return $this
     */
    public function setConsignmentNumber(string $consignmentNumber)
    {
        $this->consignmentNumber = $consignmentNumber;
        return $this;
    }

    /**
     * @return Uuid
     */
    public function getBatchId(): Uuid
    {
        return $this->batchId;
    }

    /**
     * @param Uuid $batchId
     *
     * @return $this
     */
    public function setBatchId(Uuid $batchId)
    {
        $this->batchId = $batchId;
        return $this;
    }
}