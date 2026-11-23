<?php
declare(strict_types=1);

use Les\ShippingNote\Model\NoteReader;
use Les\ShippingNote\Model\ResourceModel\Note as NoteResource;
use Magento\Framework\App\Bootstrap;

if (PHP_SAPI !== 'cli') {
    exit(1);
}

require dirname(__DIR__) . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();

$reader = $objectManager->get(NoteReader::class);
$resource = $objectManager->get(NoteResource::class);

echo 'Table: ' . $resource->getMainTable() . PHP_EOL;
echo 'ID field: ' . $resource->getIdFieldName() . PHP_EOL;

$rows = $reader->getActivePage(1, 10);

echo json_encode(
    $rows,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
) . PHP_EOL;

if (isset($argv[1]) && $argv[1] !== '') {
    $note = $reader->getByCode($argv[1]);

    echo $note
        ? 'Found ID: ' . $note->getId() . PHP_EOL
        : 'Code not found.' . PHP_EOL;
}
