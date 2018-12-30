<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQt = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQt = $oldCart->totalQt;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id) {
        $storedItem = ['qt' => 0, 'price' => $item->preco, 'item' => $item];
        if($this->items) {
            if(array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qt']++;
        $storedItem['price'] = $item->preco * $storedItem['qt'];
        $this->items[$id] = $storedItem;
        $this->totalQt++;
        $this->totalPrice += $item->preco;
    }
}
