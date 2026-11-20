<?php
declare(strict_types=1);

namespace Les\ShippingNote\Model;

use Magento\Framework\Event\ManagerInterface;

class DeliveryNoticePublisher
{
    private ManagerInterface $eventManager;

    public function __construct(ManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    public function publish(string $noticeCode): void
    {
        $this->eventManager->dispatch(
            'les_shipping_note_notice_announced',
            ['notice_code' => $noticeCode]
        );
    }
}
