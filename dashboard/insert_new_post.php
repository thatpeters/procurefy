<?php
include 'header.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("Asia/Kuala_Lumpur");

if (isset($_POST['submit'])) {

    $userid = $_SESSION['userid'];
    $post_text = $_POST['post_text'];
    $category = $_POST['category'];
    $timestamp = date('Y-m-d H:i:s', time());
    
    $SQLuploadIndicator = 1;
    $ImageuploadIndicator = 1;
    $status = "Pending";
    $latitude = $_SESSION['latitude'];
    $longitude = $_SESSION['longitude'];


    //check all image file type
    $new_imagefilename = array_filter($_FILES['imageToUpload']['name']);
    $uploaddir = '../uploads/';
    $allowImageTypes = array('jpg', 'png', 'jpeg','JPG', 'PNG', 'JPEG');
    $Combined_Image_Filename = "";
    $Combined_Image_Filename_DISPLAY = "";
    foreach ($_FILES['imageToUpload']['name'] as $key => $val) {
        $fileName = basename($_FILES['imageToUpload']['name'][$key]);
        $targetFilePath = $uploaddir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowImageTypes)) {
            $ImageuploadIndicator = 1;
        } else {

            echo "<script type='text/javascript'>alert('There is an error on the $fileName upload to server, possible wrong file format.');</script>";
            echo "<script>location.href='new_post.php';</script>";
            $ImageuploadIndicator = 0;
            exit;
        }
    }


    //check video file type
    $videofilename = basename($_FILES['videoToUpload']['name']);
    if (!empty($videofilename) && $ImageuploadIndicator == 1) {
        if (preg_match('/video\/*/', $_FILES['videoToUpload']['type'])) :
            $targetVideoFilePath = $uploaddir . $videofilename;
            $x = 1;
            $newvideofilepath = $targetVideoFilePath;
            while (is_file($newvideofilepath)) {
                $newvideofilepath = $targetVideoFilePath;
                $fn = explode(".", $newvideofilepath);
                $fp = count($fn) - 2;
                $fn[$fp] .= $x;
                $newvideofilepath = implode(".", $fn);
                $x++;
            }
            $newvideofilename = explode("/", $newvideofilepath);
            $newvideofilename = end($newvideofilename);
            if (move_uploaded_file($_FILES["videoToUpload"]["tmp_name"], $newvideofilepath)) {
                $videofilenameSQL = $newvideofilename;
            } else {
                echo "<script type='text/javascript'>alert('There is an error on the $videofilename upload to server.');</script>";
                echo "<script>location.href='new_post.php';</script>";
                $ImageuploadIndicator = 0;
                exit;
            }
        else :
            echo "<script type='text/javascript'>alert('$videofilename is not a video file!');</script>";
            echo "<script>location.href='new_post.php';</script>";
            $ImageuploadIndicator = 0;
            exit;


        endif;
    }





    //upload image to server if image and video is good to go
    if ($ImageuploadIndicator == 1) {
        foreach ($_FILES['imageToUpload']['name'] as $key => $val) {
            $fileName = basename($_FILES['imageToUpload']['name'][$key]);
            $targetFilePath = $uploaddir . $fileName;
            $x = 1;
            $newfilepath = $targetFilePath;
            while (is_file($newfilepath)) { 
                $newfilepath = $targetFilePath;
                $fn = explode(".", $newfilepath);
                $fp = count($fn) - 2;
                $fn[$fp] .= $x;
                $newfilepath = implode(".", $fn);
                $x++;
            }
            $newfilename = explode("/", $newfilepath);
            $newfilename = end($newfilename);
            if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"][$key], $newfilepath)) {           

                $Combined_Image_Filename = $Combined_Image_Filename . "," . $newfilename;

                $Combined_Image_Filename_DISPLAY = $Combined_Image_Filename_DISPLAY . "," . $fileName;
            } else {
                //need unlink video in here
                if (isset($videofilenameSQL)) {
                    unlink('../uploads/' . $videofilenameSQL);
                }
                //need unlink image in here
                if (!empty($Combined_Image_Filename)) {
                    $image_array = explode(",", $Combined_Image_Filename);
                    foreach ($image_array as $image) {
                        unlink('../uploads/' . $image);
                    }
                }
                echo "<script type='text/javascript'>alert('There is an error on the $fileName upload to server.');</script>";
                echo "<script>location.href='new_post.php';</script>";
                $SQLuploadIndicator = 0;
                exit;
            }
        }
    } else {
        //need unlink video in here
        if (isset($videofilenameSQL)) {
            unlink('../uploads/' . $videofilenameSQL);
        }

        $SQLuploadIndicator = 0;
        echo "<script type='text/javascript'>alert('Upload Failed, Please Try Again.');</script>";
        echo "<script>location.href='new_post.php';</script>";
        exit;
    }








    if ($SQLuploadIndicator == 1) {


        //auto assign pbt
        $json = "https://nominatim.openstreetmap.org/reverse?format=json&lat=" . $latitude . "&lon=" . $longitude . "&zoom=18&addressdetails=1";

        $ch = curl_init($json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0");
        $jsonfile = curl_exec($ch);
        curl_close($ch);

        $RG_array = json_decode($jsonfile, true);

        if (!empty($RG_array['address']['city'])) {
            $pbt_indicator = $RG_array['address']['city'];
        } elseif (!empty($RG_array['address']['county'])) {
            $pbt_indicator = $RG_array['address']['county'];
        } elseif (!empty($RG_array['address']['region'])) {
            $pbt_indicator = $RG_array['address']['region'];
        } elseif (!empty($RG_array['address']['district'])) {
            $pbt_indicator = $RG_array['address']['district'];
        }

        if (isset($pbt_indicator)) {
            $pbt_indicator = "%" . $pbt_indicator . "%";

            $sql_search = "SELECT * FROM pbt WHERE name like '" . $pbt_indicator . "' limit 1";
            $search_result = mysqli_query($connect, $sql_search);
            while ($row_pbt = mysqli_fetch_array($search_result)) {
                if (isset($row_pbt['pbtid'])) {
                    $pbtid = "'" . $row_pbt['pbtid'] . "'";
                } else {
                    $pbtid = 'null';
                    $status = "Waiting";
                }
            }
        } else {
            $pbtid = 'null';
            $status = "Waiting";
        }





        $Combined_Image_Filename = substr($Combined_Image_Filename, 1); //delete the first ','
        $Combined_Image_Filename_DISPLAY = substr($Combined_Image_Filename_DISPLAY, 1); //delete the first ','


        $stmt = $connect->prepare("INSERT INTO posts (userid, timestamp, category, image, video, text, latitude, longitude, status, pbtid) VALUES ('$userid', '$timestamp', '$category', '$Combined_Image_Filename', '$videofilenameSQL', ?, $latitude, $longitude, '$status', $pbtid)");
        echo $connect->error;


        $stmt->bind_param('s', $post_text);

        if ($stmt->execute()) {
            $stmt->close();


            if (!empty($videofilename)) {
                $alluploadfile = $Combined_Image_Filename_DISPLAY . " & " . $videofilename;
            } else {
                $alluploadfile = $Combined_Image_Filename_DISPLAY;
            }



            unset($_SESSION["latitude"]);
            unset($_SESSION["longitude"]);

            echo "<script type='text/javascript'>alert('Feedback Upload Done, $alluploadfile was uploaded.');</script>";
            echo "<script>location.href='index.php';</script>";
            exit;
        } else {
            $stmt->close();

            //need unlink image and video in here
            if (isset($videofilenameSQL)) {
                unlink('../uploads/' . $videofilenameSQL);
            }
            if (!empty($Combined_Image_Filename)) {
                $image_array = explode(",", $Combined_Image_Filename);
                foreach ($image_array as $image) {
                    unlink('../uploads/' . $image);
                }
            }


            echo "<script type='text/javascript'>alert('Upload Failed, Please Try Again.');</script>";
            echo "<script>location.href='new_post.php';</script>";
            exit;
        }
    } else {

        //need unlink image and video in here
        if (isset($videofilenameSQL)) {
            unlink('../uploads/' . $videofilenameSQL);
        }
        if (!empty($Combined_Image_Filename)) {
            $image_array = explode(",", $Combined_Image_Filename);
            foreach ($image_array as $image) {
                unlink('../uploads/' . $image);
            }
        }


        echo "<script type='text/javascript'>alert('Upload Failed, Please Try Again.');</script>";
        echo "<script>location.href='new_post.php';</script>";
        exit;
    }
} else {
    echo "<script> alert('ERROR');  window.history.back();</script>";
    exit;
}
