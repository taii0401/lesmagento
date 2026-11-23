<?php
declare(strict_types=1);

use Les\ShippingNote\Model\Preview\LazyPreviewComparison;
use Magento\Framework\App\Bootstrap;

if (PHP_SAPI !== 'cli') {
    exit(1);
}

$mode = $argv[1] ?? 'sample';

if (!in_array($mode, ['sample', 'orm', 'both'], true)) {
    fwrite(
        STDERR,
        "Usage: php dev/les-proxy-preview.php [sample|orm|both]\n"
    );
    exit(2);
}

require dirname(__DIR__) . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);

$comparison = $bootstrap->getObjectManager()
    ->get(LazyPreviewComparison::class);

echo "Consumer assembled\n";

$result = [];

if ($mode === 'sample' || $mode === 'both') {
    echo "Calling sample branch\n";
    $result['sample'] = $comparison->getSamplePreview();
}

if ($mode === 'orm' || $mode === 'both') {
    echo "Calling ORM branch\n";
    $result['orm'] = $comparison->getOrmPreview();
}

echo json_encode(
    $result,
    JSON_PRETTY_PRINT |
    JSON_UNESCAPED_UNICODE |
    JSON_THROW_ON_ERROR
) . PHP_EOL;
