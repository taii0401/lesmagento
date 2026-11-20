<?php
declare(strict_types=1);

namespace Les\ShippingNote\Model;

use Les\ShippingNote\Api\DeliveryMessageInterface;

class DeliveryMessage implements DeliveryMessageInterface
{
    public function getOriginLabel(): string
    {
        return (string) __('Ships from Taiwan');
    }

    public function getIntroduction(): string
    {
        return (string) __(
            'Delivery options and charges are shown at checkout for the destination you select.'
        );
    }
}
