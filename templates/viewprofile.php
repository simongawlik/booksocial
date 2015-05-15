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
        <li><a href="friendbooklist.php?booklist"><?= $user["name"] ?>'s Bookshelf</a></li>
        <li><a href="friendloanlist.php?loanlist"><?= $user["name"] ?>'s Books on Loan</a></li>
        <li><a href="friendbooklist.php?wishlist"><?= $user["name"] ?>'s Wishlist</a></li>
    </ul>
</div>
    
<div id="list">
    <h3><?= $user["name"] . "'s" ?> Bookshelf</h3>
    
    <?php if (empty($ownedbooks)): ?>
        
        <?= $user["name"] ?> does not have any books yet.</br></br></br>
        
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
    <?php foreach ($ownedbooks as $ownedbook): ?>

        <tr>
            <td><img src="<?= $ownedbook['imagepath'] ?>" height="146"></td>
            <td><?= $ownedbook["title"] ?></td>
            <td><?= $ownedbook["author"] ?></td>
            <td><?= $ownedbook["isbn"] ?></td>
            <td><?= $ownedbook["datetime"] ?></td>
            <td>
                <form name="<?= $ownedbook['isbn'] ?>" action="emailborrowrequest.php?isbn=<?= $ownedbook['isbn'] ?>&owner=<?= $user['name'] ?>" method="post">
                    <button class="btn btn-default" name="borrow" type="submit">Request to Borrow</button>
                </form>
            </td>
        </tr>

    <?php endforeach ?>

    </table>
    
    <?php endif ?>
    
    <h3><?= $user["name"] . "'s" ?> Books on Loan</h3>
    
    <?php if (empty($loanedbooks)): ?>
    
        <?= $user["name"] ?> has no books on loan at this moment.</br></br></br>
        
    <?php else: ?>
    
    <table class="table table-striped">
        <tr>
            <th>Cover</th>
            <th>Title</th>
            <th>Author(s)</th>
            <th>ISBN</th>
            <th>Borrowed By</th>
            <th>Borrowed On</th>
        </tr>
    
    <?php foreach ($loanedbooks as $loanedbook): ?>

        <tr>
            <td><img src="<?= $loanedbook['imagepath'] ?>" height="146"></td>
            <td><?= $loanedbook["title"] ?></td>
            <td><?= $loanedbook["author"] ?></td>
            <td><?= $loanedbook["isbn"] ?></td>
            <td><?= $loanedbook["borrower"] ?></td>
            <td><?= $loanedbook["loanedon"] ?></td>
        </tr>

    <?php endforeach ?>

    </table>
    
    <?php endif ?>

    <h3><?= $user["name"] . "'s" ?> Wishlist</h3>
    
    <?php if (empty($wishlistbooks)): ?>
    
        <?= $user["name"] ?> has no books on the wishlist</br>
        
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
                <form name="<?= $wishlistbook['isbn'] ?>" action="http://www.amazon.com/gp/search/ref=sr_adv_b/?field-isbn=<?= $wishlistbook['isbn'] ?>" method="post">
                    <button class="btn btn-default" name="buy" type="submit">Buy on Amazon</button>
                </form>
            </td>
        </tr>

    <?php endforeach ?>

    </table>
    
    <?php endif ?>
    
</div>
