<?php
    function login($email, $password) {
  
        if(! isset($email, $password)) 
          return array(false, "Inserire le proprie credenziali e premere il pulsante login.");
          
        if(empty($email) || empty($password)) 
          return array(false, "Inserire le proprie credenziali e premere il pulsante login.");
        
        [$retval,$pdodb] = _pdodb_connection();
        if(!$retval) {return array(false, $pdodb);} //TODO: debug only
        }
        /*try  {
          $sql = "SELECT id, username, password, salt FROM members WHERE email=:email LIMIT 1";
          $stmt = $pdodb->prepare($sql);
          $retval = $stmt->bindParam(':email', $email, PDO::PARAM_STR);
          $retval = $stmt->execute();
          $rowCount = $stmt->rowCount();
        }*/
          if($rowCount == 1) {
            //l'utente esiste
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $db_userid = $row['id'];
            $db_username = $row['username'];
            $db_password = $row['password'];
            // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
        }
?>