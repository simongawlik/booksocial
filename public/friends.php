<?php
    /*
     * This file renders the list of friends and any pending friend requests
     * to the user.
     */
    
    // configuration
    require("../includes/config.php"); 
    
    // find people who sent pending friend request ordered by date (default)
    $rows = query("SELECT username, datetime, friends.id FROM users 
        JOIN friends ON users.id = friends.id WHERE status = 'sent' 
        AND friends.id2 = ?",
        $_SESSION["id"]);
    
    $requests = [];
    foreach ($rows as $row)
    {
        $requests[] = [
            "username" => $row["username"],
            "datetime" => date("m/d/Y", strtotime($row["datetime"])),
            "id" => $row["id"]
            ];
    }
    
    // query DB for friends, need to check relationships both ways
    $friends = [];
    $counter = 0;
    
    // find users that this user accepted
    $rows = query("SELECT username, datetime, friends.id FROM users JOIN friends ON 
        users.id = friends.id WHERE status = 'accepted' AND friends.id2 = ?",
        $_SESSION["id"]);
    // if this type of relationship exists, start adding friends to array
    if ($rows != false)
    {
        foreach ($rows as $row)
        {
            $friends[$counter]["username"] = $row["username"];
            $friends[$counter]["datetime"] = date("m/d/Y", strtotime($row["datetime"]));
            $friends[$counter]["id"] = $row["id"];
            $counter++;
        }
    }
    
    // find users that accepted this user
    $rows = query("SELECT username, datetime, friends.id2 FROM users JOIN friends ON 
        users.id = friends.id2 WHERE status = 'accepted' AND friends.id = ?", 
        $_SESSION["id"]);
    // if this type of relationship exists, add friends to array
    if ($rows != false)
    {    
        foreach ($rows as $row)
        {
            $friends[$counter]["username"] = $row["username"];
            $friends[$counter]["datetime"] = date("m/d/Y", strtotime($row["datetime"]));
            $friends[$counter]["id"] = $row["id2"];
            $counter++;
        }
    }
    
    // sort results by name
    usort($friends, function($a, $b) 
    {
        return $b["username"] - $a["username"];
    });
    
    // render list of friends and requests
    render("friendlist.php", [
        "friends" => $friends,
        "requests" => $requests,
        "counter" => $counter,
        "title" => "My Friend List"]);

?>
