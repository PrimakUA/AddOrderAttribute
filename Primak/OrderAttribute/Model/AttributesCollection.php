<?php

declare(strict_types=1);

namespace Primak\OrderAttribute\Model;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * class AttributeCollection
 */
class AttributesCollection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Attributes::class, AttributesResource::class);
    }
}
