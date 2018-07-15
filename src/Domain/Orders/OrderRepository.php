<?php

namespace Charliemcr\Dispatch\Domain\Orders;


use Charliemcr\Dispatch\Domain\Batches\BatchRepository;
use Charliemcr\Dispatch\Domain\Couriers\CourierDispatchable;
use Charliemcr\Dispatch\Domain\Couriers\InvalidCourier;
use Charliemcr\Dispatch\Infrastructure\Repository;
use Pimple\Container;

/**
 * Emulates an Order Repository
 *
 * Class OrderRepository
 * @package Charliemcr\Dispatch\Domain\Orders
 */
class OrderRepository extends Repository
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->setEntity(new OrderEntity());
    }

    /**
     * Emulates a collection of orders for a Batch. Essentially a mocked method
     *
     * @param int $courier
     *
     * @return array
     * @throws InvalidCourier
     */
    public function getOrdersForBatch(int $courier)
    {
        /**
         * @var $batchRepository BatchRepository
         */
        $batchRepository = $this->container['batch-repository'];

        /**
         * @var $courierAdapter CourierDispatchable
         */
        switch ($courier) {
            case OrderEntity::SHIPPING_METHOD_ANC:
                $courierAdapter = $this->container['anc'];
                break;
            case OrderEntity::SHIPPING_METHOD_ROYAL_MAIL:
                $courierAdapter = $this->container['royal-mail'];
                break;
            default:
                throw new InvalidCourier('Invalid Courier');
        }

        return [
            (new OrderEntity())
                ->setShippingMethod($courier)
                ->setBatchId($batchRepository->getEntity()->getId())
                ->setConsignmentNumber($courierAdapter->getConsignmentNumber()),
            (new OrderEntity())
                ->setShippingMethod($courier)
                ->setBatchId($batchRepository->getEntity()->getId())
                ->setConsignmentNumber($courierAdapter->getConsignmentNumber()),
            (new OrderEntity())
                ->setShippingMethod($courier)
                ->setBatchId($batchRepository->getEntity()->getId())
                ->setConsignmentNumber($courierAdapter->getConsignmentNumber()),
        ];
    }
}