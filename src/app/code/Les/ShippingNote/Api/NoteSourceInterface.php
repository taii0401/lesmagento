<?php
declare(strict_types=1);

namespace Les\ShippingNote\Api;

interface NoteSourceInterface
{
    //取得指定筆數的公告
    public function fetch(int $limit): array;
}