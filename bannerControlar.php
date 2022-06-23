<?php
$dbCon = mysqli_connect('localhost','root','','portfolio_db') or die('connection faild');
if(isset($_POST['saveBanner'])){
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $details = $_POST['details'];

    if(empty($title) || empty($sub_title) || empty($details)){
        echo "All feild are required";
    }else{
        $insertQry = "INSERT INTO banners (title,sub_title,details) VALUES ('{$title}', '{$sub_title}', '{$details}')";
        $isSubmit = mysqli_query($dbCon,$insertQry);
        if($isSubmit == true){
            $message = "Banner insert successfully";
        }else{
            $message = "feild";
        }

        header("location: bannerCreate.php?msg={$message}");
    }
}

// this for update
if(isset($_POST['updateBanner'])){
    $banner_id = $_POST['banner_id'];
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $details = $_POST['details'];

    if(empty($title) || empty($sub_title) || empty($details)){
        $message = "All feild are required";
    }else{
        $updateQry = "UPDATE banners SET title='{$title}', sub_title='{$sub_title}', details='{$details}' WHERE id='{$banner_id}'";
        $isSubmit = mysqli_query($dbCon,$updateQry);
        if($isSubmit == true){
            $message = "Banner insert successfully";
        }else{
            $message = "feild";
        }

        header("location:bannerUpdate.php?banner_id={$banner_id}&msg={$message}");
    }
}
?>