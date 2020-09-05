<?php


namespace App\Services;


class ImgResize
{
    //функция создания миниатюры
    static public function ImgCopy($source,$W,$H,$rgb = [])
    {
        //$source - файл вихідного зображення
        //$dest -   файл підготовленого зображення
        if($source==null || !file_exists($source))
            return 'images/uploads/images.jpg';

        if(file_exists($source))
        {
            $ar=explode(".",$source);
            $dest=$ar[0]."_".$W."x".$H.".".$ar[1];
//            dd($dest);
            if(!file_exists($dest))
            {
                $info = getimagesize($source);
                $w=$info[0];
                $h=$info[1];

                $stype = explode(".", $source);
                $stype = $stype[count($stype)-1];

                $size = getimagesize($source);
//        dd($size);
                $w = $size[0];    // Ширина исходного изображения
                $h = $size[1];    // Высота исходного изображения

                $simg='';

                switch($stype)
                {
                    case 'gif': $simg = imagecreatefromgif($source); break;
                    case 'jpg': $simg = imagecreatefromjpeg($source);break;
                    case 'png': $simg = imagecreatefrompng($source); break;
                    case 'GIF': $simg = imagecreatefromgif($source); break;
                    case 'JPG': $simg = imagecreatefromjpeg($source);break;
                    case 'PNG': $simg = imagecreatefrompng($source); break;
                }

                $dimg = imagecreatetruecolor($W, $H);

                $r=180;
                $g=180;
                $b=180;

                if(count($rgb)>0) {$r=$rgb[0]; $g=$rgb[1];$b=$rgb[2];}

                $background_color = imagecolorallocate($dimg, $r, $g, $b);
                imagefill($dimg, 0, 0, $background_color);

                $k=1;$wn=1;$hn=1;
                if($w>$h){
                    $k=$w/$W;
                    $wn=$W;
                    if($k>0)$hn=$h/$k;
                }
                else
                {
                    $k=$h/$H;
                    $hn=$H;
                    if($k>0)$wn=$w/$k;
                }
                if($wn>$W) { $wn=$W; $hn=$W/$w*$h;}
                if($hn>$H) { $hn=$H; $wn=$H/$h*$w;}
                $x=abs($W-$wn)/2;
                $y=abs($H-$hn)/2;

                if($simg)
                {
                    imagecopyresampled($dimg,$simg,$x,$y,0,0,$wn,$hn,$w,$h);
                    imagejpeg($dimg,$dest,100);
//                    unlink($source);
                }
            }
            return $dest;
        }
    }

    //функция создания миниатюры
    static public function ImgCopySquare($source,$A,$rgb = [])
    {
        //$source - файл вихідного зображення
        //$dest -   файл підготовленого зображення
        if($source==null || !file_exists($source))
            return 'images/uploads/images.jpg';

        if(file_exists($source))
        {
            $ar=explode(".",$source);
            $dest=$ar[0]."_square(".$A."x".$A.").".$ar[1];
//            dd($dest);
            if(!file_exists($dest))
            {
                $info = getimagesize($source);
                $w=$info[0];
                $h=$info[1];

                $stype = explode(".", $source);
                $stype = $stype[count($stype)-1];

                $size = getimagesize($source);
//        dd($size);
                $w = $size[0];    // Ширина исходного изображения
                $h = $size[1];    // Высота исходного изображения

                $simg='';

                switch($stype)
                {
                    case 'gif': $simg = imagecreatefromgif($source); break;
                    case 'jpg': $simg = imagecreatefromjpeg($source);break;
                    case 'png': $simg = imagecreatefrompng($source); break;
                    case 'GIF': $simg = imagecreatefromgif($source); break;
                    case 'JPG': $simg = imagecreatefromjpeg($source);break;
                    case 'PNG': $simg = imagecreatefrompng($source); break;
                }

                $square = min($w,$h);
                $dimg = imagecreatetruecolor($A, $A);

                $r=180;
                $g=180;
                $b=180;
                if(count($rgb)>0) {$r=$rgb[0]; $g=$rgb[1];$b=$rgb[2];}

                $background_color = imagecolorallocate($dimg, $r, $g, $b);
                imagefill($dimg, 0, 0, $background_color);

                if($w>$h){
                    $x=($w-$h)/2;
                    $y=0;
                }else {
                    $y=($h-$w)/2;
                    $x=0;
                }

                if($simg)
                {
                    imagecopyresampled($dimg,$simg,0,0,$x,$y,$A,$A,$square,$square);
                    imagejpeg($dimg,$dest,100);
//                    unlink($source);
                }
            }
            return $dest;
        }
    }

    //функция создания миниатюры
    static public function ImgCopy_3($source,$W,$H,$rgb = [])
    {
        //$source - файл вихідного зображення
        //$dest -   файл підготовленого зображення
        if($source==null || !file_exists($source))
            return 'images/uploads/images.jpg';

        if(file_exists($source))
        {
            $ar=explode(".",$source);
            $dest=$ar[0]."_3_(".$W."x".$H.")n.".$ar[1];

            if(!file_exists($dest))
            {
                $info = getimagesize($source);
                $w=$info[0];
                $h=$info[1];

                $stype = explode(".", $source);
                $stype = $stype[count($stype)-1];

                $size = getimagesize($source);
//        dd($size);
                $w = $size[0];    // Ширина исходного изображения
                $h = $size[1];    // Высота исходного изображения

                $simg='';

                switch($stype)
                {
                    case 'gif': $simg = imagecreatefromgif($source); break;
                    case 'jpg': $simg = imagecreatefromjpeg($source);break;
                    case 'png': $simg = imagecreatefrompng($source); break;
                    case 'GIF': $simg = imagecreatefromgif($source); break;
                    case 'JPG': $simg = imagecreatefromjpeg($source);break;
                    case 'PNG': $simg = imagecreatefrompng($source); break;
                }

                $len = min($w,$h);

                $k=1;
                if($w<=$h){
                    $k=$W/$len;
                }
                else $k=$H/$len;

                $newW = $W/$k;
                $newH = $H/$k;

//                dd($newW,$newH);

                $dimg = imagecreatetruecolor($W, $H);

                $r=255;
                $g=255;
                $b=255;
                if(count($rgb)>0) {$r=$rgb[0]; $g=$rgb[1];$b=$rgb[2];}

                $background_color = imagecolorallocate($dimg, $r, $g, $b);
                imagefill($dimg, 0, 0, $background_color);

//                if($w<$h){
//                    $y=($h-$newH)/2;
//                    $x=0;
////                    dd($y);
//                }else {
//                    $x=($w-$newW)/2;
//                    $y=0;
//                }
                $x=0;
                $y=0;
//dd($x,$y);
                if($simg)
                {
                    imagecopyresampled($dimg,$simg,0,0,$x,$y,$W,$H,$newW,$newH);
                    imagejpeg($dimg,$dest,100);
//                    unlink($source);
                }
            }
            return $dest;
        }
    }
}

