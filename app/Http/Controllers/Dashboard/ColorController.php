<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequestForm;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors=Color::paginate(4);
        return view('admin.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequestForm $request)
    {
        $validteData=$request->validated();
        $color=Color::create($validteData);
        $color->status=$request->status==true?'1':'0';
        $color->save();
        return redirect(Route('dashboard.colors.index'))->with(['status'=>'Color Added successfully']);
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
        $color=Color::findOrFail($id);
        return view('admin.color.update',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $color=Color::findOrFail($id);
        $color->update($request->except('status'));
        $color->status=$request->status==true?'1':'0';
        $color->update();
        return redirect(Route('dashboard.colors.index'))->with(['status'=>'Color Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color=Color::findOrFail($id);
        $color->delete();
        session()->flash('status', 'Color successfully Deleted.');
        return redirect()->back();
    }
    public function updateColorQty(Request $request)
    {
        $productColorData=Product::findOrFail($request->get('product_id'));
        $productColorData->colors()->updateExistingPivot($request->get('prod_color_id'), array('color_quantity' => $request->get('qty')), false);
        return response()->json(['msg'=>'Successfully Updated...!']);
    }
    public function deleteColor(Request $request)
    {
        $productColorData=Product::findOrFail($request->get('product_id'));
                         
        $productColorData->colors()->detach($request->get('prod_color_id'));
        return response()->json(['msg'=>'Successfully Deleted...!']);
    }
}
