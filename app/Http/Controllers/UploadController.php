<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Crypt;
use App\Models\Upload;
use Carbon\Carbon;
use DB;
use Storage;
use File;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Upload::all();

        return view('upload.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = $request->file('image'); // get file input
        $base64 =  base64_encode(file_get_contents($filename)); //base64_encode (read file)
        $file_upload = base64_encode($filename); // base64 encode file name
        $ebase = encrypt($base64); // Encrypt Base64

        // print_r($ebase);
        // echo "<hr/>";
        // print_r(decrypt($ebase));
        // exit();

        Storage::disk('public')->put('upload/'.$file_upload, $ebase);

        Upload::create([
            'title' => $request->title,
            'image' => $file_upload,
        ]);

        return redirect()->route('upload.index')->with('message', 'Image has been Created Successfully');
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
        $data = Upload::find($id);
        return view('upload.edit', compact('data'));
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
        $fileImg = '';

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $data = Upload::where('id', $id)->first(['image']);

        if($request->hasFile('image')){

            if($data->image){
                Storage::disk('public')->delete($data->image);
            }

            $fileImg = Crypt::encryptString($request->file('image')->store('upload', 'public'));
        }
        else{
            $fileImg = Crypt::encryptString($data->image);
        }

        Upload::where('id', $id)->update([
            'title' => $request->title,
            'updated_at' => Now(),
            'image' => $fileImg,
        ]);

        return redirect()->route('upload.index')->with('message', 'Image has been Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Upload::where('id', $id)->first(['image']);
        File::delete('storage/'.$data->image);
        Upload::where('id',$id)->delete();

        return redirect()->route('upload.index')->with('message', 'Image has been deleted Successfully');
    }
}
