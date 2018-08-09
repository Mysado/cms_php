<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navSeller.php'; ?>
    <h1>Firmy</h1>

    <table>
        <?php foreach ($firmy as $firma):?>
            <?php if ($firma->seller_id == apc_fetch(session_id())['id']): ?>
                <tr> 
                    <td>                 
                        <input type="checkbox"  name="id[]"
                            <?= "value={$firma->id}"?> form="deleteForm">
                    </td>
                    <td> <?= $firma->id; ?> </td>
                    <td> <?= $firma->name; ?> </td>
                    <td> <a href="/contacts">Kontakty</a> </td>
                    <td> <?= $firma->creation_date; ?> </td>
                    <td> <?= $firma->seller->email; ?> </td>
                    <td>
                    <form method="get" action="/editCompany">
                        <input type="text" name="id" hidden="true" <?= "value={$firma->id}" ?>>
                        <button formmethod="get" type="submit">edit</button>
                    </form>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach ;?>
    </table>
    <div>
        <form method="post" action="/deleteCompany" id="deleteForm">
            <button type="submit" name="delete">Delete selected</button>
        </form>
    </div>
    <a href="addCompany">Add Company</a>

<?php require './app/views/partials/footer.php';?>
