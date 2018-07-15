<?php

namespace Charliemcr\Dispatch\Domain\Couriers;

interface CourierDispatchable
{
    /**
     * @return string
     */
    public function getConsignmentNumber(): string;

    /**
     * @param array $consignmentNumbers
     * @return bool
     */
    public function sendConsignmentNumbers(array $consignmentNumbers): bool;
}