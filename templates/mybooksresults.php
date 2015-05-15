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

    <h3>Found in my Bookshelf</h3>
    <table class="table table-striped">
        <tr>
            <th>Cover</th>
            <th>Title</th>
            <th>Author(s)</th>
            <th>ISBN</th>
            <th>Added On</th>
            <th>Action</th>
        </tr>
        
        <?php foreach ($results as $result): ?>

        <tr>
            <td><img src="<?= $result['imagepath'] ?>" height="146"></td>
            <td><?= $result["title"] ?></td>
            <td><?= $result["author"] ?></td>
            <td><?= $result["isbn"] ?></td>
            <td><?= $result["datetime"] ?></td>
            <td>
        
        <?php if ($result["status"] == "owned"): ?>
        
                <form name="<?= $result['isbn'] ?>" action="editlists.php?isbn=<?= $result['isbn'] ?>" method="post">
                    <button class="btn btn-default actionb" name="loan" type="submit">Loan Out</button>                    </br>
                    <button class="btn btn-default" name="move" type="submit">Move to Wishlist</button>
                    <button class="btn btn-default" name="remove" type="submit">Remove</button>
                </form>
        
        <?php else: ?>
        
                <form name="<?= $result['isbn'] ?>" action="editlists.php?isbn=<?= $result['isbn'] ?>" method="post">
                    <button class="btn btn-default" name="return" type="submit">Return to Bookshelf</button>
                </form>
        
        <?php endif ?>
        
            </td>
        </tr>

        <?php endforeach ?>

    </table>

</div>
