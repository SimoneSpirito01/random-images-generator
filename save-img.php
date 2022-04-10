
<?php

if (isset($_POST['submit'])){
    $countfiles = count($_FILES['my_img']['name']);
    if($countfiles != 18) {
        setcookie('TestCookie', "", time()-3600);
        $images = array();
        header("Location: index.php?error");
        die;
    }

    for($i=0; $i<$countfiles; $i++) {
        $fileName = $_FILES['my_img']['name'][$i];
        $fileTmpName = $_FILES['my_img']['tmp_name'][$i];
        // $fileSize = $_FILES['my_img']['size'];
        $fileError = $_FILES['my_img']['error'][$i];

        if ($fileError === 0){
            // if ($filesize > 535000){
            //     $em = "sorry your file is too large.";
            //     header("Location: index.php?error=$em");
            // } else {
                $img_ex = pathinfo($fileName, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpeg", "jpg", "png");

            // }

                if (in_array($img_ex_lc, $allowed_exs)){
                    $new_img_name = uniqid("img-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    $images = array();
                    if(!empty($_COOKIE['TestCookie'])) {
                        $images = json_decode($_COOKIE['TestCookie'], true);
                        if(count($images) > 18) {
                            setcookie('TestCookie', "", time()-3600);
                            $images = array();
                        }
                    }
                    
                    $images[] = $img_upload_path;
                    setcookie('TestCookie', json_encode($images), time()+3600);
                    $_COOKIE['TestCookie'] = json_encode($images);
                    move_uploaded_file($fileTmpName, $img_upload_path);
                    

                } else {
                    $em = "you cant upload file of this type";
                    header("Location: index.php?error=$em");
                }

        } else {
            $em = "unknown error";
            header("Location: index.php?error=$em");
        }
        
    }
    header("Location: index.php?uploaded");
} else {
    echo 'error';
}

?>