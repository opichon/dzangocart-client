<?php

namespace Dzangocart\OM;

use \DateTime;

class Order extends DzangocartObject
{
    const CSS_CLASS = 'order';
    const CSS_CLASS_CANCELLED = 'cancelled';
    const CSS_CLASS_CANCELLATION = 'cancellation';
    const CSS_CLASS_CREDIT = 'credit';
    const CSS_CLASS_UNPAID = 'unpaid';
    const CSS_CLASS_PAID = 'paid';

    protected $customer;
    protected $items;
    protected $taxes = array();

    public function isTest()
    {
        return $this->data['test'] ? true : false;
    }

    public function isCancelled()
    {
        return $this->data['cancelled'];
    }

    public function isCancellation()
    {
        return $this->data['cancellation'];
    }

    public function isCredit()
    {
        return $this->data['credit'];
    }

    public function getCssClass()
    {
        $css = array(static::CSS_CLASS);

        if ($this->isCancelled()) {
            $css[] = static::CSS_CLASS_CANCELLED;
        }

        if ($this->isCredit()) {
           $css[] = static::CSS_CLASS_CREDIT;
        }

        if ($this->isCancellation()) {
            $css[] = static::CSS_CLASS_CANCELLATION;
        }

        $css[] = $this->paid ? static::CSS_CLASS_PAID : static::CSS_CLASS_UNPAID;

        return implode(' ', $css);
    }

    public function getDateFormat()
    {
        return 'd/m/Y H:i';
    }

    public function getDate()
    {
        return new DateTime($this->data['date']);
    }

    public function getDatePaid($format = 'd/m/Y')
    {
        return new DateTime($this->data['paid_at']);
    }

    public function getCustomerName()
    {
        return sprintf('%s, %s', $this->data['customer']['surname'], $this->data['customer']['given_names']);
    }

    public function getCustomerCode()
    {
        return $this->data['customer']['code'];
    }

    public function getCustomerReferralCode()
    {
        return $this->data['customer']['referral_code'];
    }

    public function getOrderId()
    {
        return $this->data['id'];
    }

    public function getCustomerEmail()
    {
        return $this->data['customer']['email'];
    }

    public function getCustomer()
    {
        if (!$this->customer) {
            $cls = $this->getCustomerClass();
            $this->customer = new $cls($this->data['customer']);
        }

        return $this->customer;
    }

    public function getCurrency()
    {
        return $this->data['currency'];
    }

    public function getAmount()
    {
        return $this->data['amount'];
    }

    public function getAmountExcl()
    {
        return $this->data['amount_excl_tax'];
    }

    public function getAmountIncl()
    {
        return $this->data['amount_incl_tax'];
    }

    public function getTaxAmount()
    {
        return $this->data['amount_tax'];
    }

    public function getAmountPaid()
    {
        return $this->data['amount_paid'];
    }

    public function getAmountOutstanding()
    {
        return $this->data['amount_incl_tax'] - $this->data['amount_paid'];
    }

    public function getItems()
    {
        if (!$this->items) {
            $this->items = array();

            foreach ($this->data['items'] as $item_data) {
                $cls = $this->getItemClass($item_data['category']);
                // When returning an order, Dzangocart only supplies the customer data at order level, not item level.
                $item_data['customer'] = $this->customer;
                $item = new $cls($item_data);
                $this->items[] = $item;

                $tax_rate = sprintf('%05d', $item->getTaxRate() * 100);
                $this->taxes[$tax_rate] =  $item->getAmountTax() + @$this->taxes[$tax_rate];
                asort($this->taxes);
            }
        }

        return $this->items;
    }

    public function getTaxes()
    {
        return $this->taxes;
    }

    public function getAffiliateId()
    {
        return $this->data['affiliate_id'];
    }

    public function getAffiliate()
    {
        return $this->getAffiliateId();
    }

    public function process($confirm = false)
    {
        if ($confirm) {
            $this->confirm();
        }

        $this->generateInvoice();
        $this->doProcessOrder();
        $this->processItems();
    }

    protected function doProcessOrder()
    {

    }

    protected function confirm()
    {

    }

    protected function generateInvoice()
    {

    }

    protected function processItems()
    {
        $items = $this->getItems();

        foreach ($items as $item) {
            $item->process();
        }
    }

    protected function getCustomerClass()
    {
        return 'Dzangocart\OM\Customer';
    }

    protected function getItemClass($category)
    {
        return 'Dzangocart\OM\Sale';
    }
}
