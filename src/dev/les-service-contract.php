<?php
declare(strict_types=1);

use Les\ShippingNote\Api\GetNoteSummaryInterface;
use Magento\Framework\App\Bootstrap;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;

if (PHP_SAPI !== 'cli') {
    exit(1);
}

$code = $argv[1] ?? '';

require dirname(__DIR__) . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);

try {
    $service = $bootstrap->getObjectManager()
        ->get(GetNoteSummaryInterface::class);

    $summary = $service->execute($code);

    echo json_encode([
        'id' => $summary->getId(),
        'code' => $summary->getCode(),
        'title' => $summary->getTitle(),
    ], JSON_PRETTY_PRINT |
       JSON_UNESCAPED_UNICODE |
       JSON_THROW_ON_ERROR
    ) . PHP_EOL;

} catch (InputException | NoSuchEntityException $exception) {
    fwrite(STDERR, $exception->getMessage() . PHP_EOL);
    exit(2);
}