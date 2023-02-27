<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $deleteId="";
    public function render()
    {
        $category=Category::paginate(2);
        return view('livewire.admin.category.index',compact('category'));
    }
    public function delete($id)
    {
        $this->deleteId=$id;
    }
    public function destroy()
    {
        $category=Category::find($this->deleteId);
        $path='admin/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('status','Category Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
}
