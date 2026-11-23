<?php
//資料傳輸物件
declare(strict_types=1);

namespace Les\ShippingNote\Model\Data;

use Les\ShippingNote\Api\Data\NoteSummaryInterface;

class NoteSummary implements NoteSummaryInterface
{
    private int $id;
    private string $code;
    private string $title;

    public function __construct(
        int $id,
        string $code,
        string $title
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->title = $title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
