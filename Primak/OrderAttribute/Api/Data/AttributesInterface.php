<?php

declare(strict_types=1);

namespace Primak\OrderAttribute\Api\Data;

/**
 * @api
 */
interface AttributesInterface
{
    /**
     * @return int
     */
    public function getOrderAttributeId(): int;


    /**
     * @return string
     */
    public function getPrimakLocation(): string;
}
