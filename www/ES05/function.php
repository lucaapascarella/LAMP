<?php
    function login($email, $password) {
  
        if(! isset($email, $password)) 
          return array(false, "Inserire le proprie credenziali e premere il pulsante login.");
          
        if(empty($email) || empty($password)) 
          return array(false, "Inserire le proprie credenziali e premere il pulsante login.");
        
        [$retval,$pdodb] = _pdodb_connection();
        if(!$retval) {return array(false, $pdodb);} //TODO: debug only
        }
          {
            $sql = "SELECT id, username, password, salt FROM members WHERE email=:email LIMIT 10";
            $stmt = $pdodb->prepare($sql);
            $retval = $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $retval = $stmt->execute();
            $rowCount = $stmt->rowCount();
          }
            if($rowCount == 1) {
              //l'utente esiste
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $db_userid = $row['id'];
              $db_username = $row['username'];
              $db_password = $row['password'];
              // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
          }
                // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
      if($db_password == $password) { 
        // Password corretta! Login eseguito con successo.
        $_SESSION['userid'] = $db_userid; 
        $_SESSION['username'] = $db_username;
        return array(true, "Login eseguito correttamente");
      } else 
        // Password sbagliata.
        $_SESSION['userid'] = null;
        return array(false, "Attenzione! Password sbagliata.");
       {
      // L'utente inserito non esiste.
      $_SESSION['userid'] = null;
      return array(false, "Attenzione! L'utente inserito non esiste.");
    }  
    
    /*catch (Exception $e) {
    return array(false, "Attenzione! Errore: " . $e->getMessage());
  }*/
?>