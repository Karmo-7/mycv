<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpvideoRequest;
use App\Http\Requests\videoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

   public function addvideo (videoRequest $request,Video $video){
        $validate=$request->validated();
        if($validate){
            if($request->hasFile('video')){
                $filepath=$request->file('video')->store('videos','public');
                $validate['video_path']=$filepath;
                $newvideo = $video->create($validate);
                $videourl=asset('storage/'.$filepath);
                return response()->json(['video' => $newvideo,
                 'url'=>$videourl],200);
            }else{
                return response()->json(['error' => 'No video file found'], 400);
            }
        }
        return response()->json(['error' => $validate->errors()],400);
    }

   public function updatevideo(UpvideoRequest $request, Video $video, $id)
{
    $video = Video::find($id);
    if (!$video) {
        return response()->json(['error' => 'Video not found'], 404);
    }

    $validatedData = $request->validated();

    $filePath = null;

    if ($request->hasFile('video')) {
        // Delete the old video file if it exists
        if ($video->video_path && \Storage::disk('public')->exists($video->video_path)) {
            \Storage::disk('public')->delete($video->video_path);
        }

        // Store the new video file
        $filePath = $request->file('video')->store('videos', 'public');
        $validatedData['video_path'] = $filePath;
    }

    // Update the video record in the database
    $video->update($validatedData);

    // Generate the URL only if $filePath is not null
    $videoUrl = $filePath ? asset('storage/' . $filePath) : asset('storage/' . $video->video_path);

    return response()->json([
        'video' => $video,
        'url' => $videoUrl,
    ], 200);
}


   public function showvideo($id){

        $video = Video::with('Sport')->find($id);

        if (!$video) return response()->json(['error' => 'video not found'],404);
        else{
            return response()->json(['image' => $video],200);
        }
    }

    public function Allvideo(){
        $video=Video::with('Sport')->get();
        return response()->json(['Videos' => $video],200);
    }

    public function Allvideofs($id){
        $video=Video::with('Sport')->where('sports_id',$id)->get();

        if (!$video) return response()->json(['error' => ' not found any videos'],404);
        else{
            return response()->json(['video' => $video],200);
        }
    }
    public function deleltevideo($id){
        $video=Video::find($id);
        if(!$video){
            if (!$video) return response()->json(['error' => 'video not found'],404);
        }
        $video->delete();
            return response()->json(['message' => 'video removed successfully'],200);
    }
}
