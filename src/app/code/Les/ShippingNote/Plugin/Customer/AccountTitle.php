<?php
declare(strict_types=1);

namespace Les\ShippingNote\Plugin\Customer;

use Magento\Customer\Controller\Account\Index;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Result\Page;

class AccountTitle
{
    private Session $customerSession;

    public function __construct(
        Session $customerSession
    ) {
        $this->customerSession = $customerSession;
    }

    //攔截 execute() 的回傳結果
    public function afterExecute(Index $subject, $result)
    {
        //確認結果與會員狀態
        if (
            !$result instanceof Page ||
            !$this->customerSession->isLoggedIn()
        ) {
            return $result;
        }

        //取得會員姓名
        $name = trim(
            (string) $this->customerSession
                ->getCustomer()
                ->getName()
        );

        //修改 Page Title
        $title = $name === ''
            ? __('Welcome back')
            : __('Welcome back, %1', $name);

        $result->getConfig()
            ->getTitle()
            ->set($title);

        return $result;
    }
}
