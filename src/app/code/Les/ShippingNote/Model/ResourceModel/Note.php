<?php
declare(strict_types=1);

namespace Les\ShippingNote\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Note extends AbstractDb
{
    protected function _construct()
    {
        //資料表名稱及主鍵名稱
        $this->_init('les_shipping_note', 'id');
    }
}
