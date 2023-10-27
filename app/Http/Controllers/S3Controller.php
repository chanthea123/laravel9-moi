<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Storage;
use File;

class S3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = Storage::disk('s3')->url('images/1697528610img+(6).jpg');

        // $file = Storage::disk('s3')->File();

        dd($url);

        return view('s3upload.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pic = \Storage::disk('s3')->get('PATH_TO_FILE');

        return view('s3upload.create')->with('pic', $pic);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $imageName=time().$file->getClientOriginalName();
        $filePath = 'images/' . $imageName;

        if($request->hasfile('image'))
        {
            Storage::disk('s3')->put($filePath, file_get_contents($file));

            return redirect()->route('s3upload.index')->with('message', 'Image has been Created Successfully');
        }
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
        $path = $request->file('image')->store('images', 's3');

        Storage::disk('s3')->setVisibility($path, 'public');

        $profile->update([
            'image' =>  $path
        ]);
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
