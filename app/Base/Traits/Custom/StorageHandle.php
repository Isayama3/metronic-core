<?php

namespace App\Base\Traits\Custom;

use Image;
use File;

trait StorageHandle
{
    /**
     * Create name for uploaded file
     */
    public function currentName($file)
    {
        $rand = rand(1, 1000000000) ;
        $original_name = $file->getClientOriginalName();

        $current_name = $rand.time(). '_' .$original_name;
        // $current_name =  $original_name;
        // $current_name = make_slug($current_name) ;
        // dd( $current_name );
        return $current_name;
    }

    /**
     * Saves files
     */
    public function saveFile($file, $current_name)
    {
        $filesDestination = env('pathimages','uploads') .'/files/';

        $file->move($filesDestination, $current_name);
    }

    /**
     * Save different sizes for images
     */
    public function originalImage($file, $current_name,$type="images")
    {
        // dd($file->getRealPath());
        $path = public_path("uploads/".$type);

        $originalDestination = env('pathimages','uploads').'/'.$type.'/original/';

        if(in_array($type,['images','products'])){
            move_uploaded_file($file->getPathname(), $originalDestination.$current_name);
        }else{
            Image::make($file)->save($originalDestination . $current_name);
        }

    }
    // large width =1100
    public function largeImage($file, $current_name, $width=null,$height=null,$type="images")
    {
        $largeDestination = env('pathimages','uploads').'/'.$type.'/large/';

        Image::make($file)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($largeDestination . $current_name);
    }

    // large width =600
    public function mediumImage($file, $current_name, $width=null,$height=null,$type="images")
    {
        // dd($type);
        $mediumDestination = env('pathimages','uploads').'/'.$type.'/medium/';

        Image::make($file)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($mediumDestination . $current_name);


    }

    // large width =100
    public function thumbImage($file, $current_name, $width=null,$height=null,$type="images")
    {

        $thumbnailDestination = env('pathimages','uploads').'/'.$type.'/thumbnail/';

        Image::make($file)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbnailDestination . $current_name);

    }
    public function compareImageSizes($current_name,$type="images")
    {

        $thumbnailDestination = env('pathimages','uploads').'/'.$type.'/thumbnail/'.$current_name;
        $mediumDestination = env('pathimages','uploads').'/'.$type.'/medium/'.$current_name;
        $originalDestination = env('pathimages','uploads').'/'.$type.'/original/'.$current_name;
        $thumbnailSize = filesize($thumbnailDestination);
        $mediumSize = filesize($mediumDestination);
        $originalSize = filesize($originalDestination);
        // dd($thumbnailSize.' - '.$mediumSize.' - '.$originalSize);
        if($mediumSize > $originalSize){
            copy($originalDestination, $mediumDestination);
        }
        if($thumbnailSize > $originalSize){
            copy($originalDestination, $thumbnailDestination);
        }
        $thumbnailSize = filesize($thumbnailDestination);
        $mediumSize = filesize($mediumDestination);
        $originalSize = filesize($originalDestination);
        // dd($thumbnailSize.' - '.$mediumSize.' - '.$originalSize);
        // copy('http://example.com/image.php', 'local/folder/flower.jpg');

    }


    public function images_url($image, $size,$type="images")
    {

        switch ($size) {
            case 'original':
                $location = env('pathimages','uploads').'/'.$type.'/original/'. $image;
                break;

            case 'large':
                $location = env('pathimages','uploads').'/'.$type.'/large/'. $image;
                break;

            case 'medium':
                $location = env('pathimages','uploads').'/'.$type.'/medium/'. $image;
                break;

            case 'thumbnail':
                $location = env('pathimages','uploads').'/'.$type.'/thumbnail/'. $image;
                break;

            default:
                $location = env('pathimages','uploads').'/'.$type.'/original/'. $image;
                break;
        }

        // dd( asset($location));
       if (File::exists($location)) {
            return asset($location);
        }else{
            $location = asset('img/no-image.png');
            return asset($location);
        }

    }


    /**
     * Delete files from server
     */
    public function deleteFiles($files_name)
    {
        $files_arr = [];
        if (is_array($files_name)) {
            $files_arr = $files_name;
        } else {
            $files_arr[] = $files_name;
        }

        if (!empty($files_arr)) {

            $imagesDestination = env('pathimages','uploads').'/images/';

            $filesDestination = env('pathimages','uploads').'/files/';

            $servicesDestination = env('pathimages','uploads').'/services/';

            $ordersDestination = env('pathimages','uploads').'/orders/';

            $providersDestination = env('pathimages','uploads').'/providers/';


            $directories = File::directories($imagesDestination);

            foreach(File::directories($servicesDestination) as $directory){
                $directories[] = $directory;
            }

            foreach(File::directories($ordersDestination) as $directory){
                $directories[] = $directory;
            }

            foreach(File::directories($providersDestination) as $directory){
                $directories[] = $directory;
            }



            $directories[] = $filesDestination;

            // dd($directories) ;
            //

            foreach ($directories as $directory) {

                foreach ($files_arr as $file_name) {

                    // $file = public_path() . '/' .  $directory . '/' . $file_name;
                    $file = $directory . '/' . $file_name;
                    if (File::exists($file)) {
                        File::delete($file);
                    }
                }

            }
        }
    }

    /**
     * Delete record and it's files from server
     */
    public function deleteWithFiles($files_name)
    {
        if ($files_name) {
            $this->deleteFiles($files_name);
        }

        $this->delete();
    }

    public function getTransKey($key){
        return $this->trans()->where('locale', app()->getLocale())->first()?->$key ?? '';
    }
}
