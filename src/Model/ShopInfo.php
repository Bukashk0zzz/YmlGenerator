<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator\Model;

/**
 * Class ShopInfo
 */
class ShopInfo
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $platform;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $agency;

    /**
     * @var string
     */
    private $email;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'company' => $this->getCompany(),
            'url' => $this->getUrl(),
            'platform' => $this->getPlatform(),
            'version' => $this->getVersion(),
            'agency' => $this->getAgency(),
            'email' => $this->getEmail(),
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return ShopInfo
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     *
     * @return ShopInfo
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return ShopInfo
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     *
     * @return ShopInfo
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return ShopInfo
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * @param string $agency
     *
     * @return ShopInfo
     */
    public function setAgency($agency)
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return ShopInfo
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
