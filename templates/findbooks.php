<h3>Find Books to Add</h3>
<div>
    <table class="table table-striped">
        <tr>
            <th>Cover</th>
            <th>Title</th>
            <th>Author(s)</th>
            <th>ISBN</th>
            <th>Action</th>
        </tr>

    <?php for ($i = 0; $i < $counter; $i++): ?>
        
        <tr> 
            <td><img src="<?= $results[$i]['img'] ?>" height="146"></td>
            <td><?= $results[$i]["title"] ?></td> 
            <td><?= $results[$i]["author"] ?></td>
            <td><?= $results[$i]["isbn"] ?></td>
            <td>
                <form name="<?= $i ?>" action="addbooks.php?isbn=<?= $results[$i]['isbn'] ?>" method="post">
                    <button class="btn btn-default" name="bookshelf" type="submit">Add to Bookshelf</button>
                    <button class="btn btn-default" name="wishlist" type="submit">Add to Wishlist</button>
                </form>
            </td>
        </tr>

    <?php endfor ?>

    </table>
</div>
