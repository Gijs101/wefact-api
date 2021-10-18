<?php

namespace Media101\WeFactApi\Entities;

use Media101\WeFactApi\Exceptions\ApiException;
use Media101\WeFactApi\Traits\HasAttachments;

class Quote extends BaseEntity
{
    use HasAttachments;

    public string $controller = 'pricequote';

    /**
     * Add quote lines to quote.
     * @param array $quoteLines
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    public function addQuoteLine(array $quoteLines): self
    {
        $res = $this->request([
            'action' => 'add',
            'controller' => 'pricequoteline',
            'PriceQuoteCode' => $this->PriceQuoteCode,
            'PriceQuoteLines' => $quoteLines
        ]);

        if (!isset($res['pricequoteline']) || $res['status'] !== 'success') {
            throw new ApiException($res);
        }

        $this->set($res[$this->controller]);

        return $this;
    }

    /**
     * Remove quote lines from quote.
     * @param array $quoteLines
     * @return \Media101\WeFactApi\Entities\Quote
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    public function removeQuoteLine(array $quoteLines): Quote
    {
        $res = $this->request([
            'action' => 'delete',
            'controller' => 'pricequoteline',
            'PriceQuoteCode' => $this->PriceQuoteCode,
            'PriceQuoteLines' => $quoteLines
        ]);

        if (!isset($res['pricequoteline']) || $res['status'] !== 'success') {
            throw new ApiException($res);
        }

        $this->set($res[$this->controller]);

        return $this;
    }
}