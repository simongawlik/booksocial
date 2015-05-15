<?php
    /*
     * This file is used to handle the button clicks when the user is
     * looking at his lists of books.
     */
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if book exists in database
        $rows = query("SELECT status FROM ownership WHERE isbn = ? AND id = ?", 
            $_GET["isbn"], 
            $_SESSION["id"]);
        
        // if user clicked move to bookshelf
        if (isset($_POST["move"]) && $rows[0]["status"] == "wishlist")
        {
            // move to bookshelf
            query("UPDATE ownership SET status = 'owned' WHERE 
                id = ? AND isbn = ?", 
                $_SESSION["id"],
                $_GET["isbn"]);
            redirect("/index.php");
        }
        // if user clicked move to wishlist
        else if (isset($_POST["move"]) && $rows[0]["status"] == "owned")
        {
            // move to wishlist
            query("UPDATE ownership SET status = 'wishlist' WHERE 
                id = ? AND isbn = ?", 
                $_SESSION["id"],
                $_GET["isbn"]);
            redirect("/index.php");
        }
        
        // if user clicked remove
        else if (isset($_POST["remove"]))
        {
            // delete row from table
            query("DELETE FROM ownership WHERE id = ? AND isbn = ?", 
                $_SESSION["id"],
                $_GET["isbn"]);
            redirect("/index.php");
        }
        // if user clicked loan
        else if (isset($_POST["loan"]))
        {
            // render form to ask who is borrowing this book
            $rows = query("SELECT * FROM books WHERE isbn = ?", 
                $_GET["isbn"]);
            $book["title"] = $rows[0]["title"];
            $book["isbn"] = $rows[0]["isbn"];
            $book["author"] = $rows[0]["author"];
            render("loan_form.php", ["title" => "Loan Book", "book" => $book]);
        }
        // if user clicked return
        else if (isset($_POST["return"]))
        {
            //add to bookshelf, remove from books on loan list
            query("UPDATE ownership SET status = 'owned' WHERE 
                id = ? AND isbn = ?", 
                $_SESSION["id"],
                $_GET["isbn"]);
            redirect("/index.php");
        }
    }
    else
    {
        apologize("Oops, you should not be here!");
    }

?>
