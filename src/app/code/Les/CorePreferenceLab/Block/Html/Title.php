<?php
declare(strict_types=1);

namespace Les\CorePreferenceLab\Block\Html;

use Magento\Theme\Block\Html\Title as CoreTitle;

class Title extends CoreTitle
{
    public function getPageHeading()
    {
        if (
            //只修改配送說明頁(route id + controller + action)
            //如果沒有這個判斷，其他商品頁、CMS 頁面也可能受到影響
            $this->getRequest()->getFullActionName()
            === 'les_shipping_delivery_info' //
        ) {
            return (string) __(
                'International Delivery — Ships from Taiwan'
            );
        }

        return parent::getPageHeading();
    }
}
