<p>Who would you like to lend <?= $book["title"] ?> by <?= $book["author"] ?> to?</p>

<form action="loan.php?isbn=<?= $book['isbn'] ?>" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="borrower" placeholder="Borrower" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Lend</button>
        </div>
    </fieldset>
</form>
