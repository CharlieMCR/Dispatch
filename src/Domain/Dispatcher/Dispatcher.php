<?php

namespace Charliemcr\Dispatch\Domain\Dispatcher;


use Charliemcr\Dispatch\Domain\Couriers\CourierDispatchable;
use Charliemcr\Dispatch\Domain\Couriers\InvalidCourier;
use Charliemcr\Dispatch\Domain\Orders\OrderEntity;
use Charliemcr\Dispatch\Domain\Orders\OrderRepository;
use Pimple\Container;

class Dispatcher
{
    /**
     * @var Container
     */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function assignConsignmentNumberToOrder(OrderRepository $orderRepository)
    {
        $shippingMethod = $orderRepository->getEntity()->getShippingMethod();
        switch ($shippingMethod) {
            case OrderEntity::SHIPPING_METHOD_ANC:
                $orderRepository->getEntity()->setConsignmentNumber(
                    $this->getConsignmertNumberForCourier('anc')
                );
                break;
            case OrderEntity::SHIPPING_METHOD_ROYAL_MAIL:
                $orderRepository->getEntity()->setConsignmentNumber(
                    $this->getConsignmertNumberForCourier('royal-mail')
                );
                break;
            default:
                throw new InvalidCourier('Shipping method not found');
        }
    }

    protected function getConsignmertNumberForCourier(string $containerKey)
    {
        /**
         * @var $courier CourierDispatchable
         */
        $courier = $this->container[$containerKey];
        return $courier->getConsignmentNumber();
    }
}