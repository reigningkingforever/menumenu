<?php
namespace App\Http\Traits;
use App\Media;
use Illuminate\Http\Request;

trait MediaManagementTrait
{
    protected function uploadMedia(Request $request,$mediable_id,$mediable_type){
        if($request->link){
            if(in_array(end(explode('.',$request->link)),['jpg','png','gif','jpeg']))
            $format = 'image';
            else $format = 'video';
            $this->saveToDatabase($request->link,$format,true);
        }else{
            request()->validate([
                'file' => 'required',
            ]);
            $this->processUpload($request->file('file'),$mediable_id,$mediable_type);
            // $ext = $request->file('file')->getClientOriginalExtension();
            // $format = strstr($request->file('file')->getClientMimeType(),'/',true);
            // $mediaName = rand().time().'.'.$ext;
            // // $format = explode('/',$request->file('file')->getMimeType())[0];
            // $request->file('file')->storeAs('public/'.$format.'s/',$mediaName);//save the file to public folder
            // $this->saveToDatabase($mediaName,$format,false,$mediable_id,$mediable_type);
        }
    }

    protected function multipleUpload($file,$mediable_id,$mediable_type){
        $this->processUpload($file,$mediable_id,$mediable_type);
    }

    protected function processUpload($file,$mediable_id,$mediable_type){
        $ext = $file->getClientOriginalExtension();
        $format = strstr($file->getClientMimeType(),'/',true);
        $mediaName = rand().time().'.'.$ext;
        $location = $mediable_type == 'App\Post'? 'posts': 'meals';
        $file->storeAs('public/'.$location.'/',$mediaName);//save the file to public folder
        $this->saveToDatabase($mediaName,$format,false,$mediable_id,$mediable_type);
    }

    
    
    protected function saveToDatabase($name,$format,$external,$mediable_id,$mediable_type){
        $media = new Media;
        $media->name = $name;
        $media->format = $format;
        $media->external = $external;
        $media->mediable_id = $mediable_id;
        $media->mediable_type = $mediable_type;
        $media->save();
    }
}

