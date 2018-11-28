<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function addSlider(){
        return view('backend.sliders.add_slider');
    }
    public function saveSlider(Request $request){
        $validate=$request->validate([
            'sliderImage' => 'required',
        ]);
        $sliderName=time();
        Slider::create([
            'slider_text' => $request->sliderText,
            'publication_status' => $request->publicationStatus,
            'slider_image' => $request->sliderImage->storeAs('/uploads/images/slider', $sliderName.'.jpg'),
        ]);
        return redirect('/slider/add')->withMessage('Slider Image Added Successfully');
    }
    public function allSlider(){
        $sliders= Slider::get();
        return view('backend.sliders.all_slider', compact('sliders'));
    }

    public function activeSlider(Slider $id){
//        $slider=Slider::findOrFail($id);
        $id->update([
            'publication_status' => 1,
        ]);
       return redirect('/slider/all')->withMessage('Slider Published.');
    }
    public function inactiveSlider(Slider $id){
//        $slider=Slider::findOrFail($id);
        $id->update([
            'publication_status' => 0,
        ]);
        return redirect('/slider/all')->withMessage('Slider Unpublished.');
    }
    public function deleteSlider($id){
        $slider=Slider::findOrFail($id);
        $slider->delete();
        return redirect('/slider/all')->withMessage('Slider Deleted');
    }

    public function editSlider($id){
        $slider=Slider::findOrFail($id);
        return view('backend.sliders.edit_slider', compact('slider'));
    }
    public function updateSlider(Request $request,$id){

        $data=Slider::findOrFail($id);
        $image=$data->slider_image;
        $isExist=$request->file('slider_image');
        $data->update([
            'slider_text'=>$request->sliderText,
        ]);
        if ($isExist) {
            $request->sliderImage->storeAs('/',$image);
        }
        
        return redirect('/slider/all')->withMessage('Slider Updated');
    }
}