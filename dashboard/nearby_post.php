<?php
include "header.php";

//number of post
$x = 0;
//current location
$longitude = $_GET['longitude'];
$latitude = $_GET['latitude'];
//Kilometer
$distance = 5;

$query = "SELECT *, (((acos(sin((" . $latitude . "*pi()/180)) * sin((`latitude`*pi()/180)) + cos((" . $latitude . "*pi()/180)) * cos((`latitude`*pi()/180)) * cos(((" . $longitude . "- `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM `posts` HAVING  (distance <= " . $distance . " and (status = 'Pending' OR status = 'Acknowledged')) limit 10";



$res_posts = mysqli_query($connect, $query);
?>


<section class="content-with-menu content-with-menu-has-toolbar media-gallery">
    <div class="content-with-menu-container">

        <section class="panel">
            <div class="panel-body">
                <h3>
                    <b id="NumberOfPost">NEARBY FEEDBACK</b>
                    
                </h3>
            </div>
            
        </section>






        <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">


            <?php
            while (($row_posts = mysqli_fetch_array($res_posts)) && ($x <= 10)) {

                $image_array = explode(",", $row_posts['image']);

                $image = $image_array[0];




                $x += 1;

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
                        <small class="pull-left text-muted">Post ID = ' . $row_posts['postid'] . '</small>
                        <small class="pull-right text-muted">' . $row_posts['timestamp'] . '</small>
                    </div>
                </div>
            </div>';
            }




            ?>










        </div>
    </div>
</section>

<script>
    document.getElementById("NumberOfPost").innerHTML = "NEARBY FEEDBACK (FOUND <?php echo $x; ?>)";
</script>

<?php
include "footer.html";
?>