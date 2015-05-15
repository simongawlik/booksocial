<?php
    /*
     * This file responds to the request to borrow button wherever a friend's 
     * books are displayed (after search or view profile). It allows the user
     * to send an automated email with the requested book's information to the
     * owner. Currently, there is no funcitonality to approve or deny requests.
     * It purely shows the owner who is interested in borrowing a book.
     */
     
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if user clicked borrow
        if (isset($_POST["borrow"]))
        {
            // get associated book information
            $rows = query("SELECT * FROM books WHERE isbn = ?", 
                $_GET["isbn"]);
            $book["title"] = $rows[0]["title"];
            $book["isbn"] = $rows[0]["isbn"];
            $book["author"] = $rows[0]["author"];
            $book["owner"] = $_GET["owner"];
            
            // get owner's information
            $rows = query("SELECT * FROM users WHERE username = ?", 
                $_GET["owner"]);
            $book["email"] = $rows[0]["email"];
            
            // get requester's information
            $rows = query("SELECT * FROM users WHERE id = ?", 
                $_SESSION["id"]);
            $requester = $rows[0]["username"];
            
            // send borrow request email
            include '../includes/emailborrowrequest.php';
            
            // render confirmation screen to show successful mailing
            render("borrow_confirmation.php", [
                "title" => "Borrow Confirmation", 
                "book" => $book, 
                "requester" => $requester]);
        }

    }
    // exception handling
    else
    {
        apologize("Oops, you should not be here!");
    }

?>
