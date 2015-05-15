<?php
    /*
     * After a user clicks the 'Loan Out' button next to a book, and provides 
     * the details about the borrower on the next page, this file updates the
     * ownership table to finalize the transaction.
     */
     
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if borrower field was left empty
        if (empty($_POST["borrower"]))
        {
            apologize("Please enter who borrowed the book");
        }
        else
        {
            
            query("UPDATE ownership SET status = 'loaned', borrower = ?, loanedon = ? WHERE 
                id = ? AND isbn = ?",
                $_POST["borrower"], 
                date('Y-m-d'),
                $_SESSION["id"],
                $_GET["isbn"]);
            redirect("/index.php");
        }
    }
    // exception handling
    else
    {
        apologize("Oops, you should not be here!");
    }

?>
