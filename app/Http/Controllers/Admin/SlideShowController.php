<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSlideShowRequest;
use App\Models\SlideShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SlideShowController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('admin.slideshow.add', [
            'title' => 'Add Slide',
        ]);
    }

    public function store(Request $request)
    {
        try{
            SlideShow::create([
                'name' => (string)$request->input('name'),
                'url' => (string)$request->input('url'),
                'image_slide' => (string)$request->input('image_slide'),
                'status' => (string)$request->input('status')
            ]);

            Session::flash('success', 'Complete Create Slide Show New');
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect()->back();
    }

    public function list()
{
    $slideshows = SlideShow::withTrashed()->orderByDesc('id')->get();

    return view('admin.slideshow.list', [
        'title' => 'List Slide',
        'slideshows' => $slideshows,
    ]);
}


    public function edit(SlideShow $slideshow)
    {
        return view('admin.slideshow.edit', [
            'title' => 'Edit Slide: ' . $slideshow->name,
            'slideshow' => $slideshow
        ]);
    }

    public function update(UpdateSlideShowRequest $request, SlideShow $slideshow)
    {
        $this->validate($request, [
            'name' => 'required',
            'image_slide' => 'required',
            'url'  => 'required'
        ]);

    try {
        $slideshow->name = $request->input('name');
        $slideshow->url = $request->input('url');
        $slideshow->image_slide = $request->input('image_slide');
        $slideshow->status = $request->input('status');


        $slideshow->save();
        Session::flash('success', 'Complete Update Slide');
    } catch (\Exception $err) {
        Session::flash('error', 'Error Update Slide');
        Log::info($err->getMessage());
        return redirect()->back()->withInput();
    }

    return redirect('/admin/slideshows/list');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');

        $slideshow = SlideShow::find($id);

        if($slideshow)
        {
            if($slideshow->delete()){
                return response()->json([
                    'error' => false,
                    'message' => 'Complete Delete'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed to Delete'
                ]);
            }
        }

        return response()->json([
            'error' => true,
            'message' => 'slide show not found'
        ]);
    }
}


