<?php
declare(strict_types=1);

namespace Les\ShippingNote\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\Result\RawFactory;

class Test implements HttpGetActionInterface
{
    public function __construct(
        private readonly RawFactory $rawFactory
    ) {
    }

    public function execute(): Raw
    {
        $result = $this->rawFactory->create();
        $result->setHeader(
            'Content-Type',
            'text/plain; charset=UTF-8',
            true
        );
        $result->setContents(
            "LES second action is ready.\n"
            . "這是 Index/Test.php 的 execute。\n"
        );

        return $result;
    }
}
