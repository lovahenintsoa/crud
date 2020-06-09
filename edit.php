<?php
 
if(isset($_POST["id"])) {
    include_once 'CrudController.php';
    $crudcontroller = new CrudController();
    $result = $crudcontroller->edit();
    echo json_encode("Article mis à jour avec succès");
} 