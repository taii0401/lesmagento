<?php
//靜態資料來源
declare(strict_types=1);

namespace Les\ShippingNote\Model\Preview;

use Les\ShippingNote\Api\NoteSourceInterface;

class StaticNoteSource implements NoteSourceInterface
{
    public function fetch(int $limit): array
    {
        //靜態資料
        $rows = [
            [
                'code' => 'argument_replacement_sample',
                'title' => 'Static preview sample',
                'content' => 'This row is not a database record.',
            ],
        ];

        return array_slice($rows, 0, max(0, $limit));
    }
}
