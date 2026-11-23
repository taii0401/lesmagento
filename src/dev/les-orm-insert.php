<?php
declare(strict_types=1);

use Les\ShippingNote\Model\ResourceModel\Note as NoteResource;
use Les\ShippingNote\Model\NoteFactory;
use Magento\Framework\App\Bootstrap;

if (PHP_SAPI !== 'cli') {
    exit(1);
}

require dirname(__DIR__) . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();

$resource = $objectManager->get(NoteResource::class);

//新增資料
$noteFactory = $objectManager->get(NoteFactory::class);
$note = $noteFactory->create();

// 根據唯一欄位 code 查詢既有資料
$resource->load($note, 'orm_lesson_display', 'code');

if (!$note->getId()) {
    $note->setData([
        'code' => 'orm_lesson_display',
        'title' => 'ORM lesson display',
        'content' => 'This is a local practice record.',
        'is_active' => 1,
        'sort_order' => 2,
    ]);

    $resource->save($note);

    echo 'Inserted note ID: ' . $note->getId() . PHP_EOL;
} else {
    echo 'Note already exists. ID: ' . $note->getId() . PHP_EOL;
}