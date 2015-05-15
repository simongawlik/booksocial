<?php
    /*
     * This file renders a form that asks a user to provide search terms to 
     * find books on any of the lists. Once the form is submitted and the 
     * search terms are cleaned up, it queries the database for book titles
     * and authors by substrings and adds the results to a list sorted by 
     * relevance.
     */
     
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // clean up inputs to prevent html insertion
        $_POST["title"] = htmlspecialchars($_POST["title"]);
        $_POST["author"] = htmlspecialchars($_POST["author"]);
        
        // check that at least one field is filled out
        if (empty($_POST["title"]) && empty($_POST["author"]))
        {
            apologize("You must fill in at least one field.");
        }
        
        // clean title keywords (regex) and store with wildcards for substring
        // regex removes whitespace, trim leading and trailing spaces
        $titleterms = preg_split("/[\s,]+/", trim($_POST["title"]));

        // clean author keywords (regex) and store with wildcards for substring
        $authorterms = preg_split("/[\s,]+/", trim($_POST["author"]));
        
        // get all books of user
        $rows = query("SELECT ownership.isbn, title, author, imagepath, " . 
            "datetime, status, borrower, loanedon FROM ownership " . 
            "JOIN books ON ownership.isbn = books.isbn WHERE id = ? ", 
            $_SESSION["id"]);
        
        // if user has no books
        if ($rows == false)
        {
            apologize("You do not have any books on your bookshelf yet. Add " .
            "some first to search through them");
        }
        
        // put results into associative array
        $results = [];
        foreach ($rows as $row)
        {
            if ($row["status"] == "owned" || $row["status"] == "loaned")
            {
                $results[] = [
                    "isbn" => $row["isbn"],
                    "title" => $row["title"],
                    "author" => $row["author"],
                    "imagepath" => $row["imagepath"],
                    "status" => $row["status"],
                    "datetime" => date("m/d/Y", strtotime($row["datetime"])),
                    "match" => 0
                ];
            }
        }
        
        // mark all the results that match any substrings in title or author
        foreach ($results as &$result)
        {
            foreach ($titleterms as $term)
            {
                
                if (!empty($_POST["title"]))
                {
                    if (strpos(strtoupper($result["title"]), strtoupper($term))
                         !== false)
                    {
                        // match is improved when multiple substrings are found
                        $result["match"] += 1;
                    }
                }
            }
            
            foreach ($authorterms as $term)
            {
                if (!empty($_POST["author"]))    
                {
                    
                    if (strpos(strtoupper($result["author"]), strtoupper($term))
                         !== false && !empty($_POST["author"]))
                    {
                        // match is improved when multiple substrings are found
                        $result["match"] += 1;
                    }
                }
            }
        }
        
        // remove the books that have no substring match from array
        for ($i = 0, $n = count($results); $i < $n; $i++)
        {
            if ($results[$i]["match"] == 0)
            {
                unset($results[$i]);
            }
        }
        
        // sort results by relevance
        usort($results, function($a, $b) 
        {
            return $b["match"] - $a["match"];
        });
        
        // if no results are left
        if (empty($results))
        {
            apologize("Your search returned no results");
        }
        
        // render search results
        render("mybooksresults.php", [
            "title" => "Search in My Books",
            "results" => $results]);
    }
    else
    {
        // else render search form
        render("searchmybooks_form.php", ["title" => "Find Book"]);
    }

?>
