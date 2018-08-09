<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navAdmin.php'; ?>
    <h1>Dodaj pytanie</h1>

	<form method="post" action="/editQuestion">
	    <input type="text" name="question" <?= "value={$question->content}" ?> required>Pytanie*<br>
        <select name="question_category">
            <?php foreach ($categories as $category) :?>
                <option <?= "value={$category->id}" ?>><?= $category->name ?></option>
            <?php endforeach;?>
            }
          
        </select>Kategoria <br>
        
        <input type="radio" name="type" <?php
                    if ("radio" == $answers[0]->type) {
                        echo "checked";
                    }
                ?> value="radio">Radio buttony<br>
        <input type="radio" name="type" <?php
                    if ("checkbox" == $answers[0]->type) {
                        echo "checked";
                    }
                ?> value="checkbox" >Checkboxy<br>
        <input type="radio" name="type" <?php
                    if ("input" == $answers[0]->type) {
                        echo "checked";
                    }
                ?> value="input" >Input<br>
        <input type="radio" name="type" <?php
                    if ("textarea" == $answers[0]->type) {
                        echo "checked";
                    }
                ?> value="textarea" >Textarea<br>
        <input type="text" name="increments" hidden="true"<?php $increment = $increments + 1;echo "value={$increment}"; ?> form="increment">
        <input type="text" name="increments" hidden="true"<?php $decrement = $increments - 1;echo "value={$decrement}"; ?> form="decrement">
        <input type="text" name="value" hidden="true"<?= "value={$increments}" ?>>
        <input type="text" name="id" hidden="true"<?= "value={$id}" ?> form="decrement">
        <input type="text" name="id" hidden="true"<?= "value={$id}" ?> form="increment">
        <input type="text" name="id" hidden="true"<?= "value={$id}" ?>>

        <br>
        <?php 
            for ($i=0; $i < $increments; $i++) { 
                if (count($answers)>$i) {
                    echo "<input type=text name=answer[] value={$answers[$i]->content}><button type=submit form=decrement>x</button><br>";
                } else {
                    echo "<input type=text name=answer[] ><button type=submit form=decrement>x</button><br>";
                }
            }
        ?>
        <button type="submit" form="increment">Add new field</button><br>
        <input type="text" name="kolejnosc" <?= "value={$question->kolejnosc}" ?>>kolejnosc<br>
        <input type="radio" name="status" value="1" >Aktywne<br>
        <input type="radio" name="status" value="0" checked>Nieaktywne<br>


	    <button formmethod="post" type="submit">Edit question</button>
	</form>
    <form method="get" action="/editQuestion" id="increment">
        
    </form>
    <form method="get" action="/editQuestion" id="decrement">
        
    </form>
	<form method="get" action="/questions">
        <button formmethod="get" type="submit">Go back</button>
    </form>
    <p>

        <?php
            if (isset($errors)) {
                foreach ($errors as $error) {
                    echo "{$error}";
                }
            }
        ?>
    </p>

<?php require './app/views/partials/footer.php';?>