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

    <h3>Found in My Friends' Bookshelf</h3>
    
    <table class="table table-striped">
        <tr>
            <th>Cover</th>
            <th>Title</th>
            <th>Author(s)</th>
            <th>ISBN</th>
            <th>Friend</th>
            <th>Added On</th>
            <th>Action</th>
        </tr>
        
        <?php foreach ($results as $result): ?>

        <tr>
            <td><img src="<?= $result['imagepath'] ?>" height="146"></td>
            <td><?= $result["title"] ?></td>
            <td><?= $result["author"] ?></td>
            <td><?= $result["isbn"] ?></td>
            <td><?= $result["owner"] ?></td>
            <td><?= $result["datetime"] ?></td>
            <td>
                <form name="<?= $result['isbn'] ?>" action="emailborrowrequest.php?isbn=<?= $result['isbn'] ?>&owner=<?= $result['owner'] ?>" method="post">
                    <button class="btn btn-default" name="borrow" type="submit">Request to Borrow</button>
                </form>
            </td>
        </tr>

        <?php endforeach ?>

    </table>

</div>
