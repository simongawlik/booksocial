<?php
    /*
     * This file takes input from a form that allows users to find other users 
     * and tries to match the input to the users table. If successful, it
     * renders the search results.
     */
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // clean up inputs to prevent html insertion
        $_POST["username"] = htmlspecialchars($_POST["username"]);
        $_POST["email"] = htmlspecialchars($_POST["email"]);
        
        // input validation
        if (empty($_POST["username"]) && empty($_POST["email"]))
        {
            apologize("You must fill in at least one field.");
        }
        
        else
        {
            // create terms for substring DB search using wildcards
            $prepusername = "";
            if (!empty($_POST["username"]))
            {
                $prepusername = "%" . $_POST["username"] . "%";
            }
            $prepemail = "";
            if (!empty($_POST["email"]))
            {
                $prepemail = "%" . $_POST["email"] . "%";
            }
            
            // query user table to find user and sort results
            $rows = query("SELECT * FROM users WHERE username LIKE ? 
                OR email LIKE ? ORDER BY username", 
                $prepusername,
                $prepemail);
            
            // if query is unsuccessful
            if ($rows == false)
            {
                apologize("There is no one by that username");
            }
            
            // return search results
            else
            {
                $user = [];
                $counter = 0;
                foreach ($rows as $row)
                {
                    $user[$counter]["name"] = $row["username"];
                    $user[$counter]["id"] = $row["id"];
                    
                    /* check if one of users sent request before to prevent
                     * duplicate friend requests
                     */
                    $user[$counter]["auth"] = false;
                    $checkone = query("SELECT * FROM friends WHERE id = ? 
                        AND id2 = ?", 
                        $_SESSION["id"],
                        $row["id"]);
                    $checktwo = query("SELECT * FROM friends WHERE id = ? 
                        AND id2 = ?", 
                        $row["id"],
                        $_SESSION["id"]);
                    // update "auth" if there was a request to prevent 
                    if ($checkone != false || $checktwo != false)
                    {
                        $user[$counter]["auth"] = true;
                    }
                    
                    // overwrite results if username is that of logged in user
                    if ($user[$counter]["id"] != $_SESSION["id"])
                    {
                        $counter++;
                    }
                }
                // render search results
                render("findfriends.php", [
                    "title" => "Friends Found", 
                    "user" => $user, 
                    "counter" =>$counter]);
            }
        }
    }
    else
    {
        // else render form
        render("findfriends_form.php", ["title" => "Find Book"]);
    }

?>
