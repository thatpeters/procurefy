<?php
session_start();
$postid = $_GET["postid"];

if (isset($_SESSION['pbtid'])) {
    session_write_close();
    include 'pbt_header.php';
} elseif (isset($_SESSION['userid'])) {
    session_write_close();
    include 'header.php';
    $userid = $_SESSION['userid'];
    $AcknowledgementFromUser = false;

} elseif (isset($_SESSION['jktid'])) {
    session_write_close();
    include 'jkt_header.php';
}


$AcknowledgementFromUser_query = "SELECT * FROM posts_users_acknowledgement where postid = $postid";
$AcknowledgementFromUser_array_sql = mysqli_query($connect, $AcknowledgementFromUser_query);

if(isset($_SESSION['userid']))
{
    while ($AcknowledgementFromUser_array = mysqli_fetch_array($AcknowledgementFromUser_array_sql)) {

        if ($AcknowledgementFromUser_array['userid'] == $userid) {
            $AcknowledgementFromUser = true;
        } 
    }
}





$sql_posts = "SELECT * FROM posts join users on posts.userid = users.userid where postid='" . $postid . "'";
$res_posts = mysqli_query($connect, $sql_posts);
if (mysqli_num_rows($res_posts) < 1) {
    echo "<script> alert('ERROR');  window.history.back();</script>";
} else {
    $row_post = mysqli_fetch_array($res_posts);
}

$image_array = explode(",", $row_post['image']);

if (!(is_null($row_post['pbtimage']))) {
    $image_array_pbt = explode(",", $row_post['pbtimage']);
}


$video_type = explode(".", $row_post['video']);
$video_type = end($video_type);






$lon = (float)$row_post['longitude'];
$lat = (float)$row_post['latitude'];


$addr = getAddress($lat, $lon);







?>

<section class="content-with-menu content-with-menu-has-toolbar media-gallery">
    <div class="content-with-menu-container">
        <div class="inner-menu-toggle">
            <a href="#" class="inner-menu-expand" data-open="inner-menu">
                Show Details <i class="fa fa-chevron-right"></i>
            </a>
        </div>

        <menu id="content-menu" class="inner-menu" role="menu">
            <div class="nano">
                <div class="nano-content">

                    <div class="inner-menu-toggle-inside">
                        <a href="#" class="inner-menu-collapse">
                            <i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Hide Details
                        </a>
                        <a href="#" class="inner-menu-expand" data-open="inner-menu">
                            Show Details <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>

                    <div class="inner-menu-content">



                        <div class="sidebar-widget m-none">

                            <div class="widget-header clearfix">
                                <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-credit-card"></i>

                                    Feedback ID</h6>

                            </div>
                            <div class="widget-content">
                                <ul class="mg-folders">
                                    <li>
                                        <?php echo $row_post['postid']; ?>

                                    </li>

                                </ul>
                            </div>

                            <hr class="separator" />

                            <div class="widget-header clearfix">
                                <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-user"></i>

                                    Uploaded By</h6>

                            </div>
                            <div class="widget-content">
                                <ul class="mg-folders">
                                    <li>
                                        <?php echo $row_post['name']; ?>
                                    </li>
                                    <li>
                                        <?php echo $row_post['email']; ?>
                                    </li>
                                    <li>
                                        <?php echo '0' . $row_post['telephone']; ?>
                                    </li>
                                </ul>
                            </div>

                            <hr class="separator" />


                            <div class="widget-header clearfix">
                                <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-clock-o"></i>

                                    Time</h6>

                            </div>
                            <div class="widget-content">
                                <ul class="mg-folders">
                                    <li>
                                        <?php echo $row_post['timestamp']; ?>

                                    </li>

                                </ul>
                            </div>

                            <hr class="separator" />

                            <div class="widget-header clearfix">
                                <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-file"></i>
                                    Category</h6>

                            </div>
                            <div class="widget-content">
                                <ul class="mg-folders">
                                    <li>
                                        <?php echo $row_post['category']; ?>


                                    </li>

                                </ul>
                            </div>

                            <hr class="separator" />

                            <div class="widget-header clearfix">
                                <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-align-left"></i>
                                    Description</h6>

                            </div>
                            <div class="widget-content">
                                <ul class="mg-folders">
                                    <li>
                                        <?php echo $row_post['text']; ?>

                                    </li>

                                </ul>
                            </div>

                            <hr class="separator" />

                            <div class="widget-header clearfix">
                                <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-flag"></i>
                                    Comfirmed by Number of User</h6>

                            </div>
                            <div class="widget-content">
                                <ul class="mg-folders">
                                    <li>
                                        <?php echo (mysqli_num_rows($AcknowledgementFromUser_array_sql)); ?>

                                    </li>

                                </ul>
                            </div>



                            <hr class="separator" />

                            <div class="widget-header clearfix">
                                <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-arrow-right"></i>
                                    Assigned To</h6>

                            </div>
                            <div class="widget-content">
                                <ul class="mg-folders">
                                    <li>
                                        <?php

                                        if (empty($row_post['pbtid'])) {
                                            echo "Waiting";
                                        } else {
                                            echo $row_post['pbtid'];
                                        }



                                        ?>

                                    </li>

                                </ul>
                            </div>
                            <hr class="separator" />

                            <div class="widget-header clearfix">
                                <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-check-square"></i>
                                    Status</h6>

                            </div>
                            <div class="widget-content">
                                <ul class="mg-folders">
                                    <li>
                                        <?php


                                        echo $row_post['status'];



                                        ?>

                                    </li>

                                </ul>
                            </div>

                            <?php
                            if ($row_post['status'] == "Closed") {
                                echo
                                '<hr class="separator" />

                                <div class="widget-header clearfix">
                                    <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-comment"></i>
                                        Comment From Local Government</h6>
    
                                </div>
                                <div class="widget-content">
                                    <ul class="mg-folders">
                                        <li>' . $row_post['pbtcomment'] . '</li>
                                    </ul>
                                </div>';
                                echo
                                '<hr class="separator" />

                                <div class="widget-header clearfix">
                                    <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-clock-o"></i>
                                        Closing Timestamp</h6>
    
                                </div>
                                <div class="widget-content">
                                    <ul class="mg-folders">
                                        <li>' . $row_post['closed_timestamp'] . '</li>
                                    </ul>
                                </div>';
                            }
                            ?>

                            <hr class="separator" />

                            <div class="widget-header clearfix">
                                <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-photo"></i>
                                    Photo</h6>

                            </div>
                            <div class="widget-content">
                                <ul class="mg-folders">
                                    <li>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="display_photo_radio" value="user_radio" onclick="show_user_photo();" checked>
                                                User Uploaded Photo</label>
                                        </div>
                                        <?php
                                        if (!(is_null($row_post['pbtimage']))) {
                                            echo '<div class="radio">
                                                                        <label>
                                                                            <input type="radio" name="display_photo_radio" value="pbt_radio" onclick="show_pbt_photo();">
                                                                            Local Government Uploaded Photo</label>
                                                                    </div>';
                                        }
                                        ?>



                                    </li>


                                </ul>
                            </div>

                            <hr class="separator" />
                            <div class="widget-header clearfix">
                                <h6 class="title pull-left mt-xs" style="color: white;"><i class="fa fa-hand-o-right"></i>
                                    Action</h6>
                            </div>
                            <div class="widget-content">
                                <ul class="mg-folders">

                                    <?php





                                    //action button
                                    if (isset($_SESSION['pbtid'])) {
                                        if ($row_post['status'] == "Pending" && $row_post['pbtid'] == $_SESSION['pbtid']) {
                                            echo '<li>
                                            <a href="#acknowledge" class="modal-basic menu-item"><i class="fa fa-eye"></i> ACKNOWLEDGE</a>
                                        </li><li> 
                                        <a href="#transfer"  class="modal-basic menu-item"><i class="fa fa-arrow-right"></i> TRANSFER CASE</a>
                                    </li>';
                                        } elseif ($row_post['status'] == "Acknowledged" && $row_post['pbtid'] == $_SESSION['pbtid']) {
                                            echo '<li>
                                            <a href="#modalForm" class="modal-with-form menu-item"><i class="fa fa-file-excel-o"></i> CLOSE CASE</a>
                                        </li>';
                                        }
                                    } elseif (isset($_SESSION['userid'])) {
                                        if (($row_post['status'] == "Pending" || $row_post['status'] == "Waiting") && $row_post['userid'] == $_SESSION['userid']) {
                                            echo '<li>
                                            <a href="#edit"  class="modal-basic menu-item"><i class="fa fa-edit (alias)"></i> EDIT</a>
                                        </li><li>
                                        <a href="#delete"  class="modal-basic menu-item"><i class="fa fa-trash-o"></i> DELETE</a>
                                    </li>';
                                        } elseif ($AcknowledgementFromUser === false && $row_post['userid'] != $_SESSION['userid']) {
                                            echo '<li><a href="user_acknowledge_post.php?postid=' . $postid .  '"class="menu-item"><i class="fa fa-eye"></i> CONFIRM</a></li>';
                                        }
                                    } elseif (isset($_SESSION['jktid'])) {

                                        if (empty($row_post['pbtid'])) {
                                            echo '<li> 
                                            <a href="#transfer"  class="modal-basic menu-item"><i class="fa fa-arrow-right"></i> ASSIGN CASE</a>
                                        </li>';
                                        }
                                    }



                                    ?>



                                    <!-- pop up for confirming delete -->
                                    <div id="delete" class="modal-block modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Delete</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fa fa-exclamation"></i>
                                                    </div>
                                                    <div class="modal-text">
                                                        <h4>ALERT</h4>
                                                        <p>Are you sure that you want to delete this Post?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button onclick="location.href='delete_post.php?postid=<?php print($postid); ?>'" class="btn btn-primary modal-confirm">Confirm</button>
                                                        <button class="btn btn-default modal-dismiss">Cancel</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </section>
                                    </div>

                                    <!-- pop up for confirming edit -->
                                    <div id="edit" class="modal-block modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Edit</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fa fa-exclamation"></i>
                                                    </div>
                                                    <div class="modal-text">
                                                        <h4>ALERT</h4>
                                                        <p>Are you sure that you want to edit this Post?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button onclick="location.href='edit_post.php?postid=<?php print($postid); ?>'" class="btn btn-primary modal-confirm">Confirm</button>
                                                        <button class="btn btn-default modal-dismiss">Cancel</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </section>
                                    </div>






                                    <!-- pop up for confirming acknowledge -->
                                    <div id="acknowledge" class="modal-block modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Acknowledgement</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fa fa-exclamation"></i>
                                                    </div>
                                                    <div class="modal-text">
                                                        <h4>ALERT</h4>
                                                        <p>Are you sure that you want to acknowledge this case?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button onclick="location.href='pbt_acknowledge_post.php?postid=<?php print($postid); ?>'" class="btn btn-primary modal-confirm">Confirm</button>
                                                        <button class="btn btn-default modal-dismiss">Cancel</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </section>
                                    </div>

                                    <!-- pop up for confirming tansfer -->
                                    <div id="transfer" class="modal-block modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Transfer</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fa fa-exclamation"></i>
                                                    </div>
                                                    <div class="modal-text">
                                                        <h4>ALERT</h4>
                                                        <p>Are you sure that you want to transfer this case?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button onclick="location.href='edit_post.php?postid=<?php print($postid); ?>'" class="btn btn-primary modal-confirm">Confirm</button>
                                                        <button class="btn btn-default modal-dismiss">Cancel</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </section>
                                    </div>


                                    <!-- Modal close Form -->
                                    <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Close Case Form</h2>
                                            </header>
                                            <div class="panel-body">
                                                <form id="demo-form" class="form-horizontal mb-lg" method="post" action="pbt_close_post.php" enctype="multipart/form-data">
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-3 control-label">Images (Optional)</label>

                                                        <div class="col-sm-9">
                                                            <div class="fileupload fileupload-new">
                                                                <div class="input-append">
                                                                    <input type="file" id="image" name="imageToUpload[]" multiple accept='image/*'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" id="postid" name="postid" value="<?php echo $postid; ?>" />


                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Comment</label>
                                                        <div class="col-sm-9">
                                                            <textarea rows="5" name="comment" class="form-control" placeholder="Type your comment..." required></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button form="demo-form" type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                                        <button class="btn btn-default modal-dismiss">Cancel</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </section>
                                    </div>



                                </ul>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </menu>
        <div class="inner-body mg-main">

            <div class="inner-toolbar clearfix">
                <ul>
                    <li>
                        <p style="color:white"> <i class="fa fa-map-marker"></i>
                            <?php echo $addr; ?></p>

                    </li>


                </ul>
            </div>


            <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">






                <?php

                $x = 0;
                // loop image name and display
                foreach ($image_array as $value) {

                    $x += 1;


                    echo
                    '<div id="user_uploaded' . $x . '" class="isotope-item document col-sm-6 col-md-4 col-lg-3 " >
                        <div class="thumbnail" >

                        <div class="thumb-preview" >
                            <a class="thumb-image" href="../uploads/' . $value . '">
                                <img src="../uploads/' . $value . '" alt="ERROR"  width="300" height="200">
                            </a>
                            <div class="mg-thumb-options">
                            <div class="mg-zoom"><i class="fa fa-search"></i></div>
                            </div>
                        </div>
                        <center>
                        <h5>User Uploaded Image</h5>
                    </center>
                        </div>
                </div> ';
                }

                echo '<input type="hidden" id="user_uploaded_id" name="user_uploaded_id" value="' . $x . '">';

                // display video
                if (!empty($row_post['video'])) {
                    echo  '<div id="user_uploaded_video" class="isotope-item document col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <div class="thumb-preview">

                        <video class="img-responsive" controls>
  <source src="../uploads/' . $row_post['video'] . '" type="video/' . $video_type . '">
  ERROR: Your browser does not support the video tag or file did not existed.
</video>

                        </div>
                        <center><h5>Uploaded Video</h5></center>

                    </div>
                </div>';
                }

                // loop pbt image name and display if there is one
                if (!(is_null($row_post['pbtimage']))) {
                    $y = 0;




                    foreach ($image_array_pbt as $value) {
                        $y += 1;



                        echo
                        '<div id="pbt_uploaded' . $y . '" class="isotope-item document col-sm-6 col-md-4 col-lg-3 desc" >
                        <div class="thumbnail" >

                        <div class="thumb-preview" >
                            <a class="thumb-image" href="../uploads/' . $value . '">
                                <img src="../uploads/' . $value . '" alt="ERROR"  width="300" height="200">
                            </a>
                            <div class="mg-thumb-options">
                            <div class="mg-zoom"><i class="fa fa-search"></i></div>
                            </div>
                        </div>
                        <center>
                        <h5>Local Government Uploaded Image</h5>
                    </center>
                        </div>
                     
                     

                </div>';
                    }
                    echo '<input type="hidden" id="pbt_uploaded_id" name="pbt_uploaded_id" value="' . $y . '">';
                }




                ?>
            </div>
        </div>
    </div>
</section>


<script>
    var limit = 5;
    $(document).ready(function() {
        $('#image').change(function() {
            var files = $(this)[0].files;
            if (files.length > limit) {
                alert("You can select only maximum " + limit + " images.");
                $('#image').val('');
                return false;
            } else {
                return true;
            }
        });
    });




    function show_user_photo() {

        user_photo_id_length = document.getElementById('user_uploaded_id').value;
        var i;
        var combined_id;
        for (i = 1; i < parseInt(user_photo_id_length, 10) + 1; i++) {

            combined_id = 'user_uploaded'.concat(i);

            document.getElementById(combined_id).style.display = 'block';




        }

        pbt_photo_id_length = document.getElementById('pbt_uploaded_id').value;

        for (i = 1; i < parseInt(pbt_photo_id_length, 10) + 1; i++) {



            combined_id = 'pbt_uploaded'.concat(i);

            document.getElementById(combined_id).style.display = 'none';


        }


        document.getElementById('user_uploaded_video').style.display = 'block';
    }

    function show_pbt_photo() {
        user_photo_id_length = document.getElementById('user_uploaded_id').value;


        var i;
        var combined_id;
        for (i = 1; i < parseInt(user_photo_id_length, 10) + 1; i++) {

            combined_id = 'user_uploaded'.concat(i);


            document.getElementById(combined_id).style.display = 'none';




        }

        pbt_photo_id_length = document.getElementById('pbt_uploaded_id').value;

        for (i = 1; i < parseInt(pbt_photo_id_length, 10) + 1; i++) {



            combined_id = 'pbt_uploaded'.concat(i);

            document.getElementById(combined_id).style.display = 'block';


        }

        document.getElementById('user_uploaded_video').style.display = 'none';

    }
</script>




<?php


include "footer.html";

?>