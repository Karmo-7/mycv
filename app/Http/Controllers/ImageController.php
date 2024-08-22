<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Requests\UpImageRequest;
use App\Models\Image;
use Illuminate\Auth\Events\Validated;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;








class ImageController extends Controller
{
   public function addimage (ImageRequest $request,Image $image){
        $validate=$request->validated();
        if($validate){
            if($request->hasFile('image')){
                $filepath=$request->file('image')->store('images','public');
                $validate['image_path']=$filepath;
                $newimage = $image->create($validate);
                $imageurl=asset('storage/'.$filepath);
                return response()->json(['image' => $newimage,
                 'url'=>$imageurl],200);
            }else{
                return response()->json(['error' => 'No image file found'], 400);
            }
        }
        return response()->json(['error' => $validate->errors()],400);
    }

    public function updateimage(UpImageRequest $request, Image $image, $id)
{
    $image = Image::find($id);
    if (!$image) {
        return response()->json(['error' => 'Image not found'], 404);
    }

    $validatedData = $request->validated();

    if ($request->hasFile('image')) {
        if ($image->image_path && \Storage::disk('public')->exists($image->image_path)) {
            \Storage::disk('public')->delete($image->image_path);
        }

        $filePath = $request->file('image')->store('images', 'public');
        $validatedData['image_path'] = $filePath;
    }

    $image->update($validatedData);
    $imageUrl = asset('storage/' . $filePath);

    return response()->json([
        'image' => $image,
        'url' => $imageUrl,
    ], 200);
}

   public function showimage($id){

        $image = Image::with('Sport')->find($id);

        if (!$image) return response()->json(['error' => 'image not found'],404);
        else{
            return response()->json(['image' => $image],200);
        }
    }

    public function Allimage(){
        $image=Image::with('Sport')->get();
        return response()->json(['Images' => $image],200);
    }

    public function Allimagefs($id){
        $images=Image::with('Sport')->where('sports_id',$id)->get();

        if (!$images) return response()->json(['error' => ' not found any images'],404);
        else{
            return response()->json(['image' => $images],200);
        }
    }
    public function delelteimage($id){
        $image=Image::find($id);
        if(!$image){
            if (!$image) return response()->json(['error' => 'image not found'],404);
        }
        $image->delete();
            return response()->json(['message' => 'image removed successfully'],200);
    }











}
