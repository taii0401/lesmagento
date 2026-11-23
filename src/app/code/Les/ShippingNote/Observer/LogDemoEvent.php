<?php
//(測試用)自訂事件
declare(strict_types=1);

namespace Les\ShippingNote\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogDemoEvent implements ObserverInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer): void
    {
        $message = $observer->getEvent()
            ->getData('demo_message');

        if (!is_string($message)) {
            $this->logger->warning(
                'LES_DEMO_EVENT: invalid demo_message'
            );

            return;
        }

        $this->logger->info(
            'LES_DEMO_EVENT: received',
            [
                'demo_message' => $message,
            ]
        );
    }
}
