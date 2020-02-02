<?php
namespace App\Http\Models;

class Books {

    public $isbn;
    public $title;
    public $price;
    public $type;
    public $authors;
    public $discount;

    public function set($data) {
        foreach ($data as $key => $value) $this->{$key} = $value;
    }

    public function getDiscountPrice() {
        return $this->price - ($this->price * $this->discount) / 100;
    }

    public function output() {
        
        $this->discountPrice = number_format((float)($this->getDiscountPrice()), 2, '.', '');
        $this->price = number_format((float)($this->price), 2, '.', '');

        return $this;
    }

}