<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navSeller.php'; ?>
    <h1>Pytania</h1>
    <table>
        <?php foreach ($questions as $question):?>
            <tr> 
                <td>                 
                    <input type="checkbox"  name="id[]"
                        <?= "value={$question->id}"?> form="deleteForm">
                </td>
                <td> <?= $question->id; ?> </td>
                <td> <?= $question->content; ?> </td>
                <td> <?= $question->kolejnosc; ?> </td>

                <td> 
                    <?php 
                        if ($question->status) {
                           echo "wlaczone";
                        } else {
                            echo "wylaczone";
                        }
                    ?>
                </td>

                
                <td>
                <form method="get" action="/editQuestion">
                    <input type="text" name="id" hidden="true" <?= "value={$question->id}" ?>>
                    <button formmethod="get" type="submit">edit</button>
                </form>
                </td>
            </tr>
        <?php endforeach ;?>
    </table>
    <div>
        <form method="post" action="/deleteQuestion" id="deleteForm">
            <button type="submit" name="delete">Delete selected</button>
        </form>
    </div>
    
    <a href="addQuestion">Add Question</a>
    <a href="questionary">questionary</a>


<?php require './app/views/partials/footer.php';?>