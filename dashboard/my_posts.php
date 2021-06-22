<?php
include "header.php";

$userid = $_SESSION['userid'];




$query = "SELECT * FROM posts WHERE userid='" . $userid . "' order by timestamp DESC";

$res_posts = mysqli_query($connect, $query);
?>




<section class="content-with-menu content-with-menu-has-toolbar media-gallery">

    <div class="content-with-menu-container">

        <section class="panel">
            <div class="panel-body">
                <h3>
                    <b> MY POST</b>
                </h3>
            </div>
        </section>








        <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">



            <?php

            while ($row_posts = mysqli_fetch_array($res_posts)) {

                $image_array = explode(",", $row_posts['image']);

                $image = $image_array[0];






                echo '<div class="isotope-item video col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                <a href="view_post.php?postid=' . $row_posts['postid'] . '">

                    <div class="thumb-preview">
                        <p class="thumb-image" >
                            <img src="../uploads/' . $image . '" width="300" height="200"   alt="ERROR">
                        </p>

                    </div>
                    </a>

                    <h6 class="mg-title text-semibold">' . $row_posts['category'] . '</h6>
                    <div class="mg-description">
                        <small class="pull-left text-muted">Status = ' . $row_posts['status'] . '</small>
                        <small class="pull-right text-muted">' . $row_posts['timestamp'] . '</small>
                    </div>
                </div>
            </div>';
            }




            ?>










        </div>
    </div>
</section>



<?php
include "footer.html";
?>