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
 * Class OfferAudiobook
 */
class OfferAudiobook extends AbstractOffer
{
    use OfferBookTrait;

    /**
     * @var string
     */
    private $performedBy;

    /**
     * @var string
     */
    private $performanceType;

    /**
     * @var string
     */
    private $format;

    /**
     * @var string
     */
    private $storage;

    /**
     * @var string
     */
    private $recordingLength;

    /**
     * @return string
     */
    public function getType()
    {
        return 'audiobook';
    }

    /**
     * @return string
     */
    public function getPerformedBy()
    {
        return $this->performedBy;
    }

    /**
     * @param string $performedBy
     *
     * @return $this
     */
    public function setPerformedBy($performedBy)
    {
        $this->performedBy = $performedBy;

        return $this;
    }

    /**
     * @return string
     */
    public function getPerformanceType()
    {
        return $this->performanceType;
    }

    /**
     * @param string $performanceType
     *
     * @return $this
     */
    public function setPerformanceType($performanceType)
    {
        $this->performanceType = $performanceType;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     *
     * @return $this
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return string
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param string $storage
     *
     * @return $this
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecordingLength()
    {
        return $this->recordingLength;
    }

    /**
     * @param string $recordingLength
     *
     * @return $this
     */
    public function setRecordingLength($recordingLength)
    {
        $this->recordingLength = $recordingLength;

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
            'table_of_contents' => $this->getTableOfContents(),
            'performed_by' => $this->getPerformedBy(),
            'performance_type' => $this->getPerformanceType(),
            'storage' => $this->getStorage(),
            'format' => $this->getFormat(),
            'recording_length' => $this->getRecordingLength(),
        ];
    }
}
