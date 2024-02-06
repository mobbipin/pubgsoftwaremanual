<?php

// namespace App\custom;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use \App\Custom\ImageGrid;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;



class ImageGridController extends Controller
{
    //
    public function demoGrid()
    {
        return view('welcome');
        // open an image file
        // $image = 'data:image/jpg;base64,UklGRlIFAABXRUJQVlA4IEYFAAAQHACdASpPAHkAPlEQlEojkdHMYDgFBLIAZqA25eJVGRUWLtSnk7iTzHecd0SXUx8+t+zLWt8WJpEWrTTvLe9y9CX9VSAw3YOVEdn4oGm0ZIrnQUIJ7VsI/r+aW0VOJeFoJylth8MmFQHlbPEklNUVbgyVJnINmgXnDbtgj9paOvkDYnVAdv2ErJONHxXyp2eyn7mB6vcVu9AfWuUtDlYxhQG1CEongtTYR0U4jQIbXYTTzN/3G5cAEd0FmVN272q9XHtEAeWzrMHHsZ7YPtpmppalPe8BvhnrwSA+ctaG9iQ6b7pEVBVPAAD+/uy97OjEKfy53WiZp+vshoaLbmP0cVKb4k6hnKsxJdcP+CgaRYQkOjb4FGLJO55Q/c+afu5UzMOW3Tx4pq6YezZD8PSoPz4zk6GAAEL9XDf3c3RwQKG1r2lWKnBonjqCV8/oU/xr4Gv59yLHfFPfneUb6BrG9yoc40NAk+xGkgtKGsIDDanX+uuhaKWGntbgweNVylzqaIqZrCMYGgfkbTo+yPQ0JgHev/+hCnqRe4cEi4VfveeAi+7wBLg2w4tZOj0d7O7gJM6Zj9uaLB6l/3xyvdHwzThmi8na5GMB/v+Y7YAIYCGOV62mQ6XSrBMQHKUoPvIVwUeHVkJFWnUCt6S7yOMa9RkZxe8//Bphx4NhJ/dXc3x7HQESKmLUu8nofAJKiyg7v46s90BuZWpbVYysGbdPR9Shc9nqgYoEazEu+ik00Mr+VLM+/lS8aCumf4on0FkZ/Dn4SGJSU8pc02nt7ncW0e0XwVKx9DE8RfVww8GDv33+1ib7qkv1gsaGBdn60MpW2PzyI1ZDReCh25f4z4RsG91nEpjDr4MmVOaW40nXwNnAfuYawSt+b05IQx9GGw0seGFDJ4hbb+tTatszMiOSjhQ9HsO19t/hVFojVco/cKoG9XUSorPouBOqFqDrciO3+BVFFo5l5JW3Ka0ZtamSCrzt1AUzOndTy82imvJ+NZ1D+iXF92d3XITYsveniLVxEjp+pQIp8pXJ3p3DuFQPxzuQ44E3xWcPimJ7wuJnIrIm8jyFaM4AHJ1OBc/BG+0iP5zUHWl36LGK5VpoDkw34T+sQs9s0gOpG+tNM0uaKmwmONjo2L0tFqaiC4V4aHLO3JqptxoxSjn3BQVG5x/ga/7bz/hqeycRIoGrTuIqKAdCVVrYLEgr39NID+sKzK6BYzr8j9r3JMPZ3+2T09lEwe0u+S7B4wI3rlSz5L3DZspwtfkWcGtZpUCRqgOiWnFnpdIlor1+zvQK2ksDUpf0UbyRW/c59RQIfouYA6cKJUxsQzPPL5yvuIprzjZLY2HRkKFbemgUbPH1nxw28qtf2EixENC3uGus24PjYW8Jz/G5kZ2ioG2UXp00Aru2Z1Hk4AB0G2RPAzhdp1WQEnbqXb5a35eSSv5SGUYQbRDbaQNnyeODfb80a056/Cz7wmTtn5xvWT1UhTg7J/9J/4cCoBkweCOc1exDC4bBpdmwNyB82TfMOL+HcsO/UR1EDkEBdEl2HLQOA2mSntOQ3dTgMQX/71+MtpetptbThjL/fnRMMfVnpovAe2jd4SXx+s8fMNJXcEkO9ZKxIWFH0EwLvzIp8SPc5z+AzLEwfn4aBvVL835u4BsodI+usLpWnlC7Xdz6JMVxKivRpoWgrcIsAF91564sRuvXd3rwozLc0Fb/at7P3B3B5Jc7wPXQ/CH5Y6Thjn0W8zAWnd3VwwB3ZS/Uv/ubq8H7W9He6fvg6Ib/101yfwV8xpmLHwZGmXWgAAAAAAA=';
        // $base = base64_decode('https://cdn.discordapp.com/attachments/926655390857461801/962875384850972722/unknown.png');
        // $image = imagecreatefromwebp($base);
        // $img = Image::make($image);

        // // now you are able to resize the instance
        // $img->resize(3200, 2400);

        // // and insert a watermark for example
        // $img->insert('watermark.png');

        // // finally we save the image as a new file
        // $img->save('bar.jpg');
        // $img = Image::make('public/img.jpg')->resize(320, 240)->save('public/test.jpg');
        // $img = Image::make(public_path('img.jpg'))->resize(320, 240)->insert('test.jpg');
        // dd('test');
        // $imageGrid = new imageGrid(800, 400, 12, 2);
        // $base = base64_decode('https://www.google.com/url?sa=i&url=https%3A%2F%2Fpixabay.com%2Fimages%2Fsearch%2Fhills%2F&psig=AOvVaw2OPGblggqY9dyNZ5xZWdrl&ust=1653973750396000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCNia3sC6hvgCFQAAAAAdAAAAABAD');
        // $img = Image::make($base);

        // // now you are able to resize the instance
        // $img->resize(320, 240);

        // // and insert a watermark for example
        // $img->insert('https://www.google.com/url?sa=i&url=https%3A%2F%2Fpixabay.com%2Fimages%2Fsearch%2Ftree%2520of%2520life%2F&psig=AOvVaw2OPGblggqY9dyNZ5xZWdrl&ust=1653973750396000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCNia3sC6hvgCFQAAAAAdAAAAABAJ');

        // // finally we save the image as a new file
        // $img->save('https://www.google.com/url?sa=i&url=https%3A%2F%2Funsplash.com%2Fs%2Fphotos%2Fview&psig=AOvVaw2OPGblggqY9dyNZ5xZWdrl&ust=1653973750396000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCNia3sC6hvgCFQAAAAAdAAAAABAO');

        // $blue = imagecreatefrompng(asset('\demo_images\cat-1.jpg'));
        // $imageGrid->putImage($blue, 6, 2, 0, 0);
        // imagedestroy($blue);

        // $green = imagecreatefrompng("cheers_green.png");
        // $imageGrid->putImage($green, 2, 1, 6, 0);
        // imagedestroy($green);

        // $red = imagecreatefrompng("cheers_red.png");
        // $imageGrid->putImage($red, 2, 1, 8, 0);
        // imagedestroy($red);

        // $yellow = imagecreatefrompng("cheers_yellow.png");
        // $imageGrid->putImage($yellow, 2, 1, 10, 0);
        // imagedestroy($yellow);

        // $purple = imagecreatefrompng("cheers_purple.png");
        // $imageGrid->putImage($purple, 3, 1, 6, 1);
        // imagedestroy($purple);

        // $cyan = imagecreatefrompng("cheers_cyan.png");
        // $imageGrid->putImage($cyan, 3, 1, 9, 1);
        // imagedestroy($cyan);

        // $imageGrid->display();
        // dd('test');
        // $imageGrid = new ImageGrid(500, 600, 10, 10);
        // $imageGrid->demoGrid();
        // $imageGrid->display();

        // $black = imagecolorallocate($this->image, 0, 0, 0);
        // imagesetthickness($this->image, 3);
        // $cellWidth = ($this->realWidth - 1) / $this->gridWidth;   // note: -1 to avoid writting
        // $cellHeight = ($this->realHeight - 1) / $this->gridHeight; // a pixel outside the image
        // for ($x = 0; ($x <= $this->gridWidth); $x++) {
        //     for ($y = 0; ($y <= $this->gridHeight); $y++) {
        //         imageline($this->image, ($x * $cellWidth), 0, ($x * $cellWidth), $this->realHeight, $black);
        //         imageline($this->image, 0, ($y * $cellHeight), $this->realWidth, ($y * $cellHeight), $black);
        //     }
        // }
    }
}