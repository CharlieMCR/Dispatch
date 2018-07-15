<?php

namespace Charliemcr\Dispatch\Infrastructure\RoyalMail;

use Ramsey\Uuid\Uuid;

/**
 * Emulates a package to interact with Royal Mail
 *
 * Class RoyalMail
 * @package Charliemcr\Dispatch\Infrastructure\RoyalMail
 */
class RoyalMail
{
    public function getTrackingNumber(): string
    {
        return 'RoyalMail' . Uuid::uuid4();
    }

    public function emailTrackingNumbers(array $trackingNumbers): bool
    {
        return true;
    }
}