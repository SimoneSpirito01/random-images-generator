<?php

set_time_limit(0);

$quantity = $_POST['quantity'];

$dirPath = explode('/', getcwd());
$dir = $dirPath[count($dirPath) - 1];

if (!empty($_COOKIE['TestCookie'])) {
    $images = json_decode($_COOKIE['TestCookie'], true);
    for ($i = 0; $i < $quantity; $i++) {
        createimageinstantly($images, $i, $dir);
    }
    setcookie('TestCookie', "", time() - 3600);
} else {
    header("Location: index.php?no-images-uploaded");
}




function createimageinstantly($array, $i, $dir)
{
    $x = $y = 1000;
    $targetFolder = "/{$dir}/test/";
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    $myImages = [];
    $iter = (count($array) / 2) - 4;

    // for ($i = 0; $i < $iter; $i++) {
    //     $random = rand(0, 1);
    //     ($random) ? $item = $array[$i] : $item = $array[$i + (count($array) / 2)];
    //     $myImages[] = imagecreatefrompng($item);
    // }

    // for ($i = 0; $i < 2; $i++) {
    //     $random = rand(0, 1);
    //     ($random) ? $item = $array[$i + $iter] : $item = $array[$i + $iter + (count($array) / 2)];
    //     $myImages[] = imagecreatefrompng($item);
    // }

    for ($i = 0; $i < count($array) / 2; $i++) {
        $random = rand(0, 1);
        if ($i < $iter) {
            ($random) ? $item = $array[$i] : $item = $array[$i + (count($array) / 2)];
        } else {
            $random2 = rand(0, 3);
            ($random) ? $item = $array[$iter + $random2] : $item = $array[$iter + $random2 + (count($array) / 2)];
        }
        $myImages[] = imagecreatefrompng($item);
    }


    // (rand(0, 1) == 0) ? $img1 = $array[0] : $img1 = $array[9];
    // (rand(0, 1) == 0) ? $img2 = $array[1] : $img2 = $array[10];
    // (rand(0, 1) == 0) ? $img3 = $array[2] : $img3 = $array[11];
    // (rand(0, 1) == 0) ? $img4 = $array[3] : $img4 = $array[12];
    // (rand(0, 1) == 0) ? $img5 = $array[4] : $img5 = $array[13];

    // $random = rand(1, 4);

    // switch ($random) {
    //     case 1:
    //         (rand(0, 1) == 0) ? $img6 = $array[5] : $img6 = $array[14];
    //         break;
    //     case 2:
    //         (rand(0, 1) == 0) ? $img6 = $array[5] : $img6 = $array[14];
    //         (rand(0, 1) == 0) ? $img7 = $array[6] : $img7 = $array[15];
    //         break;
    //     case 3:
    //         (rand(0, 1) == 0) ? $img6 = $array[5] : $img6 = $array[14];
    //         (rand(0, 1) == 0) ? $img7 = $array[6] : $img7 = $array[15];
    //         (rand(0, 1) == 0) ? $img8 = $array[7] : $img8 = $array[16];
    //         break;
    //     case 4:
    //         (rand(0, 1) == 0) ? $img6 = $array[5] : $img6 = $array[14];
    //         (rand(0, 1) == 0) ? $img7 = $array[6] : $img7 = $array[15];
    //         (rand(0, 1) == 0) ? $img8 = $array[7] : $img8 = $array[16];
    //         (rand(0, 1) == 0) ? $img9 = $array[8] : $img9 = $array[17];
    // }


    $outputImage = imagecreatetruecolor(1000, 1000);

    // set background to white
    imagesavealpha($outputImage, true);
    $col = imagecolorallocatealpha($outputImage, 255, 255, 255, 127);
    imagefill($outputImage, 0, 0, $col);

    foreach ($myImages as $image) {
        imagecopyresized($outputImage, $image, 0, 0, 0, 0, $x, $y, $x, $y);
    }

    // $primo = imagecreatefrompng($img1);
    // $secondo = imagecreatefrompng($img2);
    // $terzo = imagecreatefrompng($img3);
    // $quarto = imagecreatefrompng($img4);
    // $quinto = imagecreatefrompng($img5);
    // // $sesto = imagecreatefrompng($img6);
    // // $settimo = imagecreatefrompng($img7);
    // // $ottavo = imagecreatefrompng($img8);
    // // $nono = imagecreatefrompng($img9);

    // if (!empty($img6)) {
    //     $sesto = imagecreatefrompng($img6);
    // }
    // if (!empty($img7)) {
    //     $settimo = imagecreatefrompng($img7);
    // }
    // if (!empty($img8)) {
    //     $ottavo = imagecreatefrompng($img8);
    // }
    // if (!empty($img9)) {
    //     $nono = imagecreatefrompng($img9);
    // }



    // imagecopyresized($outputImage, $primo, 0, 0, 0, 0, $x, $y, $x, $y);
    // imagecopyresized($outputImage, $secondo, 0, 0, 0, 0, $x, $y, $x, $y);
    // imagecopyresized($outputImage, $terzo, 0, 0, 0, 0, $x, $y, $x, $y);
    // imagecopyresized($outputImage, $quarto, 0, 0, 0, 0, $x, $y, $x, $y);
    // imagecopyresized($outputImage, $quinto, 0, 0, 0, 0, $x, $y, $x, $y);
    // // imagecopyresized($outputImage,$sesto,0,0,0,0, $x, $y,$x,$y);
    // // imagecopyresized($outputImage,$settimo,0,0,0,0, $x, $y,$x,$y);
    // // imagecopyresized($outputImage,$ottavo,0,0,0,0, $x, $y,$x,$y);
    // // imagecopyresized($outputImage,$nono,0,0,0,0, $x, $y,$x,$y);

    // if (!empty($img6)) {
    //     imagecopyresized($outputImage, $sesto, 0, 0, 0, 0, $x, $y, $x, $y);
    // }
    // if (!empty($img7)) {
    //     imagecopyresized($outputImage, $settimo, 0, 0, 0, 0, $x, $y, $x, $y);
    // }
    // if (!empty($img8)) {
    //     imagecopyresized($outputImage, $ottavo, 0, 0, 0, 0, $x, $y, $x, $y);
    // }
    // if (!empty($img9)) {
    //     imagecopyresized($outputImage, $nono, 0, 0, 0, 0, $x, $y, $x, $y);
    // }


    $filename = $targetPath . microtime(true) . $i . '.png';
    imagepng($outputImage, $filename);

    imagedestroy($outputImage);

    header("Location: index.php?success");
}
