<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::paginate(5);
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderFormRequest $request)
    {
        $validteData = $request->validated();
        $slider=Slider::create($request->except('image'));
        $slider->status = $request->status == true ? '1' : '0';
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('admin',$filename);
            $slider->image=$filename;
        }
        $slider->update();
        session()->flash('status', 'Slider successfully Inserted.');
        return redirect(route('dashboard.sliders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::findOrFail($id);
        return view('admin.sliders.update',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderFormRequest $request, $id)
    {
        $validteData = $request->validated();

        $slider=Slider::findOrFail($id);
        $slider->update($request->except('image','status'));
        $slider->status = $request->status == true ? '1' : '0';

        if($request->hasFile('image')){
            if($slider->image){
                $path='admin/'.$slider->image;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('admin',$filename);
            $slider->image=$filename;
        }
        $slider->update();
        session()->flash('status', 'Slider successfully Inserted.');
        return redirect(route('dashboard.sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::findOrFail($id);
        if($slider->image){
            $path='admin/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $slider->delete();
        session()->flash('status', 'Slider successfully Deleted.');
        return redirect(route('dashboard.sliders.index'));
    }
}
