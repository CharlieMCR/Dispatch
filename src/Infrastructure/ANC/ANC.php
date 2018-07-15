<?php

namespace Charliemcr\Dispatch\Infrastructure\ANC;

use Ramsey\Uuid\Uuid;

/**
 * Emulates a package to interact with ANC
 *
 * Class ANC
 * @package Charliemcr\Dispatch\Infrastructure\ANC
 */
class ANC
{
    public function getConsignment(): string
    {
        return 'ANC' . Uuid::uuid4();
    }

    public function sendFTPConsignments(array $consignments): bool
    {
        return true;
    }
}