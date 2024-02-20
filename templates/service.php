<!--PAGE NOS SERVICES-->
<div class="container text-center nosServices">
    <div class=" row service">
        <div class="">
            <img  class="col m-3 imgService" src=<?php echo $service['servicesPicture']?> style="max-width: 400px; max-height: 400px;"?>
        </div>
        <div class=" col text-wrap firstService">
            <h2><?php echo $service['title'] ?></h2>
            <p><?php echo nl2br(htmlspecialchars($service['servicesContent'])) ?></p>
        </div>
    </div>
</div>

