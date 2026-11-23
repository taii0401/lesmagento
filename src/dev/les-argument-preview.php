<?php
declare(strict_types=1);

use Les\ShippingNote\Model\Preview\NotePreview;
use Magento\Framework\App\Bootstrap;

if (PHP_SAPI !== 'cli') {
    exit(1);
}

require dirname(__DIR__) . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();

$preview = $objectManager->create(NotePreview::class);

echo json_encode(
    $preview->getPreview(),
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
) . PHP_EOL;
