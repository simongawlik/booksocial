<ul class="nav nav-pills">
    <li><a href="index.php">My Shelves</a></li>
    <li><a href="searchmybooks.php">Search My Shelves</a></li>
    <li><a href="findbooks.php">Add Books To Shelves</a></li>
    <li><a href="friends.php">My Friends</a></li>
    <li><a href="searchfriendsbooks.php">Search My Friends' Shelves</a></li>
    <li><a href="findfriends.php">Add Friends</a></li>
    <li><a href="logout.php"><strong>Log Out</strong></a></li>
</ul>

<div id="dashboard">
    <ul class="nav nav-pills nav-stacked">
        <li><a href="friendbooklist.php?booklist"><?= $user["name"] . "'s" ?> Bookshelf</a></li>
        <li><a href="friendbooklist.php?loanlist"><?= $user["name"] . "'s" ?> Books on Loan</a></li>
        <li><a href="friendbooklist.php?wishlist"><?= $user["name"] . "'s" ?> Wishlist</a></li>
    </ul>
</div>
    
<div id="list">
    <h3><?= $header ?></h3>
    
    <?php if (empty($books)): ?>
    
        No books yet!
        
    <?php else: ?>
    
    <table class="table table-striped">
        <tr>
            <th>Cover</th>
            <th>Title</th>
            <th>Author(s)</th>
            <th>ISBN</th>
            <th>Added On</th>
            <th>Action</th>
        </tr>
    
        <?php foreach ($books as $book): ?>

        <tr>
            <td><img src="<?= $book['imagepath'] ?>" height="146"></td>
            <td><?= $book["title"] ?></td>
            <td><?= $book["author"] ?></td>
            <td><?= $book["isbn"] ?></td>
            <td><?= $book["datetime"] ?></td>
            <td>
       
            <?php if ($book["status"] == "owned"): ?>
            
                <form name="<?= $book['isbn'] ?>" action="emailborrowrequest.php?isbn=<?= $book['isbn'] ?>&owner=<?= $user['name'] ?>" method="post">
                    <button class="btn btn-default" name="borrow" type="submit">Request to Borrow</button>
                </form>
           
           <?php elseif ($book["status"] == "wishlist"): ?> 
       
                <form name="<?= $book['isbn'] ?>" action="http://www.amazon.com/gp/search/ref=sr_adv_b/?field-isbn=<?= $book['isbn'] ?>" method="post">
                    <button class="btn btn-default" name="buy" type="submit">Buy on Amazon</button>
                </form>
            
            <?php endif ?>
            
            </td>
        </tr>

        <?php endforeach ?>

    </table>
    
    <?php endif ?>

</div>
