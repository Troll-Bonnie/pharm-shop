<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use App\Models\Producer;
use Cart;


class ShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pagesize;

    public function mount() {
        $this->sorting = 'default';
        $this->pagesize = 8;
    }

    public function store($product_id, $product_name, $product_price){
        Cart::add($product_id, $product_name, 1, $product_price)
            ->associate('App\Models\Product');
        session()->flash('success_message', 'Товар успішно доданий до кошика');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        if ($this->sorting == 'date') {
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);    
        } else if ($this->sorting == 'price') {
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pagesize);    
        } else if ($this->sorting == 'price-desc') {
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pagesize);    
        }else if ($this->sorting == 'alph') {
            $products = Product::orderBy('name', 'ASC')->paginate($this->pagesize);    
        }else if ($this->sorting == 'alph-desc') {
            $products = Product::orderBy('name', 'DESC')->paginate($this->pagesize);    
        } else {
            $products = Product::paginate($this->pagesize);    
        }

        $categories = Category::all();
        $producers = Producer::all();



        return view('livewire.shop-component',[
            'products' => $products,
            'categories' => $categories,
            'producers' => $producers,
        ])->layout('layouts.base');
    }
}
