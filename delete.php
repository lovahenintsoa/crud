<?php
 
if(isset($_POST["id"])) {
    include_once 'CrudController.php';
    $crudcontroller = new CrudController();
    $result = $crudcontroller->delete($_POST["id"]);
    echo json_encode("Article supprimé avec succès");
}
?>