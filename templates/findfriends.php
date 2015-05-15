<div>
    <table class="table table-striped">
        <tr>
            <th>User</th>
            <th>Action</th>
        </tr>
    
    <?php for ($i = 0; $i < $counter; $i++): ?>
        
        <tr>
            <td><?= $user[$i]["name"] ?></td>
            <td>
        
        <?php if ($user[$i]["auth"] == false): ?>
        
                <form name="<?= $i ?>" action="requestfriend.php?id=<?= $user[$i]['id'] ?>" method="post">
                    <button class="btn btn-default" name="requestfriend" type="submit">Send Friend Request</button>
                </form>
        
        <?php elseif ($user[$i]["auth"] == true): ?>
        
                You cannot add this person anymore.
        
        <? endif ?>
                
            </td>
        </tr>

    <?php endfor ?>

    </table>
</div>
