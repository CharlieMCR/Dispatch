<?php

namespace Charliemcr\Dispatch\Domain\Couriers;


use Charliemcr\Dispatch\Infrastructure\RoyalMail\RoyalMail;

class RoyalMailAdapter implements CourierDispatchable
{
    private $courier;

    /**
     * RoyalMailAdapter constructor.
     * @param RoyalMail $courier
     */
    public function __construct(RoyalMail $courier)
    {
        $this->courier = $courier;
    }

    /**
     * @return string
     */
    public function getConsignmentNumber(): string
    {
        return $this->courier->getTrackingNumber();
    }

    /**
     * @param array $consignmentNumbers
     * @return bool
     */
    public function sendConsignmentNumbers(array $consignmentNumbers): bool
    {
        return $this->courier->emailTrackingNumbers($consignmentNumbers);
    }
}