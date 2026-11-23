<?php
//(測試用)自訂事件
declare(strict_types=1);

namespace Les\ShippingNote\Controller\Delivery;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Event\ManagerInterface;

class EventDemo implements HttpGetActionInterface
{
    private ManagerInterface $eventManager;
    private JsonFactory $jsonFactory;

    public function __construct(
        ManagerInterface $eventManager,
        JsonFactory $jsonFactory
    ) {
        $this->eventManager = $eventManager;
        $this->jsonFactory = $jsonFactory;
    }

    public function execute(): Json
    {
        $this->eventManager->dispatch(
            'les_shipping_note_demo_after',
            [
                'demo_message' => 'LES observer demo',
            ]
        );

        return $this->jsonFactory->create()->setData([
            'event' => 'les_shipping_note_demo_after',
            'dispatch_returned' => true,
        ]);
    }
}
