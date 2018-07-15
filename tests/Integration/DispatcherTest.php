<?php

namespace Charliemcr\Test\Integration;


use Charliemcr\Dispatch\Domain\Batches\BatchRepository;
use Charliemcr\Dispatch\Domain\Couriers\InvalidCourier;
use Charliemcr\Dispatch\Domain\Dispatcher\Dispatcher;
use Charliemcr\Dispatch\Domain\Orders\OrderEntity;
use Charliemcr\Dispatch\Domain\Orders\OrderRepository;
use Charliemcr\Test\TestCase;

class DispatcherTest extends TestCase
{
    /**
     * @var $dispatcher Dispatcher
     */
    private $dispatcher;

    protected function setUp()
    {
        parent::setUp();
        $this->dispatcher = $this->container['dispatcher'];
    }

    /**
     * @param \Closure $orderRepositoryClosure
     * @param int      $consignmentNumberLength
     *
     * @dataProvider consignmentNumberAssignmentDataProvider
     */
    public function testAssignConsignmentNumberToOrder(\Closure $orderRepositoryClosure, int $consignmentNumberLength)
    {
        /**
         * @var $orderRepository OrderRepository
         */
        $orderRepository = $orderRepositoryClosure($this->container);
        $this->dispatcher->assignConsignmentNumberToOrder($orderRepository);
        $this->assertEquals(
            $consignmentNumberLength,
            strlen($orderRepository->getEntity()->getConsignmentNumber())
        );
    }

    public function testInvalidCourier()
    {
        $this->expectException(InvalidCourier::class);
        /**
         * @var $orderRepository OrderRepository
         */
        $orderRepository = $this->container['order-repository'];
        $order = $orderRepository->getEntity();
        $order->setShippingMethod(3);
        $this->dispatcher->assignConsignmentNumberToOrder($orderRepository);
    }

    public function testDispatchBatchOpen()
    {
        /**
         * @var $batchRepository BatchRepository
         */
        $batchRepository = $this->container['batch-repository'];
        $this->assertNull($batchRepository->getEntity()->getBatchStart());
        $this->dispatcher->startDispatch();
        $this->assertInstanceOf(
            \DateTime::class,
            $batchRepository->getEntity()->getBatchStart()
        );
    }

    public function testDispatchBatchClose()
    {
        /**
         * @var $batchRepository BatchRepository
         */
        $batchRepository = $this->container['batch-repository'];
        $this->assertNull($batchRepository->getEntity()->getBatchEnd());
        $this->dispatcher->closeDispatch();
        $this->assertInstanceOf(
            \DateTime::class,
            $batchRepository->getEntity()->getBatchEnd()
        );
    }

    public function testSendConsignments()
    {
        // TODO
    }

    public function consignmentNumberAssignmentDataProvider(): array
    {
        return [
            'Royal Mail' => [
                function ($container) {
                    /**
                     * @var $orderRepository OrderRepository
                     */
                    $orderRepository = $container['order-repository'];
                    $order = $orderRepository->getEntity();
                    $order->setShippingMethod(OrderEntity::SHIPPING_METHOD_ROYAL_MAIL);
                    return $orderRepository;
                },
                45
            ],
            'ANC' => [
                function ($container) {
                    /**
                     * @var $orderRepository OrderRepository
                     */
                    $orderRepository = $container['order-repository'];
                    $order = $orderRepository->getEntity();
                    $order->setShippingMethod(OrderEntity::SHIPPING_METHOD_ANC);
                    return $orderRepository;
                },
                39
            ]
        ];
    }
}