<?php

namespace Media101\WeFactApi;

use Media101\WeFactApi\Entities\CreditInvoice;
use Media101\WeFactApi\Entities\Creditor;
use Media101\WeFactApi\Entities\Debtor;
use Media101\WeFactApi\Entities\DomainContact;
use Media101\WeFactApi\Entities\Group;
use Media101\WeFactApi\Entities\Hosting;
use Media101\WeFactApi\Entities\Invoice;
use Media101\WeFactApi\Entities\Product;
use Media101\WeFactApi\Entities\Quote;
use Media101\WeFactApi\Entities\Service;
use Media101\WeFactApi\Entities\Ssl;
use Media101\WeFactApi\Entities\Subscription;
use Media101\WeFactApi\Entities\Ticket;
use Media101\WeFactApi\Entities\Vps;

class HostFact
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \JsonException
     */
    public static function creditor(int $Identifier = null): Creditor
    {
        return new Creditor($Identifier);
    }

    /**
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public static function creditInvoice(int $Identifier = null): CreditInvoice
    {
        return new CreditInvoice($Identifier);
    }

    /**
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public static function debtor(int $Identifier = null): Debtor
    {
        return new Debtor($Identifier);
    }

    /**
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public static function domainContact(int $Identifier = null): DomainContact
    {
        return new DomainContact($Identifier);
    }

    /**
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public static function group(int $Identifier = null): Group
    {
        return new Group($Identifier);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \JsonException
     */
    public static function hosting(int $Identifier = null): Hosting
    {
        return new Hosting($Identifier);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \JsonException
     */
    public static function invoice(int $Identifier = null): Invoice
    {
        return new Invoice($Identifier);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \JsonException
     */
    public static function product(int $Identifier = null): Product
    {
        return new Product($Identifier);
    }

    /**
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public static function quote(int $Identifier = null): Quote
    {
        return new Quote($Identifier);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \JsonException
     */
    public static function service(int $Identifier = null): Service
    {
        return new Service($Identifier);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \JsonException
     */
    public static function ssl(int $Identifier = null): Ssl
    {
        return new Ssl($Identifier);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \JsonException
     */
    public static function subscription(int $Identifier = null): Subscription
    {
        return new Subscription($Identifier);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \JsonException
     */
    public static function ticket(int $Identifier = null): Ticket
    {
        return new Ticket($Identifier);
    }

    /**
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public static function vps(int $Identifier = null): Vps
    {
        return new Vps($Identifier);
    }
}