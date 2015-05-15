<?php
    /*
     * This file lets the user decide if they want to accept or reject a friend
     * request. This handles the button on the My Friends page My Firend 
     * Requests section.
     */
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if accept was clicked        
        if (isset($_POST["accept"]))
        {
            // update relationship status
            query("UPDATE friends SET status = 'accepted' WHERE 
                id = ? AND id2 = ?", 
                $_GET["id"],
                $_SESSION["id"]);
            redirect("/friends.php");
        }
        
        // if accept was clicked
        else if (isset($_POST["reject"]))
        {
            // update relationship status which prevents further requests
            query("UPDATE friends SET status = 'rejected' WHERE 
                id = ? AND id2 = ?", 
                $_GET["id"],
                $_SESSION["id"]);
            redirect("/friends.php");
        }
    }
    // exception handling
    else
    {
        apologize("Oops, you should not be here!");
    }

?>
