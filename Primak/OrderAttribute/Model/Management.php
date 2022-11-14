<?php

declare(strict_types=1);

namespace Primak\OrderAttribute\Model;

use Primak\OrderAttribute\Api\Data\AttributesInterface;
use Primak\OrderAttribute\Api\ManagementInterface;
use Primak\OrderAttribute\Model\AttributesFactory;
use Primak\OrderAttribute\Model\AttributesResource;

/**
 * class Management
 */
class Management implements ManagementInterface
{
    /**
     * @var AttributesResource
     */
    private \Primak\OrderAttribute\Model\AttributesResource $resource;

    /**
     * @var AttributesFactory
     */
    private \Primak\OrderAttribute\Model\AttributesFactory $factory;

    /**
     * Management constructor.
     * @param AttributesResource $resource
     * @param \Primak\OrderAttribute\Model\AttributesFactory $attributesFactory
     */
    public function __construct(
        AttributesResource $resource,
        AttributesFactory $attributesFactory
    ) {
        $this->resource = $resource;
        $this->factory = $attributesFactory;
    }

    /**
     * @param int $orderId
     * @return AttributesInterface
     */
    public function getByOrderAttributeId(int $orderId): AttributesInterface
    {
        $object = $this->getNewInstance();
        $this->resource->load($object, $orderId, 'order_attribute_id');

        return $object;
    }

    /**
     * @return AttributesInterface
     */
    public function getNewInstance(): AttributesInterface
    {
        return $this->factory->create();
    }

    /**
     * @param $primakLocation
     * @param $orderId
     * @return void
     */
    public function saveProductShopIds($primakLocation, $orderId)
    {
        $data[] = ['order_attribute_id' => (int)$orderId, 'primak_location' => (string)$primakLocation];

        $this->resource->getConnection()->insertMultiple($this->resource->getTable('primak_order_attribute'), $data);
    }
}
