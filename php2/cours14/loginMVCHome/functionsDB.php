<?php
    // Modèle
    function connectDB() {
        $link = mysqli_connect("localhost", "root", "", "usager");

        if (!$link) {
            trigger_error("Erreur de connextion" . mysqli_connect_error());
        }
        mysqli_query($link, "SET NAMES 'utf8'");
        
        return $link;
    }
    
    $connection = connectDB();
    
    function authentication($user, $pass) {
        global $connection;
        
        $query = "SELECT password FROM usager WHERE username = '$user'";
        $result = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($result);
        if (password_verify($_POST['password'], $row['password'])) {
            return true;
        } else {
            return false;
        }
    }
?>