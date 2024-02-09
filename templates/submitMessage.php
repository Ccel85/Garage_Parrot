<?php //session_start(); 
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/headerAdmin.php');?>

<?php //gestion message

$lastMessages= getLastMessage($adminpdo) ;
foreach ($lastMessages as $lastMessage){

// Convertir la date SQL en format JJ/MM/AA
$dateFormatee = date("d-m-y", strtotime($lastMessage['date']));?>

<div class="position-sticky" style="top: 2rem;">
    <div class="p-4 mb-3 bg-body-tertiary rounded">
        <h4 class="fst-italic text-center">Message client </h4>
    </div>
    <div class="text-center">
        <h4 class="fst-italic">Messages récents </h4>
        <ul class="list-unstyled">
            <li>
            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="">
                <div class="col-lg-8">
                <h6 class="mb-2"><?= ($lastMessage['name']." ".($lastMessage['surname'])) ?> </h6>
                <small class="text-body-secondary"><?= ($dateFormatee) ?> </small>
                <small class="text-body-secondary"><?= htmlspecialchars($lastMessage['message']) ?> </small>
                </div>
            </a>
            </li>
        </ul>
    </div>
</div>
        <div class="p-4">
          <h4 class="fst-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">January 2021</a></li>
            <li><a href="#">December 2020</a></li>
            <li><a href="#">November 2020</a></li>
            <li><a href="#">October 2020</a></li>
            <li><a href="#">September 2020</a></li>
            <li><a href="#">August 2020</a></li>
            <li><a href="#">July 2020</a></li>
            <li><a href="#">June 2020</a></li>
            <li><a href="#">May 2020</a></li>
            <li><a href="#">April 2020</a></li>
          </ol>
        </div>
      </div>
<?php }?>