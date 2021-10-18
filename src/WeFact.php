<?php

namespace Media101\WeFactApi;

use Media101\WeFactApi\Entities\Creditor;
use Media101\WeFactApi\Entities\Debtor;
use Media101\WeFactApi\Entities\Group;
use Media101\WeFactApi\Entities\Invoice;
use Media101\WeFactApi\Entities\Product;
use Media101\WeFactApi\Entities\Quote;
use Media101\WeFactApi\Entities\Subscription;

class WeFact
{
    public static function creditor($Identifier = null): Creditor
    {
        return new Creditor($Identifier);
    }

    public static function debtor($Identifier = null): Debtor
    {
        return new Debtor($Identifier);
    }

    public function group($Identifier = null): Group
    {
        return new Group($Identifier);
    }

    public function invoice($Identifier = null): Invoice
    {
        return new Invoice($Identifier);
    }

    public function product($Identifier = null): Product
    {
        return new Product($Identifier);
    }

    public function Quote($Identifier = null): Quote
    {
        return new Quote($Identifier);
    }

    public function subscription($Identifier = null): Subscription
    {
        return new Subscription($Identifier);
    }
}