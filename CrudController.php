<?php
include_once 'Dao.php';

class CrudController{

    /* Fetch All*/
    public function readData(){
    try{
        $dao = new Dao();
        $cnx = $dao->openConnection();
        $sql = "SELECT id, title, description, url, category FROM `tb_links` ORDER BY id DESC";
        $resource = $cnx->query($sql);
        $result = $resource->fetchAll();
        $dao -> closeConnexion();
        } catch (PDOException $e){
            echo "There is some probleme in connection: ".$e->getMessage();
        }
        if (! empty($result)){
            return $result;
        }
}
    


/* Fetch Single Record by Id */
public function readSingle($id) {
    try {           
        $dao = new Dao();
        $cnx = $dao->openConnection();            
        $sql = "SELECT id, title, description, url, category FROM `tb_links` WHERE id=:id";          
        $stmt = $cnx->prepare($sql);
        $stmt->execute(array('id' => $id));
        $result = $stmt->fetchAll();           
        $dao -> closeConnexion();
    } catch (PDOException $e) {          
        echo "There is some problem : " . $e->getMessage();
    }
    if (! empty($result)) {
        return $result;
    }
}
     /* Add New Record */
    public function add(){
            try {
                $dao = new Dao();
                $cnx = $dao->openConnection();
                $sql = "INSERT INTO tb_links (title, description, url,category) VALUES (:title,:description,:url,:category)";
                        
                $stmt=$cnx->prepare($sql);
                $stmt->execute( array(  'title'         => $_POST['title'],
                                        'description'   => $_POST['description'],
                                        'url'           => $_POST['url'],
                                        'category'      => $_POST['category']));
                    
                $dao -> closeConnexion();
               } catch (PDOException $e){
                echo "There is some probleme in connection: ".$e->getMessage();
               }

    }

    /* Edit a Record */
    public function edit() {
        try {
            $dao = new Dao();
            $cnx = $dao->openConnection();
            $sql = "UPDATE tb_links SET title = :title, description=:description, url=:url, category=:category WHERE id=:id";
            $stmt=$cnx->prepare($sql);
            $stmt->execute( array('title'       => $_POST['title'],
                                  'description' => $_POST['description'],
                                  'url'         => $_POST['url'],
                                  'category'    => $_POST['category'],
                                  'id'          => $_POST['id']));
            $dao -> closeConnexion();
        } catch(PDOException $e) {
            echo "There is some problem : " . $e->getMessage();
        }
    }
    public function delete($id){
        
        try {
            $dao = new Dao();
            $cnx = $dao->openConnection();

            $sql = "DELETE FROM tb_links WHERE id=:id";
            $stmt = $cnx->prepare($sql);
            $stmt -> execute(array('id'=>$id));
            $dao -> closeConnexion();
        } catch (PDOException $e){
            echo "There is some problem: ".$e->getMessage();
        }
    }







}