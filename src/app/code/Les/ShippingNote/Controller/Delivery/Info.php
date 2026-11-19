<?php
declare(strict_types=1);

namespace Les\ShippingNote\Controller\Delivery;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Info implements HttpGetActionInterface
{
    public function __construct(
        private readonly PageFactory $pageFactory
    ) {
    }

    public function execute(): Page
    {
        $page = $this->pageFactory->create();

        $page->getConfig()->getTitle()->set(
            __('International Delivery')
        );

        return $page;
    }
}