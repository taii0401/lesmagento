<?php
declare(strict_types=1);

namespace Les\ShippingNote\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogDeliveryNotice implements ObserverInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer): void
    {
        $noticeCode = (string) $observer->getEvent()
            ->getData('notice_code');

        $this->logger->info(
            'LES delivery notice announced',
            ['notice_code' => $noticeCode]
        );
    }
}
