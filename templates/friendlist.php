<ul class="nav nav-pills">
    <li><a href="index.php">My Shelves</a></li>
    <li><a href="searchmybooks.php">Search My Shelves</a></li>
    <li><a href="findbooks.php">Add Books To Shelves</a></li>
    <li><a href="friends.php">My Friends</a></li>
    <li><a href="searchfriendsbooks.php">Search My Friends' Shelves</a></li>
    <li><a href="findfriends.php">Add Friends</a></li>
    <li><a href="logout.php"><strong>Log Out</strong></a></li>
</ul>

<div>
    <h3>My Friend Requests</h3>
    
    <?php if (empty($requests)): ?>
    
    <p>There are no pending friend requests.</p>
    
    <?php else: ?>
    
    <table class="table table-striped">
        <tr>
            <th>Username</th>
            <th>Request Sent On</th>
            <th>Action</th>
        </tr>

    <?php foreach ($requests as $request): ?>
        
        <tr>
            <td><?= $request["username"] ?></td> 
            <td><?= $request["datetime"] ?></td>
            <td>
                <form action="respondrequest.php?id=<?= $request['id'] ?>" method="post">
                    <button class="btn btn-default" name="accept" type="submit">Accept</button>
                    <button class="btn btn-default" name="reject" type="submit">Reject</button>
                </form>
            </td>
        </tr>

    <?php endforeach ?>
    
    </table>
    
    <?php endif?>
    
    <h3>My Friends</h3>
    
    <?php if (empty($friends)): ?>
    
    <p>You should <a href="findfriends.php">add</a> some friends.</p>
    
    <?php else: ?>
    
    <table class="table table-striped">
        <tr>
            <th>Username</th>
            <th>Friends Since</th>
            <th>Action</th>
        </tr>
        
    <?php for ($i = 0; $i < $counter; $i++): ?>
        
        <tr>
            <td><?= $friends[$i]["username"] ?></td> 
            <td><?= $friends[$i]["datetime"] ?></td>
            <td>
                <form name="<?= $i ?>" action="viewprofile.php?id=<?= $friends[$i]['id'] ?>" method="post">
                    <button class="btn btn-default" name="bookshelf" type="submit">View Profile</button>
                </form>
            </td>
        </tr>

    <?php endfor ?>
    
    </table>
    
    <?php endif?>
    
</div>
