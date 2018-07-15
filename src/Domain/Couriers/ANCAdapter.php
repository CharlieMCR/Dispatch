<?php

namespace Charliemcr\Dispatch\Domain\Couriers;


use Charliemcr\Dispatch\Infrastructure\ANC\ANC;

class ANCAdapter implements CourierDispatchable
{
    private $courier;

    /**
     * ANCAdapter constructor.
     * @param ANC $courier
     */
    public function __construct(ANC $courier)
    {
        $this->courier = $courier;
    }

    /**
     * @return string
     */
    public function getConsignmentNumber(): string
    {
        return $this->courier->getConsignment();
    }

    /**
     * @param array $consignmentNumbers
     * @return bool
     */
    public function sendConsignmentNumbers(array $consignmentNumbers): bool
    {
        return $this->courier->sendFTPConsignments($consignmentNumbers);
    }
}