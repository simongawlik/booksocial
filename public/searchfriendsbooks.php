<?php
    /*
     * This file renders a form that asks a user to provide search terms to 
     * find books on any of his/her friends' lists. Once the form is submitted
     * and the search terms are cleaned up, it queries the database for book
     * titles and authors by substrings and adds the results to a list sorted
     * by relevance.
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
        
        // find all the books of users that this user accepted
        $rows = query("SELECT books.*, ownership.datetime, ownership.status, 
            friends.id, username FROM ownership JOIN friends ON 
            ownership.id = friends.id JOIN users on users.id = friends.id 
            JOIN books on books.isbn = ownership.isbn 
            WHERE friends.status = 'accepted' AND friends.id2 = ?",
            $_SESSION["id"]);
    
        // find all the books of users that accepted this user
        $rows2 = query("SELECT books.*, ownership.datetime, ownership.status, 
            friends.id2, username FROM ownership JOIN friends ON 
            ownership.id = friends.id2 JOIN users on users.id = friends.id2 
            JOIN books on books.isbn = ownership.isbn 
            WHERE friends.status = 'accepted' AND friends.id = ?",
            $_SESSION["id"]);
        
        // if both queries return no rows
        if ($rows == false && $rows2 == false)
        {
            apologize("You don't seem to have friends who have books that" . 
                " match your search");
        }
        
        // if results are only returned for second query
        if ($rows == false && $rows2 != false)
        {
            // capture results
            $array = $rows2;
        } 
        // if results are only returned for first query
        else if ($rows != false && $rows2 == false)
        {
            // capture results
            $array = $rows;
        }
        // if both queries return results
        else
        {
            // combine arrays into one large set
            $array = array_merge($rows, $rows2);
        }
        
        // map results onto associative array
        $results = [];
        foreach ($array as $row)
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
                    "owner" => $row["username"],
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
        render("friendsbooksresults.php", [
            "title" => "Friends' Books",
            "results" => $results]);
        
    }
    else
    {
        // else render search form
        render("searchfriendsbooks_form.php", ["title" => "Find Book"]);
    }

?>
