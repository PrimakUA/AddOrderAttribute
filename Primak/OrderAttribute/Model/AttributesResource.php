<?php

declare(strict_types=1);

namespace Primak\OrderAttribute\Model;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * class AttributeResource
 */
class AttributesResource extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('primak_order_attribute', 'entity_id');
    }
}
