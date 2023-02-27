<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name,$slug,$status,$brand,$category_id ,$o=2;
    public $brand_id="";
    public function rules()
    {
        return [
            'name'=>'required|string',
            'slug'=>'required|string',
            'status'=>'nullable',
            'category_id'=>'required'
        ];
    }
    public function resetInput()
    {
        $this->name=null;
        $this->slug=null;
        $this->status=null;
        $this->category_id=null;
        $this->brand_id=null;
    }
    public function storeBrand()
    {
        $validateData=$this->validate();
        // dd($this->category_id);
        Brand::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status==true ?'1':'0',
            'category_id'=>$this->category_id
        ]);
        $this->resetInput();
        session()->flash('message', 'Brand successfully Added.');
        $this->dispatchBrowserEvent('modal-close');
    }
    public function edit($id)
    {
        $brand=Brand::findOrFail($id);
        $this->brand_id=$id;
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;
        $this->category_id=$brand->category_id;
    }
    public function update(){
        $validateData=$this->validate();
        // dd($validateData);
        Brand::findOrFail($this->brand_id)->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status==true ?'1':'0',
            'category_id'=>$this->category_id
        ]);
        $this->resetInput();
        session()->flash('message', 'Brand successfully Updated.');
        $this->dispatchBrowserEvent('modal-close');
    }
    public function delete($id)
    {
        $this->brand_id=$id;
        // dd($this->brand_id);
    }
    public function destroyBrand()
    {
     
        $brand=Brand::find($this->brand_id);   
        $brand->delete();
        session()->flash('status','Brand Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $brands=Brand::orderBy('id','DESC')->paginate(5);
        $categories=Category::where('status','1')->get();
        return view('livewire.admin.brand.index',compact('brands','categories'))
        ->extends('layouts.admin')
        ->section('content');
    }
    
}
