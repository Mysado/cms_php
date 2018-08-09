<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navAdmin.php'; ?>
    <h1>Handlowcy</h1>
    <?= "<h1>". apc_fetch(session_id())['id']."</h1>" ?>
    <table>
        <?php foreach ($sellers as $seller):?>
            <tr> 
                <td>
                        <input type="checkbox"  name="id[]"
                            <?= "value={$seller->id}"?> form="deleteForm"
                        >
                </td>
                <td> <?= $seller->id; ?> </td>
                <td> <?= $seller->email; ?> </td>
                <td> <?= $seller->name; ?> </td>
                <td> <?= $seller->surname; ?> </td>
                <td> <?= $seller->phone; ?> </td>
                <td> <?= $seller->register_date; ?> </td>
                                <!--
                                                        <?= "<h1>". apc_fetch(session_id())['id']."</h1>" ?>

                                <td> <a href="/contacts">Kontakty</a> </td>
                                <td> <?= $firma->creation_date; ?> </td>
                                <td> <?= $firma->seller->email; ?> </td>
                                -->
                <td>
                
                <form method="get" action="/editSeller">
                    <input type="text" name="id" hidden="true" <?= "value={$seller->id}" ?>>
                    <button formmethod="get" type="submit">edit</button>
                </form>
                </td>
            </tr>
        <?php endforeach ;?>
    </table>
    <div>
        <form method="post" action="/deleteSeller" id="deleteForm">
            <button type="submit" name="delete">Delete selected</button>
        </form>
    </div>
    <a href="addSeller">Add Contact</a>

<?php require './app/views/partials/footer.php';?>