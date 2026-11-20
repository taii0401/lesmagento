<?php
declare(strict_types=1);

namespace Les\ShippingNote\Model;

use Les\ShippingNote\Api\DeliveryMessageInterface;

class InternationalDeliveryMessage implements DeliveryMessageInterface
{
    private string $introduction;

    public function __construct(
        string $introduction = 'International delivery information.'
    ) {
        $this->introduction = $introduction;
    }

    public function getOriginLabel(): string
    {
        return (string) __('Ships from Taiwan');
    }

    public function getIntroduction(): string
    {
        return (string) __($this->introduction);
    }
}
