<?php
//一份配送公告摘要，必須具有 ID、Code 和 Title
declare(strict_types=1);

namespace Les\ShippingNote\Api\Data;

/**
 * Read-only snapshot of a shipping note.
 * @api
 */
interface NoteSummaryInterface
{
    public function getId(): int;

    public function getCode(): string;

    public function getTitle(): string;
}
