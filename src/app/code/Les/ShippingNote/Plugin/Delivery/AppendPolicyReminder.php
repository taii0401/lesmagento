<?php
declare(strict_types=1);

namespace Les\ShippingNote\Plugin\Delivery;

use Les\ShippingNote\Block\Delivery\Summary;

class AppendPolicyReminder
{
    public function afterGetIntroduction(
        Summary $subject,
        string $result
    ): string {
        return trim(
            $result . ' ' . (string) __(
                'See the delivery policy before ordering.'
            )
        );
    }
}
