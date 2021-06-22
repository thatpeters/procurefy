<?php
session_start();

if (isset($_SESSION['pbtid'])) {
    session_write_close();
    include 'pbt_header.php';
    if (isset($_GET['category'])) {
        $status = $_GET['category'];
        $query = "SELECT * FROM posts WHERE pbtid='" . $_SESSION['pbtid'] . "' and status ='" . $status . "' order by timestamp asc";
    } else {
        $query = "SELECT * FROM posts WHERE pbtid='" . $_SESSION['pbtid'] . "' order by case when status = 'Pending' then '1' when status = 'Acknowledged' then '2' ELSE '3' END, timestamp ASC";
    }
} elseif (isset($_SESSION['jktid'])) {

    session_write_close();
    include 'jkt_header.php';
    if (isset($_GET['category'])) {


        $status = $_GET['category'];




        if ($status == "Waiting") {
            $query = "SELECT * FROM posts where pbtid IS NULL order by timestamp asc";
        } else {
            $query = "SELECT * FROM posts where status ='" . $status . "' and pbtid is not null order by timestamp asc";
        }
    } else {

        $query = "SELECT * FROM posts  order by case when pbtid is null then '0'  when status = 'Pending' then '1' when status = 'Acknowledged' then '2' ELSE '3' END, timestamp asc";
    }
} else {
    echo "<script> alert('ERROR');  window.history.back();</script>";
}


$res_posts = mysqli_query($connect, $query);
?>


<section class="content-with-menu content-with-menu-has-toolbar media-gallery">
    <div class="content-with-menu-container">






        <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">


            <?php






            while ($row_posts = mysqli_fetch_array($res_posts)) {

                $image_array = explode(",", $row_posts['image']);

                $image = $image_array[0];

                if ($row_posts['status'] == "Pending" || $row_posts['status'] == "Waiting") {
                    $color = "red";
                } elseif ($row_posts['status'] == "Acknowledged") {
                    $color = "blue";
                } else {
                    $color = "black";
                }


                if (empty($row_posts['pbtid'])) {
                    $status = "Waiting";
                    $d = DateTime::createFromFormat('Y-m-d H:i:s', $row_posts['timestamp']);
                        if ($d === false) {
                            die("Incorrect date string");
                        } else {

                            if (date_timestamp_get($d) < strtotime("-1 week")) {
                                $status .= " (More Than 1 Week)";
                            }
                        }
                } else {
                    $status = $row_posts['status'];

                    if ($row_posts['status'] == "Pending") {
                        $d = DateTime::createFromFormat('Y-m-d H:i:s', $row_posts['timestamp']);
                        if ($d === false) {
                            die("Incorrect date string");
                        } else {

                            if (date_timestamp_get($d) < strtotime("-1 week")) {
                                $status .= " (More Than 1 Week)";
                            }
                        }
                    }
                }


                echo '<div class="isotope-item video col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                <a href="view_post.php?postid=' . $row_posts['postid'] . '">

                    <div class="thumb-preview">
                       

                        <p class="thumb-image" >
                            <img src="../uploads/' . $image . '" width="200" height="200" class="thumb-image" class="img-responsive" alt="ERROR">
                        </p>

                    </div>
                    </a>
                    <h6 class="mg-title text-semibold">' . $row_posts['category'] . '</h6>
                    <div class="mg-description">
                        <small  style="color: ' . $color . ';">' . $status . '</small>
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