<?php

declare(strict_types=1);

namespace Primak\OrderAttribute\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Checkout\Model\SessionFactory;
use Magento\Sales\Api\OrderRepositoryInterface;

/**
 * class PrimakAttribute
 */
class PrimakAttribute implements ArgumentInterface
{
    /**
     * @var SessionFactory
     */
    protected SessionFactory $checkoutSessionFactory;

    /**
     * @var OrderRepositoryInterface
     */
    protected OrderRepositoryInterface $orderRepository;

    /**
     * @param SessionFactory $checkoutSessionFactory
     * @param OrderRepositoryInterface $orderRepository
     */
    public function __construct(
        SessionFactory $checkoutSessionFactory,
        OrderRepositoryInterface $orderRepository

    ){
        $this->checkoutSessionFactory = $checkoutSessionFactory;
        $this->orderRepository = $orderRepository;
    }

    /**
     * @return object
     */
    protected function currentOrder(): object
    {
        return $this->checkoutSessionFactory->create()->getLastRealOrder();
    }

    /**
     * @return string
     */
    public function getPrimakAttribute(): string
    {
        return $this->orderRepository->get($this->currentOrder()->getEntityId())->getExtensionAttributes()->getPrimakLocation();
    }
}
