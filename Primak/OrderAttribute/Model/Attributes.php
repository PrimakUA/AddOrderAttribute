<?php

declare(strict_types=1);

namespace Primak\OrderAttribute\Model;

use Magento\Framework\Model\AbstractModel;
use Primak\OrderAttribute\Api\Data\AttributesInterface;

/**
 * class Attributes
 */
class Attributes extends AbstractModel implements AttributesInterface
{

    public const ORDER_ATTRIBUTE_ID = 'order_attribute_id';

    public const PRIMAK_LOCATION = 'primak_location';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(AttributesResource::class);
    }

    /**
     * @return int
     */
    public function getOrderAttributeId(): int
    {
        return (int) $this->getData(self::ORDER_ATTRIBUTE_ID);
    }

    /**
     * @return string
     */
    public function getPrimakLocation(): string
    {
        return (string) $this->getData(self::PRIMAK_LOCATION);
    }
}
