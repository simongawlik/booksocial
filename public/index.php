<?php
    /*
     * This is the default Homepage when logged in. The user can see his own 
     * lists of books and can look at them individually by clicking on the 
     * navigation links on the lefthand side.
     */
    
    // configuration
    require("../includes/config.php"); 
    
    // query DB for books' status and join with ownership table
    $rows = query("SELECT ownership.isbn, title, author, imagepath, datetime, 
        status, borrower, loanedon FROM ownership 
        JOIN books ON ownership.isbn = books.isbn 
        WHERE id = ? ORDER BY title", 
        $_SESSION["id"]);
    
    // store all the books displayed in My Bookshelf
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
    
    // store all the books displayed in My Books on Loan
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
                "loanedon" => date("m/d/Y", strtotime($row["loanedon"])),
                "datetime" => date("m/d/Y", strtotime($row["datetime"]))
            ];
        }
    }
    
    // store all the books displayed in My Wishlist
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
    
    // if the lefthand link to My Booklist was clicked
    if (isset($_GET["booklist"]))
    {
        // render only My Booklist
        render("mybooklist.php", [
            "title" => "My Book Lists",
            "header" => "My Bookshelf",
            "books" => $own]);
    }
    
    // if the lefthand link to My Books on Loan was clicked
    else if (isset($_GET["loanlist"]))
    {
        // render only My Books on Loan
        render("loanlist.php", [
            "title" => "My Book Lists",
            "header" => "My Books On Loan",
            "loanedbooks" => $loan]);
    }
    
    // if the lefthand link to My Wishlist was clicked
    else if (isset($_GET["wishlist"]))
    {
        // render only My Books on Loan
        render("mybooklist.php", [
            "title" => "My Book Lists",
            "header" => "My Wishlist",
            "books" => $wishlist]);
    }
    
    // by default
    else
    {
        // render all lists
        render("portfolio.php", [
            "title" => "My Book Lists",
            "ownedbooks" => $own,
            "loanedbooks" => $loan,
            "wishlistbooks" => $wishlist]);
    }
?>
