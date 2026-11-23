<?php
declare(strict_types=1);

namespace Les\ShippingNote\Model\Preview;

class LazyPreviewComparison
{
    private NotePreview $ormPreview;
    private NotePreview $samplePreview;

    //建構子
    public function __construct(
        NotePreview $ormPreview,
        NotePreview $samplePreview
    ) {
        $this->ormPreview = $ormPreview;
        $this->samplePreview = $samplePreview;
    }

    public function getSamplePreview(): array
    {
        return $this->samplePreview->getPreview();
    }

    public function getOrmPreview(): array
    {
        return $this->ormPreview->getPreview();
    }
}
