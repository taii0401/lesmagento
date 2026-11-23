<?php
declare(strict_types=1);

namespace Les\ShippingNote\Model\ResourceModel\Note;

use Les\ShippingNote\Model\Note;
use Les\ShippingNote\Model\ResourceModel\Note as NoteResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        //每筆資料使用 Note Model，資料存取使用 NoteResource
        //Collection 能針對 les_shipping_note 執行篩選、排序與分頁查詢
        $this->_init(Note::class, NoteResource::class);
    }
}
