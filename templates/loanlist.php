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
    
    <?php if (empty($loanedbooks)): ?>
    
        You have no books on loan at this moment.
        
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

</div>
