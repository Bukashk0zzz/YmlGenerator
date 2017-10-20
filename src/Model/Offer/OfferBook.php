<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator\Model\Offer;

/**
 * Class OfferBook
 */
class OfferBook extends AbstractOffer
{
    use OfferBookTrait;

    /**
     * @var string
     */
    private $binding;

    /**
     * @var int
     */
    private $pageExtent;

    /**
     * @return string
     */
    public function getType()
    {
        return 'book';
    }

    /**
     * @return string
     */
    public function getBinding()
    {
        return $this->binding;
    }

    /**
     * @param string $binding
     *
     * @return $this
     */
    public function setBinding($binding)
    {
        $this->binding = $binding;

        return $this;
    }

    /**
     * @return int
     */
    public function getPageExtent()
    {
        return $this->pageExtent;
    }

    /**
     * @param int $pageExtent
     *
     * @return $this
     */
    public function setPageExtent($pageExtent)
    {
        $this->pageExtent = $pageExtent;

        return $this;
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            'author' => $this->getAuthor(),
            'name' => $this->getName(),
            'publisher' => $this->getPublisher(),
            'series' => $this->getSeries(),
            'year' => $this->getYear(),
            'ISBN' => $this->getISBN(),
            'volume' => $this->getVolume(),
            'part' => $this->getPart(),
            'language' => $this->getLanguage(),
            'binding' => $this->getBinding(),
            'page_extent' => $this->getPageExtent(),
            'table_of_contents' => $this->getTableOfContents(),
        ];
    }
}
