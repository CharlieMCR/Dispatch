<?php

namespace Charliemcr\Test\Unit;


use Charliemcr\Dispatch\Domain\Couriers\CourierDispatchable;
use Charliemcr\Test\TestCase;

class CourierAdapterTest extends TestCase
{
    /**
     * @param $courierKey              string The container key for the courier adapter
     * @param $consignmentNumberLength int    The expected length of each consignment number
     *
     * @dataProvider CourierConsignmentDataProvider
     */
    public function testConsignmentNumbers(string $courierKey, int $consignmentNumberLength)
    {
        /**
         * @var $courier CourierDispatchable
         */
        $courier = $this->container[$courierKey];
        $this->assertInstanceOf(CourierDispatchable::class, $courier);
        $this->assertEquals(
            $consignmentNumberLength,
            strlen($courier->getConsignmentNumber())
        );
    }

    public function CourierConsignmentDataProvider(): array
    {
        return [
            'Royal Mail' => [
                'royal-mail',
                45
            ],
            'ANC' => [
                'anc',
                39
            ]
        ];
    }
}