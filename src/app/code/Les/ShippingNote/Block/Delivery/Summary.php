<?php
declare(strict_types=1);

namespace Les\ShippingNote\Block\Delivery;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Les\ShippingNote\Api\DeliveryMessageInterface;

class Summary extends Template
{
    private DeliveryMessageInterface $deliveryMessage;

    public function __construct(
        Context $context,
        DeliveryMessageInterface $deliveryMessage,
        array $data = []
    ) {
        $this->deliveryMessage = $deliveryMessage;

        //因為 Summary 繼承 Magento\Framework\View\Element\Template，自訂建構子時仍需要正確初始化父類別
        parent::__construct($context, $data);
    }

    public function getOriginLabel(): string
    {
        return $this->deliveryMessage->getOriginLabel();
    }

    public function getIntroduction(): string
    {
        return $this->deliveryMessage->getIntroduction();
    }
}
