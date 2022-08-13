<?php

namespace App\Class;

class Search
{
    /**
     * @var string
     */
    public $string = '';

    /**
     * @var array
     */
    public $categories = [];

    /**
     * Get the value of string
     *
     * @return  string
     */ 
    public function getString()
    {
        return $this->string;
    }

    /**
     * Set the value of string
     *
     * @param  string  $string
     *
     * @return  self
     */ 
    public function setString(string $string)
    {
        $this->string = $string;

        return $this;
    }

    /**
     * Get the value of categories
     *
     * @return  array
     */ 
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set the value of categories
     *
     * @param  array  $categories
     *
     * @return  self
     */ 
    public function setCategories(array $categories)
    {
        $this->categories = $categories;

        return $this;
    }
}