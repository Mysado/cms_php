<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navAdmin.php'; ?>
    <h1>Kontakty</h1>

    <table>
        <?php foreach ($contacts as $contact):?>
            <tr> 
                <td>
                    <input type="checkbox"  name="id[]"
                        <?= "value={$contact->id}"?> form="deleteForm"
                    >
                </td>
                <td> <?= $contact->id; ?> </td>
                <td> <?= $contact->email; ?> </td>
                <td> <?= $contact->company->name; ?> </td>
                <td> <?= $contact->name; " ";$contact->surname; ?> </td>
                <td> <?= $contact->phone; ?> </td>
                <td> <?= $contact->register_date; ?> </td>
                <td> <?= $contact->seller->email; ?> </td>
                <td> <?= $contact->skan; ?> </td>
                <td>
                    <form method="get" action="/questionary">
                        <input type="text" name="id" hidden="true" <?= "value={$contact->id}" ?>>
                        <button formmethod="get" type="submit">ankieta</button>
                    </form>
                </td>
                <td>
                    <form method="get" action="/editContact">
                        <input type="text" name="id" hidden="true" <?= "value={$contact->id}" ?>>
                        <button formmethod="get" type="submit">edit</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ;?>
    </table>
    <div>
        <form method="post" action="/deleteContact" id="deleteForm">
            <button type="submit" name="delete">Delete selected</button>
        </form>
    </div>
    <a href="addContact">Add Contact</a>

<?php require './app/views/partials/footer.php';?>