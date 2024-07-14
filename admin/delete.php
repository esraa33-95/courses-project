<?php
include_once('include/conn.php');
 $id = $_GET['id'];
 try{
    $sql = "DELETE FROM `categories` WHERE `id`= ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
   echo "delete successfully,please back and refresh page";
    }
    catch(PDOException $e) {
      $msg = "error" . $e->getMessage();
    }

    try{
      $sql = "DELETE FROM `courses` WHERE `id`= ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$id]);
      
      }
      catch(PDOException $e) {
        $msg = "error" . $e->getMessage();
      }
?>