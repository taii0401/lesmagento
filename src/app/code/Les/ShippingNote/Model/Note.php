<?php
declare(strict_types=1);

namespace Les\ShippingNote\Model;

use Les\ShippingNote\Model\ResourceModel\Note as NoteResource;
use Magento\Framework\Model\AbstractModel;

class Note extends AbstractModel
{
    protected function _construct()
    {
        //用哪個 Resource Model
        $this->_init(NoteResource::class);
    }
}
