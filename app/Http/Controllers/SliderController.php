<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;



class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['id'] = $request->id;
        $data['slider']=Slider::get();
        //echo"<pre>"; print_r($data); die;
        return view('restaurant.slider',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'slider_image' => 'required',
            'slider_title' => 'required',
            'slider_button_text' => 'required',
            'slider_button_link' => 'required',
        ]);
          //echo $request->hasFile('slider_image');die;
          if ($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $imageName = time() . 'p.' . $file->extension();
            $file->move(public_path('/uploads'), $imageName);
            $request['slider_image'] = $imageName;
        }
        Slider::create($request->all());
        return redirect()->back()->with('success', trans('layout.message.slider_created'));


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
