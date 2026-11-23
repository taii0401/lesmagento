<?php
declare(strict_types=1);

use Les\ShippingNote\Model\Preview\PreviewComparison;
use Magento\Framework\App\Bootstrap;

if (PHP_SAPI !== 'cli') {
    exit(1);
}

require dirname(__DIR__) . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();

$comparison = $objectManager->get(
    PreviewComparison::class
);

$names = [
    'Les\ShippingNote\Virtual\OrmNotePreview',
    'Les\ShippingNote\Virtual\SampleNotePreview',
];

foreach ($names as $name) {
    $preview = $objectManager->get($name);

    printf(
        "DI name: %s\nPHP class: %s\n\n",
        $name,
        get_class($preview)
    );
}

echo json_encode(
    $comparison->getComparison(),
    JSON_PRETTY_PRINT |
    JSON_UNESCAPED_UNICODE |
    JSON_THROW_ON_ERROR
) . PHP_EOL;
