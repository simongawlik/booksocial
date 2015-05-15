<?php
    /*
     * This file renders a user's friend's booklist, books on loan, or wishlist
     * when a user clicks on the links in the dashboard of a friend's profile.
     */
     
    // configuration
    require("../includes/config.php"); 
    
    // if user clicks booklist link in left-hand menu
    if (isset($_GET["booklist"]))
    {
        // render all the books that friend owns
        render("friendbooklist.php", [
            "title" => $_SESSION["friend"]["title"],
            "user" => $_SESSION["friend"]["user"],
            "header" => $_SESSION["friend"]["user"]["name"] . "'s Bookshelf",
            "books" => $_SESSION["friend"]["ownedbooks"]]);
    }
    
    // if user clicks loanlist link in left-hand menu
    else if (isset($_GET["loanlist"]))
    {
        // render all the books that friend has loaned out
        render("friendloanlist.php", [
            "title" => $_SESSION["friend"]["title"],
            "user" => $_SESSION["friend"]["user"],
            "header" => $_SESSION["friend"]["user"]["name"] . "'s Books On Loan",
            "loanedbooks" => $_SESSION["friend"]["loanedbooks"]]);
    }
    
    // if user clicks wishlist link in left-hand menu
    else if (isset($_GET["wishlist"]))
    {
        // render all the books that friend has on wishlist
        render("friendbooklist.php", [
            "title" => $_SESSION["friend"]["title"],
            "user" => $_SESSION["friend"]["user"],
            "header" => $_SESSION["friend"]["user"]["name"] . "'s Wishlist",
            "books" => $_SESSION["friend"]["wishlistbooks"]]);
    }
    // exception handling
    else
    {
        apologize("Oops, you should not be here!");
    }

?>
