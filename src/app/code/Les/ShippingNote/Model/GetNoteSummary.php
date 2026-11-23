<?php
declare(strict_types=1);

namespace Les\ShippingNote\Model;

use Les\ShippingNote\Api\Data\NoteSummaryInterface;
use Les\ShippingNote\Api\GetNoteSummaryInterface;
use Les\ShippingNote\Model\Data\NoteSummaryFactory;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;

class GetNoteSummary implements GetNoteSummaryInterface
{
    private NoteReader $reader;
    private NoteSummaryFactory $summaryFactory;

    public function __construct(
        NoteReader $reader,
        NoteSummaryFactory $summaryFactory
    ) {
        $this->reader = $reader;
        $this->summaryFactory = $summaryFactory;
    }

    public function execute(string $code): NoteSummaryInterface
    {
        $code = trim($code);

        if ($code === '') {
            throw new InputException(
                __('A note code is required.')
            );
        }

        $note = $this->reader->getByCode($code);

        if ($note === null) {
            throw new NoSuchEntityException(
                __('No shipping note exists for code "%1".', $code)
            );
        }

        return $this->summaryFactory->create([
            'id' => (int) $note->getId(),
            'code' => (string) $note->getData('code'),
            'title' => (string) $note->getData('title'),
        ]);
    }
}