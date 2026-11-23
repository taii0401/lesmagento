<?php
declare(strict_types=1);

namespace Les\ShippingNote\Api;

use Les\ShippingNote\Api\Data\NoteSummaryInterface;

/** @api */
interface GetNoteSummaryInterface
{
    /**
     * Retrieve a shipping note summary by code.
     *
     * @param string $code
     * @return \Les\ShippingNote\Api\Data\NoteSummaryInterface
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function execute(string $code): NoteSummaryInterface;
}
