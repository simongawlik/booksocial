<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if username and password were provided
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            apologize("You must choose a username and password.");
        }
        // check if email address was provided 
        else if (empty($_POST["email"]))
        {
            apologize("You need to provide an email address.");
        }
        // check if username matches confirmation
        else if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Your password and confirmation need to match.");
        }
        else
        {
            // create new user in the DB
            $result = query("INSERT INTO users (username, hash, cash, email) 
                        VALUES(?, ?, 10000.00, ?)", 
                        $_POST["username"], 
                        crypt($_POST["password"]), 
                        $_POST["email"]);
            // if insertion fails, username taken
            if ($result === false)
            {
                apologize("This username is already taken.");
            }
            // if insertion succeeds
            else
            {
                // find unique ID
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $id = $rows[0]["id"];
                
                // remember that user's now logged in by storing ID in session
                $_SESSION["id"] = $id;

                // redirect to portfolio
                redirect("/index.php");
            }
        }
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>
