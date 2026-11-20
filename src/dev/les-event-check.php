<?php
declare(strict_types=1);

use Les\ShippingNote\Model\DeliveryNoticePublisher;
use Magento\Framework\App\Bootstrap;

if (PHP_SAPI !== 'cli') {
    exit(1);
}

require dirname(__DIR__) . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();

$publisher = $objectManager->get(
    DeliveryNoticePublisher::class
);

$publisher->publish('lesson_cli_notice');

echo "Dispatch returned; inspect the configured logger output.\n";
