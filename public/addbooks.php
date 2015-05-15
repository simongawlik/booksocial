<?php
    /*
     * This file allows the user to add a book that was returned in a Google
     * API response per the click of a button. First the program determines 
     * whether a book already exists in the DB and depending on the answer,
     * either links the existing book to the user in the ownership table or
     * creates the book in the books table first and then associates it with
     * the user.
     */
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if book exists in database
        $rows = query("SELECT * FROM books WHERE isbn = ?", 
            $_GET["isbn"]);
        
        // if no, insert book into database
        if ($rows == false)
        {
            // make call to API and get title, author, imagepath
            $page = file_get_contents(
                "https://www.googleapis.com/books/v1/volumes?q=isbn:" . 
                $_GET["isbn"]);
            
            // decode API response
            $data = json_decode($page, true);
            
            // create array for the response results
            $newbook = [];
            
            // store title and subtitle (if it exists)
            $newbook["title"] = $data["items"][0]["volumeInfo"]["title"];
            if (!empty($data["items"][0]["volumeInfo"]["subtitle"]))
            {
                $newbook["title"] = $newbook["title"] . ": " . 
                    $data["items"][0]["volumeInfo"]["subtitle"];
            }
            // store author(s) if included in API response or default answer
            $newbook["author"] = "no author found";
            if (!empty($data["items"][0]["volumeInfo"]["authors"]))
            {
                $newbook["author"] = @implode(
                    ", ", $data["items"][0]["volumeInfo"]["authors"]);
            }
            // store img URL if included in API response or default image            
            $newbook["img"] = "/img/bookcovers/default.jpg";
            if (!empty($data["items"][0]["volumeInfo"]["imageLinks"]["thumbnail"]))
            {
                $newbook["img"] = $data["items"][0]["volumeInfo"]["imageLinks"]["thumbnail"];
            }
            // store book info in DB books table
            query("INSERT INTO books (isbn, title, author, imagepath) " . 
                "VALUES(?, ?, ?, ?)", 
                $_GET["isbn"], 
                $newbook["title"], 
                $newbook["author"], 
                $newbook["img"]);
        }
        
        // check if user has book on bookshelf or wishlist
        $rows = query("SELECT * FROM ownership WHERE isbn = ? AND id = ?", 
            $_GET["isbn"], 
            $_SESSION["id"]);
        
        // check if user clicked wishlist
        if (isset($_POST["wishlist"]))
        {
            // if not currently in any of user's lists
            if ($rows == false)
            {
                // add to wishlist
                query("INSERT INTO ownership (id, isbn, status) " . 
                    "VALUES(?, ?, ?)", 
                    $_SESSION["id"],
                    $_GET["isbn"], 
                    "wishlist");
                redirect("/index.php");
            }
            // if already on bookshelf
            else if ($rows[0]["status"] == "owned")
            {
                // apologize, say already owned
                apologize("This book is already on your bookshelf");
            }
            // if already on wishlist
            else if ($rows[0]["status"] == "wishlist")
            {
                // apologize, say already on wishlist
                apologize("This book is already on your wishlist");
            }
        }
        
        // check if user clicked bookshelf
        else
        {
            // if not currently in any of user's lists
            if ($rows == false)
            {
                // add to bookshelf
                query("INSERT INTO ownership (id, isbn, status) " . 
                    "VALUES(?, ?, ?)", 
                    $_SESSION["id"],
                    $_GET["isbn"], 
                    "owned");
                redirect("/index.php");
            }
            // if already on bookshelf
            else if ($rows[0]["status"] == "owned")
            {    
                // apologize, say already owned
                apologize("This book is already on your bookshelf");
            }
            // if already on wishlist
            else if ($rows[0]["status"] == "wishlist")
            {
                //add to bookshelf, remove from wishlist
                query("UPDATE ownership SET status = 'owned' WHERE 
                    id = ? AND isbn = ?", 
                    $_SESSION["id"],
                    $_GET["isbn"]);
                redirect("/index.php");
            }
        }
    }
    // excepition handling
    else
    {
        apologize("Oops, you should not be here!");
    }

?>
