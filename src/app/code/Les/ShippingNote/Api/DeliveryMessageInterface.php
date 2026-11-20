<?php
declare(strict_types=1);

namespace Les\ShippingNote\Api;

interface DeliveryMessageInterface
{
    //取得出貨地文字
    public function getOriginLabel(): string;

    //取得配送說明
    public function getIntroduction(): string;
}
