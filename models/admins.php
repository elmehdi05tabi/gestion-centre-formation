<?php 
// afficher la lilste des admins 
function admins() {
    $username = $_POST['username']  ; 
    $password = $_POST['password'] ;
    session_start() ;  
    $_SESSION['valider'] = 'non' ; 
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("SELECT * FROM admins") ; 
    $sqlState->execute() ; 
    $admins =  $sqlState->fetchAll(PDO::FETCH_OBJ); 
    foreach($admins as $admin) {
        if($admin->username == $username|| $admin->password ==$password ){
            $_SESSION['valider'] = 'oui' ; 
        }else {
            $message = "err" ;
        }
    }
    return $_SESSION['valider'] ; 
}

?>