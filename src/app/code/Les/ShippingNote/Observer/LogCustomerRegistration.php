<?php
//會員註冊
declare(strict_types=1);

namespace Les\ShippingNote\Observer;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogCustomerRegistration implements ObserverInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer): void
    {
        $customer = $observer->getEvent()
            ->getData('customer');

        if (!$customer instanceof CustomerInterface) {
            $this->logger->warning(
                'LES_REGISTER_EVENT: unexpected customer payload'
            );

            return;
        }

        $this->logger->info(
            'LES_REGISTER_EVENT: received',
            [
                'customer_id' => (int) $customer->getId(),
                'group_id' => (int) $customer->getGroupId(),
            ]
        );
    }
}
