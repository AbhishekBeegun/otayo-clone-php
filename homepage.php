<?php
    include_once 'includes/db.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otayo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

/* top banner */
#home_top_banner .home_top_carousel{
    height : 450px;
    position : relative ;
}
#home_top_banner .home_top_carousel .owl-nav {
  position: absolute;
  top : 0 ;
}
#home_top_banner .home_top_carousel .owl-dots {
  position: absolute;
  bottom : 0 ;
  left : 45%;
}
#home_top_banner .home_top_carousel img{
    height : 450px;
    background-color : grey ;
    object-fit : contain ;
}
/* top banner end */

/* otayo exclusives */
#heading .heading-line {
    height : 1px;
    background-color : grey;
}
#heading h2 {
 color : #D75933;
}
#otayo_exclusive .otayo_exclusive_carousel {
    height:280px ;
}
#otayo_exclusive .otayo_exclusive_carousel img{
    height:250px ;
    object-fit : cover ;
}
/* otayo exclusives end */

/* events */
#events .event_thumbnail {
    border-radius : 10px;
    width: 350px;
    height : 500px;
    margin :10px;
}
#events .event_thumbnail .event_details{
    padding : 10px;
    color : #D75933;
}
/* events end */

/* our services */
#our_services .our_services_carousel .service_item{
    height : 150px;
    background-color : #D75933
}
/* our services end */
</style>
</head>

<body>
<?php
    include 'header.php';
    include 'includes/headings.php';
?>

<?php
 $hme_topbanner_query = 'SELECT * FROM homepage_top_banner;';
 $result = mysqli_query($conn , $hme_topbanner_query);
 $resultcheck = mysqli_num_rows($result);
?>

<?php
 $events_query = 'SELECT * FROM events;';
 $resultevent = mysqli_query($conn , $events_query);
 $resultcheckevent = mysqli_num_rows($resultevent);
?>

<!-- TOP BANNER -->
<?php
 if($resultcheck > 0 ){
    echo '<section id="home_top_banner">';
    echo '<div class="owl-carousel owl-theme home_top_carousel">';
        foreach ( $result as $item){
            echo "<a href='{$item['linkto']}'><img src='{$item['mainImage']}'></a>";
        }
    echo '</div>' ; 
    echo '</section>' ; 
 } else {
    echo "NO BÄNNAER TO SHOW" ;
 }
?>
<!-- TOP BANNER END -->

<!-- OTAYO EXCLUSIVE -->
<?php
heading('OTAYO EXCLUSIVE')
?> 
<?php
 if($resultcheck > 0 ){
    echo '<section id="otayo_exclusive">';
    echo '<div class="container">';
    echo '<div class="owl-carousel owl-theme otayo_exclusive_carousel">';
        foreach ( $result as $item){
            echo "<a href='{$item['linkto']}'><img src='{$item['mainImage']}'></a>";
        }
    echo '</div>' ; 
    echo '</div>' ; 
    echo '</section>';
 } else {
    echo "NO EXCLUSIVES TO SHOW" ;
 }
?>
<!-- OTAYO EXCLUSIVE END -->

<!-- EVENTS -->
<?php
heading('BROWSE BY CATEGORIES')
?> 
<?php
 if ($resultcheckevent > 0) {
    echo '<section id="events" class="container d-flex flex-col flex-lg-row flex-wrap align-items-center justify-content-center">' ;
    
    foreach ($resultevent as $event) {
        echo '<a href="' . $event['event_url'] . '" class="event_thumbnail">
        <img width="100%" height="50%" class="img img-fluid" src="' . $event['event_image'] . '" />
        <div class="event_details">
        <h2>'.$event['event_title'].'</h2>
        <p>'.$event['event_location'].'</p>
        <p>'.$event['event_min_price'].'</p>
        </div>
        </a>';
    }
    echo '</section>';
 } else {
    echo "NO EVENTS AVAILABLE";
 }
?>
<!-- EVENTS END -->

<!-- OUR SERVICES -->
<?php
heading('OUR SERVICES')
?> 

<section id="our_services" class="container">
    <div class="owl-carousel owl-theme our_services_carousel">
        <div class="service_item">
            <p>EVENT TICKETING PLATFORM</p>
        </div>
        <div class="service_item">
            <p>BOOK TICKETS 24/7</p>
        </div>
        <div class="service_item">
            <p>17 YEARS EXPERIENCE</p>
        </div>
        <div class="service_item">
            <p>12 POINTS OF SALE</p>
        </div>
    </div>
</section>
<!-- OUR SERVICES END -->

<!-- END BANNER -->
<?php
heading('YOUR OWN EVENT')
?> 

<section class="container">
    <div>
        <button class="btn btn-lg btn-primary">GET STARTED</button>
    </div>
</section>

<!-- END BANNER END -->
<?php
heading('FOOTER')
?> 

<!-- 3rd parties installation -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- 3rd parties installation end -->

<!-- owl carousels -->
<script>
    $(document).ready(function() {
        $('.home_top_carousel').owlCarousel({
            loop: true,
            autoplay : true ,
            animateOut: 'fadeOut',
            margin: 10,
            nav: true,
            items : 1
        });
        $('.otayo_exclusive_carousel').owlCarousel({
            loop: true,
            autoplay : true ,
            margin: 10,
            nav: true,
            items : 1
        });
        $('.our_services_carousel').owlCarousel({
            loop: true,
            autoplay : true ,
            margin: 10,
            nav: true,
            responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:4,
            loop:false
        }
    }
        });
    });
</script>
<!-- owl carousels end -->

</body>

</html>