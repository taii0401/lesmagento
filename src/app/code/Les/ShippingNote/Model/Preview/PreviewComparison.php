<?php
//會同時接收兩組 NotePreview，再取得結果
declare(strict_types=1);

namespace Les\ShippingNote\Model\Preview;

class PreviewComparison
{
    private NotePreview $ormPreview;
    private NotePreview $samplePreview;

    public function __construct(
        NotePreview $ormPreview,
        NotePreview $samplePreview
    ) {
        $this->ormPreview = $ormPreview;
        $this->samplePreview = $samplePreview;
    }

    public function getComparison(): array
    {
        return [
            'orm' => $this->ormPreview->getPreview(),
            'sample' => $this->samplePreview->getPreview(),
        ];
    }
}
