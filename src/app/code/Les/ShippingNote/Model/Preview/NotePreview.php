<?php
declare(strict_types=1);

namespace Les\ShippingNote\Model\Preview;

use Les\ShippingNote\Api\NoteSourceInterface;

class NotePreview
{
    private NoteSourceInterface $source;
    private string $heading;
    private int $limit;
    private bool $showCodes;
    private array $options;

    public function __construct(
        NoteSourceInterface $source,
        string $heading = 'Delivery notes',
        int $limit = 5,
        bool $showCodes = false,
        array $options = ['empty_message' => 'No active delivery notes.']
    ) {
        $this->source = $source;
        $this->heading = $heading;
        $this->limit = max(1, min(50, $limit));
        $this->showCodes = $showCodes;
        $this->options = $options;
    }

    public function getPreview(): array
    {
        $rows = $this->source->fetch($this->limit);

        if (!$this->showCodes) {
            foreach ($rows as &$row) {
                unset($row['code']);
            }
            unset($row);
        }

        return [
            'heading' => $this->heading,
            'limit' => $this->limit,
            'show_codes' => $this->showCodes,
            'empty_message' => $rows === []
                ? (string) ($this->options['empty_message'] ?? '')
                : null,
            'rows' => $rows,
        ];
    }
}
