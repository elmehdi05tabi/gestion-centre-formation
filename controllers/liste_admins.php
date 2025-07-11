<?php 
require_once("models/admins.php"); 
function login() {
    require_once('views/login.php');
}
function adminAction(){
   $validation =  admins() ; 
   if($validation =='oui') {
    header('location:index.php?action=liste') ; 
   }else{
    header('location:index.php?action=login') ; 
   }
}
?>
