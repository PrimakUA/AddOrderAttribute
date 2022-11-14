<?php

declare(strict_types=1);

namespace Primak\OrderAttribute\Api;

use Primak\OrderAttribute\Api\Data\AttributesInterface;

/**
 * @api
 */
interface ManagementInterface
{

    /**
     * @param int $orderId
     * @return AttributesInterface
     */
    public function getByOrderAttributeId(int $orderId): AttributesInterface;
}
