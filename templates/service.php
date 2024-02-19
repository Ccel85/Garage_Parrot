<!--PAGE NOS SERVICES-->
<div class="nosServices">
    <div class="service">
        <img  src='../assets//img/img_service_carrosserie.png' alt="image service">
        <!--<img src=<?php /*echo $service['servicesPicture'] */?>>-->
        <div class="text-wrap firstService">
            <h2><?php echo $service['title'] ?></h2>
            <p><?php echo nl2br(htmlspecialchars($service['servicesContent'])) ?></p>
        </div>
    </div>
</div>

