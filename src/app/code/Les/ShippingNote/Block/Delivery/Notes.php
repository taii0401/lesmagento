<?php
declare(strict_types=1);

namespace Les\ShippingNote\Block\Delivery;

use Les\ShippingNote\Model\NoteReader;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Notes extends Template
{
    private NoteReader $noteReader;

    public function __construct(
        Context $context,
        NoteReader $noteReader,
        array $data = []
    ) {
        $this->noteReader = $noteReader;

        parent::__construct($context, $data);
    }

    public function getNotes(): array
    {
        return $this->noteReader->getActivePage(1, 10);
    }
}
