<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Price;

class PriceTest extends TestCase
{
    public function testAll()
    {
        $change = (float) rand(1, 100);
        $withVat = rand(1, 100);
        $withVatCzk = rand(1, 100);
        $withVatEur = rand(1, 100);
        $retailPriceCzk = rand(1, 100);
        $vatRate = rand(1, 100);
        $currency = uniqid();
        $vatReclaimable = rand(1, 10) > 5;
        $price = new Price($withVat, $currency, $withVatCzk, $withVatEur);
        $price->setChange($change);
        $price->setVatReclaimable($vatReclaimable);
        $price->setRetailPriceCzk($retailPriceCzk);
        $price->setVatRate($vatRate);
        $this->assertSame($change, $price->getChange());
        $this->assertSame($withVat, $price->getWithVat());
        $this->assertSame($withVatCzk, $price->getWithVatCzk());
        $this->assertSame($withVatEur, $price->getWithVatEur());
        $this->assertSame($retailPriceCzk, $price->getRetailPriceCzk());
        $data = [
            'change' => $price->getChange(),
            'withVat' => $price->getWithVat(),
            'withVatCzk' => $price->getWithVatCzk(),
            'withVatEur' => $price->getWithVatEur(),
            'retailPriceCzk' => $price->getRetailPriceCzk(),
            'vatRate' => $price->getVatRate(),
            'vatReclaimable' => $price->isVatReclaimable(),
            'currency' => $price->getCurrency(),
        ];
        $this->assertSame($data, $price->toArray());
    }
}
