<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
  
    public function render()
    {   
        $products=Product::paginate(6);
        return view('livewire.admin.products.index',compact('products'));
    }
}
