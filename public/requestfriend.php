<?php
    /*
     * This file checks for the click of the friend request button. It
     * inserts a row in the database. This will make request visible to other
     * user.
     */
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // send request to friends table
        query("INSERT INTO friends (id, id2, status) " . 
            "VALUES(?, ?, ?)", 
            $_SESSION["id"],
            $_GET["id"], 
            "sent");
        redirect("/index.php");
    }
    
    // exception handling
    else
    {
        apologize("Oops, you should not be here!");
    }

?>
