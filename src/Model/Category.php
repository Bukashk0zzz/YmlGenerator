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
 * Class Category
 */
class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $parentId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     *
     * @return Category
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
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
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets list of custom attributes (Array of arrays [['name' => ?, 'value' => ?]])
     *
     * @param array $attributes
     *
     * @return Category
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @param string $attributeName
     * @param mixed  $value
     *
     * @return Category
     */
    public function pushAttribute($attributeName, $value)
    {
        $this->attributes[] = ['name' => $attributeName, 'value' => $value];

        return $this;
    }
}
