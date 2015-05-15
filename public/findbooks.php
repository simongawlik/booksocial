<?php
    /*
     * This file cleans up the user input from the search form and passes it to
     * the Google Books API. The outputs are then added to an associative array
     * and passes to a view to enable the user to select one of the results.
     */
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // clean up inputs to prevent html insertion
        $_POST["title"] = htmlspecialchars($_POST["title"]);
        $_POST["author"] = htmlspecialchars($_POST["author"]);
        $_POST["isbn"] = htmlspecialchars($_POST["isbn"]);
        
        // check that at least one field is filled out
        if (empty($_POST["title"]) 
            && empty($_POST["author"]) 
            && empty($_POST["isbn"]))
        {
            apologize("You must fill in at least one field.");
        }
        // check that ISBN is number
        else if (!is_numeric($_POST["isbn"]) && !empty($_POST["isbn"]))
        {
            apologize("Please only use numbers in the ISBN.");
        }
        // check that ISBN has proper format
        else if (strlen($_POST["isbn"]) != 10 
            && strlen($_POST["isbn"]) != 13 
            && !empty($_POST["isbn"]))
        {
            apologize("An ISBN number should be 10 or 13 digits long.");
        }
        // format parameters for API call 
        else
        {
            // use correct prefix for ISBN
            $isbn = "isbn:" . $_POST["isbn"] . "+";
            // if no ISBN given, pass empty string
            if (empty($_POST["isbn"]))
            {
                $isbn = "";
            }
            
            // remove leading and trailing spaces, replace spaces with '+'
            $_POST["author"] = preg_replace(
                '/\s+/', '+', trim($_POST["author"]));
            // use correct prefix for author
            $author = "inauthor:" . $_POST["author"] . "+";
            // if no author given, pass empty string
            if (empty($_POST["author"]))
            {
                $author = "";
            }
            
            // remove leading and trailing spaces, replace spaces with '+'
            $_POST["title"] = preg_replace(
                '/\s+/', '+', trim($_POST["title"]));
            // use correct prefix for title    
            $title = "intitle:" . $_POST["title"] . "+";
            // if no title given, pass empty string
            if (empty($_POST["title"]))
            {
                $title = "";
            }
            
            // add fixed parameters to ensure only books are returned
            $type = "&printType=books";
            // and number of results does not exceed 20
            $number = "&maxResults=20";
            
            // concatenate parameters
            $parameters = $isbn . $author . $title . $type . $number;
            
            // if too few parameters were be gathered prompt retry
            if ($parameters == $type . $number)
            {
                apologize("Your search does not have enough parameters.");
            }
            
            // make API request
            $page = file_get_contents(
                "https://www.googleapis.com/books/v1/volumes?q=" . 
                $parameters);
            
            // decode API response
            $data = json_decode($page, true);
            
            // if no results are returned
            if ($data["totalItems"] == 0)
            {
                apologize("No resuts were found. Please modify your search.");
            }
            
            // initiate array and add results that have ISBN_13 (UID in DB)
            $results = [];
            $counter = 0;
            
            // store all the results where ISBN_13 is given for display
            foreach ($data["items"] as $book)
            {
                // store title and subtitle (if it exists)
                $results[$counter]["title"] = $book["volumeInfo"]["title"];
                if (!empty($book["volumeInfo"]["subtitle"]))
                {
                    $results[$counter]["title"] = $results[$counter]["title"] .
                    ": " . $book["volumeInfo"]["subtitle"];
                }
                
                // store author(s)
                $results[$counter]["author"] = @implode(
                    ",", $book["volumeInfo"]["authors"]); 
                
                // store ISBN_13 (can be in different keys of the data array)
                $results[$counter]["isbn"] = "";
                if (!empty($book["volumeInfo"]["industryIdentifiers"][1]["type"]) 
                    && $book["volumeInfo"]["industryIdentifiers"][1]["type"] == "ISBN_13")
                {
                    $results[$counter]["isbn"] = $book["volumeInfo"]["industryIdentifiers"][1]["identifier"];
                }
                else if (!empty($book["volumeInfo"]["industryIdentifiers"][0]["type"]) 
                    && $book["volumeInfo"]["industryIdentifiers"][0]["type"] == "ISBN_13")
                {
                    $results[$counter]["isbn"] = $book["volumeInfo"]["industryIdentifiers"][0]["identifier"];
                }
                // if ISBN_13 not returned in response, use user input
                else if (strlen($_POST["isbn"]) == 13)
                {
                    $results[$counter]["isbn"] = $_POST["isbn"];
                }
                
                // if book has no picture, use default
                $results[$counter]["img"] = "/img/bookcovers/default.jpg";
                if (!empty($book["volumeInfo"]["imageLinks"]["thumbnail"]))
                {
                    $results[$counter]["img"] = $book["volumeInfo"]["imageLinks"]["thumbnail"];
                }
                
                // overwrite with next result if book does not have ISBN
                if ($results[$counter]["isbn"] != "")
                {
                    $counter++;
                }
            }
            // render results
            render("findbooks.php", [
                "title" => "Books Found", 
                "results" => $results, 
                "counter" =>$counter]);
        }
    }
    else
    {
        // else render form
        render("findbooks_form.php", ["title" => "Find Book"]);
    }

?>
