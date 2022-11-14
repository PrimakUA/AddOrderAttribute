<?php

namespace Primak\OrderAttribute\Plugin;

use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderManagementInterface;
use Primak\OrderAttribute\Model\Management;

/**
 * Class OrderManagementPlugin
 */
class OrderManagementPlugin
{
    /**
     * @var Management
     */
    protected Management $management;

    /**
     * @param Management $management
     */
    public function __construct(
        Management $management
    )
    {
        $this->management = $management;
    }

    /**
     * @param OrderManagementInterface $subject
     * @param OrderInterface $order
     *
     * @return object
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterPlace(
        OrderManagementInterface $subject,
        OrderInterface $order
    ): object {
        $quoteId = $order->getQuoteId();
        if ($quoteId) {
            $this->management->saveProductShopIds($order->getBillingAddress()->getCity(), $order->getEntityId());
        }
        return $order;
    }
}
