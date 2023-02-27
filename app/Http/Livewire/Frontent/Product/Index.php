<?php

namespace App\Http\Livewire\Frontent\Product;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandInputs = [], $priceInput;
    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price']
    ];

    // public $search;

    // protected $queryString = ['search'];
    public function mount($category)
    {
        // $this->products=$products;
        $this->category = $category;
    }
    public function render()
    {
        // if($this->brandInput){
        //     dd($this->brandInput);
        // }
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brandInputs, function ($q) {
                $q->whereIn('brand', $this->brandInputs);
            })
            ->when($this->priceInput, function ($q) {
                $q->when($this->priceInput == 'highToLaw', function ($q2) {
                    $q2->orderby('selling_price', 'DESC');
                })->when($this->priceInput == 'lawToHigh', function ($q2) {
                    $q2->orderby('selling_price', 'ASC');
                });
            })
            ->where('status','1')
            ->get();
        return view('livewire.frontent.product.index', ['products' => $this->products, 'category' => $this->category]);
    }
}
