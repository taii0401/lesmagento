<?php
//ORM 資料來源
declare(strict_types=1);

namespace Les\ShippingNote\Model\Preview;

use Les\ShippingNote\Api\NoteSourceInterface;
use Les\ShippingNote\Model\NoteReader;

class OrmNoteSource implements NoteSourceInterface
{
    private NoteReader $reader;

    public function __construct(NoteReader $reader)
    {
        $this->reader = $reader;
    }

    public function fetch(int $limit): array
    {
        return $this->reader->getActivePage(1, $limit);
    }
}
