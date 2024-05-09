<?php

namespace App\Model;

class Product
{
    protected $id;
    protected $name;
    protected $description;
    protected $inStock;
    protected $category;
    protected $brand;
    protected $gallery;
    protected $prices;
    protected $attributes;

    public function __construct($id, $name, $description, $inStock, $category, $brand, $gallery, $attributes, $prices)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->inStock = $inStock;
        $this->category = $category;
        $this->brand = $brand;
        $this->gallery = $gallery;
        $this->attributes = $attributes;
        $this->prices = $prices;
        
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function isInStock()
    {
        return $this->inStock;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getGallery()
    {
        return $this->gallery;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getPrices()
    {
        return $this->prices;
    }

    // Method to convert Product object to array (for JSON serialization)
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'inStock' => $this->inStock,
            'category' => $this->category,
            'brand' => $this->brand,
            'gallery' => $this->gallery,
            'attributes' => $this->attributes,
            'prices' => $this->prices
        ];
    }
}
