<?php

function heading($name){
    echo '<div id="heading" class="container p-5">
    <div class="row d-flex align-items-center">
    <div class="col-3 heading-line"></div> 
     <h2 class="col-6 heading-name text-center font-weight-bold">'. $name .'</h2>
    <div class="col-3 heading-line"></div> 
    </div>
    </div>' ; 
}

?>