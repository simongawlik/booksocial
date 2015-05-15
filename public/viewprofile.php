<?php
    /*
     * This file renders a friend's profile when a user clicks on the View 
     * Profile button in the friends list. The profile includes the friend's 
     * booklist, books on loan, and wishlist.
     */
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // get the id from the specific button to identify friend
        if (isset($_GET["id"]))
        {
            // find the friend in the users table and get details
            $rows = query("SELECT * FROM users WHERE id = ?", $_GET["id"]);
            $user["name"] = $rows[0]["username"];
            $user["email"] = $rows[0]["email"];
            $user["id"] = $_GET["id"];
            
            // find the friend's books
            $rows = query("SELECT ownership.isbn, title, author, imagepath, 
                datetime, status, borrower, loanedon FROM ownership JOIN books 
                ON ownership.isbn = books.isbn WHERE id = ? ORDER BY title", 
                $_GET["id"]);
            
            // save owned books separately
            $own = [];
            foreach ($rows as $row)
            {
                if ($row["status"] == "owned")
                {
                    $own[] = [
                        "isbn" => $row["isbn"],
                        "title" => $row["title"],
                        "author" => $row["author"],
                        "imagepath" => $row["imagepath"],
                        "status" => $row["status"],
                        "datetime" => date("m/d/Y", strtotime($row["datetime"]))
                    ];
                }
            }

            // save books on loan separately
            $loan = [];
            foreach ($rows as $row)
            {
                if ($row["status"] == "loaned")
                {
                    $loan[] = [
                        "isbn" => $row["isbn"],
                        "title" => $row["title"],
                        "author" => $row["author"],
                        "imagepath" => $row["imagepath"],
                        "status" => $row["status"],
                        "borrower" => $row["borrower"],
                        "loanedon" => $row["loanedon"],
                        "datetime" => date("m/d/Y", strtotime($row["datetime"]))
                    ];
                }
            }
        
            // save books on wishlist separately
            $wishlist = [];
            foreach ($rows as $row)
            {
                if ($row["status"] == "wishlist")
                {
                    $wishlist[] = [
                        "isbn" => $row["isbn"],
                        "title" => $row["title"],
                        "author" => $row["author"],
                        "imagepath" => $row["imagepath"],
                        "status" => $row["status"],
                        "datetime" => date("m/d/Y", strtotime($row["datetime"]))
                    ];
                }
            }
            
            // store friend's user and book data in Session
            $_SESSION["friend"] = [
                "title" => $user["name"] . "'s Profile",
                "user" => $user,
                "ownedbooks" => $own,
                "loanedbooks" => $loan,
                "wishlistbooks" => $wishlist
            ];
            
            // render all of friend's lists
            render("viewprofile.php", [
                "title" => $user["name"] . "'s Profile",
                "user" => $user,
                "ownedbooks" => $own,
                "loanedbooks" => $loan,
                "wishlistbooks" => $wishlist]);
        }
    }
    // exception handling
    else
    {
        apologize("Oops, you should not be here!");
    }

?>
