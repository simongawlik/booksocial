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

    <h3>My Bookshelf</h3>
    
    <?php if (empty($ownedbooks)): ?>
        
        You should add some books! <a href="findbooks.php">Add Books</a></br></br></br>
        
    <?php else: ?>
    
    <table class="table table-striped">
        <tr>
            <th>Cover</th>
            <th>Title</th>
            <th>Author(s)</th>
            <th>ISBN</th>
            <th>Added on</th>
            <th>Action</th>
        </tr>
        
        <?php foreach ($ownedbooks as $ownedbook): ?>

        <tr>
            <td><img src="<?= $ownedbook['imagepath'] ?>" height="146"></td>
            <td><?= $ownedbook["title"] ?></td>
            <td><?= $ownedbook["author"] ?></td>
            <td><?= $ownedbook["isbn"] ?></td>
            <td><?= $ownedbook["datetime"] ?></td>
            <td>
                <form name="<?= $ownedbook['isbn'] ?>" action="editlists.php?isbn=<?= $ownedbook['isbn'] ?>" method="post">
                    <button class="btn btn-default actionb" name="loan" type="submit">Loan Out</button>
                    <button class="btn btn-default actionb" name="move" type="submit">Move to Wishlist</button>
                    <button class="btn btn-default actionb" name="remove" type="submit">Remove</button>
                </form>
            </td>
        </tr>

        <?php endforeach ?>

    </table>
    
    <?php endif ?>
    
    <h3>My Books on Loan</h3>
    
    <?php if (empty($loanedbooks)): ?>
    
        You have no books on loan at this moment.</br></br></br>
        
    <?php else: ?>
    
    <table class="table table-striped">
        <tr>
            <th>Cover</th>
            <th>Title</th>
            <th>Author(s)</th>
            <th>ISBN</th>
            <th>Borrowed By</th>
            <th>Borrowed On</th>
            <th>Action</th>
        </tr>
    
        <?php foreach ($loanedbooks as $loanedbook): ?>

        <tr>
            <td><img src="<?= $loanedbook['imagepath'] ?>" height="146"></td>
            <td><?= $loanedbook["title"] ?></td>
            <td><?= $loanedbook["author"] ?></td>
            <td><?= $loanedbook["isbn"] ?></td>
            <td><?= $loanedbook["borrower"] ?></td>
            <td><?= $loanedbook["loanedon"] ?></td>
            <td>
                <form name="<?= $loanedbook['isbn'] ?>" action="editlists.php?isbn=<?= $loanedbook['isbn'] ?>" method="post">
                    <button class="btn btn-default" name="return" type="submit">Return to Bookshelf</button>
                </form>
            </td>
        </tr>

        <?php endforeach ?>

    </table>
    
    <?php endif ?>

    <h3>My Wishlist</h3>
    
    <?php if (empty($wishlistbooks)): ?>
    
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
    
        <?php foreach ($wishlistbooks as $wishlistbook): ?>

        <tr>
            <td><img src="<?= $wishlistbook['imagepath'] ?>" height="146"></td>
            <td><?= $wishlistbook["title"] ?></td>
            <td><?= $wishlistbook["author"] ?></td>
            <td><?= $wishlistbook["isbn"] ?></td>
            <td><?= $wishlistbook["datetime"] ?></td>
            <td>
                <form name="<?= $wishlistbook['isbn'] ?>" action="editlists.php?isbn=<?= $wishlistbook['isbn'] ?>" method="post">
                    <button class="btn btn-default actionw" name="move" type="submit">Move to Bookshelf</button>
                    <button class="btn btn-default actionw" name="remove" type="submit">Remove</button>
                </form>
            </td>
        </tr>

        <?php endforeach ?>

    </table>
    
    <?php endif ?>

</div>
