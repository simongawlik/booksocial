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
        <li><a href="index.php?booklist">My Bookshelf</a></li>
        <li><a href="index.php?loanlist">My Books on Loan</a></li>
        <li><a href="index.php?wishlist">My Wishlist</a></li>
    </ul>
</div>
    
<div id="list">
    <h3><?= $header ?></h3>
    
    <?php if (empty($books)): ?>
    
        You should add some books! <a href="findbooks.php">Add Books</a>
        
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
            
                <form name="<?= $book['isbn'] ?>" action="editlists.php?isbn=<?= $book['isbn'] ?>" method="post">
                    <button class="btn btn-default actionb" name="loan" type="submit">Loan Out</button>
                    <button class="btn btn-default actionb" name="move" type="submit">Move to Wishlist</button>
                    <button class="btn btn-default actionb" name="remove" type="submit">Remove</button>
                </form>
           
           <?php elseif ($book["status"] == "wishlist"): ?> 
       
                <form name="<?= $book['isbn'] ?>" action="editlists.php?isbn=<?= $book['isbn'] ?>" method="post">
                    <button class="btn btn-default actionw" name="move" type="submit">Move to Bookshelf</button>
                    <button class="btn btn-default actionw" name="remove" type="submit">Remove</button>
                </form>
            
            <?php endif ?>
            
            </td>
        </tr>

        <?php endforeach ?>

    </table>
    
    <?php endif ?>

</div>
