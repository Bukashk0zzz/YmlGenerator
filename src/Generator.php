<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator;

use Bukashk0zzz\YmlGenerator\Model\Category;
use Bukashk0zzz\YmlGenerator\Model\Currency;
use Bukashk0zzz\YmlGenerator\Model\Delivery;
use Bukashk0zzz\YmlGenerator\Model\Offer\OfferCondition;
use Bukashk0zzz\YmlGenerator\Model\Offer\OfferGroupAwareInterface;
use Bukashk0zzz\YmlGenerator\Model\Offer\OfferInterface;
use Bukashk0zzz\YmlGenerator\Model\Offer\OfferParam;
use Bukashk0zzz\YmlGenerator\Model\ShopInfo;

/**
 * Class Generator
 */
class Generator
{
    /**
     * @var string
     */
    protected $tmpFile;

    /**
     * @var \XMLWriter
     */
    protected $writer;

    /**
     * @var Settings
     */
    protected $settings;

    /**
     * Generator constructor.
     *
     * @param Settings $settings
     */
    public function __construct($settings = null)
    {
        $this->settings = $settings instanceof Settings ? $settings : new Settings();
        $this->writer = new \XMLWriter();

        if ($this->settings->getOutputFile() !== null && $this->settings->getReturnResultYMLString()) {
            throw new \LogicException('Only one destination need to be used ReturnResultYMLString or OutputFile');
        }

        if ($this->settings->getReturnResultYMLString()) {
            $this->writer->openMemory();
        } else {
            $this->tmpFile = $this->settings->getOutputFile() !== null ? \tempnam(\sys_get_temp_dir(), 'YMLGenerator') : 'php://output';
            $this->writer->openURI($this->tmpFile);
        }

        if ($this->settings->getIndentString()) {
            $this->writer->setIndentString($this->settings->getIndentString());
            $this->writer->setIndent(true);
        }
    }

    /**
     * @param ShopInfo $shopInfo
     * @param array    $currencies
     * @param array    $categories
     * @param array    $offers
     * @param array    $deliveries
     *
     * @return bool
     */
    public function generate(ShopInfo $shopInfo, array $currencies, array $categories, array $offers, array $deliveries = [])
    {
        try {
            $this->addHeader();

            $this->addShopInfo($shopInfo);
            $this->addCurrencies($currencies);
            $this->addCategories($categories);

            if (\count($deliveries) !== 0) {
                $this->addDeliveries($deliveries);
            }

            $this->addOffers($offers);
            $this->addFooter();

            if ($this->settings->getReturnResultYMLString()) {
                return $this->writer->flush();
            }

            if (null !== $this->settings->getOutputFile()) {
                \copy($this->tmpFile, $this->settings->getOutputFile());
                @\unlink($this->tmpFile);
            }

            return true;
        } catch (\Exception $exception) {
            throw new \RuntimeException(\sprintf('Problem with generating YML file: %s', $exception->getMessage()), 0, $exception);
        }
    }

    /**
     * Add document header
     */
    protected function addHeader()
    {
        $this->writer->startDocument('1.0', $this->settings->getEncoding());
        $this->writer->startDTD('yml_catalog', null, 'shops.dtd');
        $this->writer->endDTD();
        $this->writer->startElement('yml_catalog');
        $this->writer->writeAttribute('date', \date('Y-m-d H:i'));
        $this->writer->startElement('shop');
    }

    /**
     * Add document footer
     */
    protected function addFooter()
    {
        $this->writer->fullEndElement();
        $this->writer->fullEndElement();
        $this->writer->endDocument();
    }

    /**
     * Adds shop element data. (See https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#shop)
     *
     * @param ShopInfo $shopInfo
     */
    protected function addShopInfo(ShopInfo $shopInfo)
    {
        foreach ($shopInfo->toArray() as $name => $value) {
            if ($value !== null) {
                $this->writer->writeElement($name, $value);
            }
        }
    }

    /**
     * @param Currency $currency
     */
    protected function addCurrency(Currency $currency)
    {
        $this->writer->startElement('currency');
        $this->writer->writeAttribute('id', $currency->getId());
        $this->writer->writeAttribute('rate', $currency->getRate());
        $this->writer->endElement();
    }

    /**
     * @param Category $category
     */
    protected function addCategory(Category $category)
    {
        $this->writer->startElement('category');
        $this->writer->writeAttribute('id', $category->getId());

        if ($category->getParentId() !== null) {
            $this->writer->writeAttribute('parentId', $category->getParentId());
        }

        if (!empty($category->getAttributes())) {
            foreach ($category->getAttributes() as $attribute) {
                $this->writer->writeAttribute($attribute['name'], $attribute['value']);
            }
        }

        $this->writer->text($category->getName());
        $this->writer->fullEndElement();
    }

    /**
     * @param Delivery $delivery
     */
    protected function addDelivery(Delivery $delivery)
    {
        $this->writer->startElement('option');
        $this->writer->writeAttribute('cost', $delivery->getCost());
        $this->writer->writeAttribute('days', $delivery->getDays());
        if ($delivery->getOrderBefore() !== null) {
            $this->writer->writeAttribute('order-before', $delivery->getOrderBefore());
        }
        $this->writer->endElement();
    }

    /**
     * @param OfferInterface $offer
     */
    protected function addOffer(OfferInterface $offer)
    {
        $this->writer->startElement('offer');
        $this->writer->writeAttribute('id', $offer->getId());
        $this->writer->writeAttribute('available', $offer->isAvailable() ? 'true' : 'false');

        if ($offer->getType() !== null) {
            $this->writer->writeAttribute('type', $offer->getType());
        }

        if ($offer instanceof OfferGroupAwareInterface && $offer->getGroupId() !== null) {
            $this->writer->writeAttribute('group_id', $offer->getGroupId());
        }

        foreach ($offer->toArray() as $name => $value) {
            if (\is_array($value)) {
                foreach ($value as $itemValue) {
                    $this->addOfferElement($name, $itemValue);
                }
            } else {
                $this->addOfferElement($name, $value);
            }
        }
        $this->addOfferParams($offer);
        $this->addOfferDeliveryOptions($offer);
        $this->addOfferCondition($offer);

        $this->writer->fullEndElement();
    }

    /**
     * Adds <currencies> element. (See https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#currencies)
     *
     * @param array $currencies
     */
    private function addCurrencies(array $currencies)
    {
        $this->writer->startElement('currencies');

        /** @var Currency $currency */
        foreach ($currencies as $currency) {
            if ($currency instanceof Currency) {
                $this->addCurrency($currency);
            }
        }

        $this->writer->fullEndElement();
    }

    /**
     * Adds <categories> element. (See https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#categories)
     *
     * @param array $categories
     */
    private function addCategories(array $categories)
    {
        $this->writer->startElement('categories');

        /** @var Category $category */
        foreach ($categories as $category) {
            if ($category instanceof Category) {
                $this->addCategory($category);
            }
        }

        $this->writer->fullEndElement();
    }

    /**
     * Adds <delivery-option> element. (See https://yandex.ru/support/partnermarket/elements/delivery-options.xml)
     *
     * @param array $deliveries
     */
    private function addDeliveries(array $deliveries)
    {
        $this->writer->startElement('delivery-options');

        /** @var Delivery $delivery */
        foreach ($deliveries as $delivery) {
            if ($delivery instanceof Delivery) {
                $this->addDelivery($delivery);
            }
        }

        $this->writer->fullEndElement();
    }

    /**
     * Adds <offers> element. (See https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#offers)
     *
     * @param array $offers
     */
    private function addOffers(array $offers)
    {
        $this->writer->startElement('offers');

        /** @var OfferInterface $offer */
        foreach ($offers as $offer) {
            if ($offer instanceof OfferInterface) {
                $this->addOffer($offer);
            }
        }

        $this->writer->fullEndElement();
    }

    /**
     * @param OfferInterface $offer
     */
    private function addOfferDeliveryOptions(OfferInterface $offer)
    {
        $options = $offer->getDeliveryOptions();
        if (!empty($options)) {
            $this->addDeliveries($options);
        }
    }

    /**
     * @param OfferInterface $offer
     */
    private function addOfferParams(OfferInterface $offer)
    {
        /** @var OfferParam $param */
        foreach ($offer->getParams() as $param) {
            if ($param instanceof OfferParam) {
                $this->writer->startElement('param');

                $this->writer->writeAttribute('name', $param->getName());
                if ($param->getUnit()) {
                    $this->writer->writeAttribute('unit', $param->getUnit());
                }
                $this->writer->text($param->getValue());

                $this->writer->endElement();
            }
        }
    }

    /**
     * @param OfferInterface $offer
     */
    private function addOfferCondition(OfferInterface $offer)
    {
        $params = $offer->getCondition();
        if ($params instanceof OfferCondition) {
            $this->writer->startElement('condition');
            $this->writer->writeAttribute('type', $params->getType());
            $this->writer->writeElement('reason', $params->getReasonText());
            $this->writer->endElement();
        }
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return bool
     */
    private function addOfferElement($name, $value)
    {
        if ($value === null) {
            return false;
        }

        if ($value instanceof Cdata) {
            $this->writer->startElement($name);
            $this->writer->writeCdata((string) $value);
            $this->writer->endElement();

            return true;
        }

        if (\is_bool($value)) {
            $value = $value ? 'true' : 'false';
        }
        $this->writer->writeElement($name, $value);

        return true;
    }
}
