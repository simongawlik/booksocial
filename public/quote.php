<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_GET["title"]) && empty($_GET["author"]) && empty($_GET["isbn"]))
        {
            apologize("You must fill in at least one field.");
        }
        /*
        // check if symbol exists
        else if ($stock === false)
        {
            apologize("Symbol not found.");
        }
        */
        else
        {
            // format price to 2-4 decimal palces
            //$stock["price"] = format($stock["price"]);
        
            // display quote to user
            render("quote.php", ["title" => "Quote", "stock" => $stock]);
        }
        
    }
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Get Quote"]);
    }

?>
