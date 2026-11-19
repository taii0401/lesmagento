<?php
declare(strict_types=1);

namespace Les\ShippingNote\Controller\Delivery;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\Result\RawFactory;

class Info implements HttpGetActionInterface
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
            "LES delivery information route is ready.\n"
            . "配送說明入口已連接。\n"
        );

        return $result;
    }
}
