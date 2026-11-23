<?php
declare(strict_types=1);

namespace Les\ShippingNote\Model;

use Les\ShippingNote\Model\ResourceModel\Note as NoteResource;
use Les\ShippingNote\Model\ResourceModel\Note\CollectionFactory;

class NoteReader
{
    private NoteFactory $noteFactory;
    private NoteResource $noteResource;
    private CollectionFactory $collectionFactory;

    public function __construct(
        NoteFactory $noteFactory,
        NoteResource $noteResource,
        CollectionFactory $collectionFactory
    ) {
        $this->noteFactory = $noteFactory;
        $this->noteResource = $noteResource;
        $this->collectionFactory = $collectionFactory;
    }

    public function getByCode(string $code): ?Note
    {
        $note = $this->noteFactory->create();

        $this->noteResource->load($note, $code, 'code');

        /*
            傳入 $code = 'delivery_notice'
            SELECT *
            FROM les_shipping_note
            WHERE code = 'delivery_notice'
            LIMIT 1;
        */

        return $note->getId() ? $note : null;
    }

    public function getActivePage(
        int $page = 1,
        int $pageSize = 10
    ): array {
        $page = max(1, $page);
        $pageSize = max(1, min(50, $pageSize));

        $collection = $this->collectionFactory->create();

        //SELECT columns
        $collection->addFieldToSelect([
            'id',
            'code',
            'title',
            'content',
            'is_active',
            'sort_order'
        ]);

        //WHERE
        $collection->addFieldToFilter(
            'is_active',
            ['eq' => 1]
        );

        $collection->setOrder('sort_order', 'ASC'); //ORDER BY
        $collection->setOrder('id', 'ASC');
        $collection->setPageSize($pageSize); //LIMIT
        $collection->setCurPage($page); //OFFSET 對應的頁數

        /*
            SELECT id, code, title, content, is_active, sort_order
            FROM les_shipping_note
            WHERE is_active = 1
            ORDER BY sort_order ASC, id ASC
            LIMIT 10 OFFSET 0;
        */

        $rows = [];

        foreach ($collection as $note) {
            $rows[] = $note->getData(); //查詢符合條件的總筆數
        }

        return $rows;
    }
}
