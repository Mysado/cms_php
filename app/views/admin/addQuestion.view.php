<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navAdmin.php'; ?>
    <h1>Dodaj pytanie</h1>

	<form method="post" action="/addQuestion">
	    <input type="text" name="question" required>Pytanie*<br>
        
        <select name="question_category">
            <?php foreach ($categories as $category) :?>
                <option <?= "value={$category->id}" ?>><?= $category->name ?></option>
            <?php endforeach;?>
            }
          
        </select>Kategoria <br>
        
        <input type="radio" name="type" value="radio">Radio buttony<br>
        <input type="radio" name="type" value="checkbox" checked>Checkboxy<br>
        <input type="radio" name="type" value="input" checked>Input<br>
        <input type="radio" name="type" value="textarea" checked>Textarea<br>
        <input type="text" name="increments" hidden="true"<?php $increment = $increments + 1;echo "value={$increment}"; ?> form="increment">
        <br>
        <input type="text" name="increments" hidden="true"<?php $decrement = $increments - 1;echo "value={$decrement}"; ?> form="decrement">
        <br>
        <input type="text" name="value" hidden="true"<?= "value={$increments}" ?>>
        <br>
        <?php 
            for ($i=0; $i < $increments; $i++) { 
                echo "<input type=text name=answer[]><button type=submit form=decrement>x</button><br>";       
            }
        ?>
        <button type="submit" form="increment">Add new field</button><br>
        <input type="text" name="kolejnosc">kolejnosc<br>
        <input type="radio" name="status" value="1" >Aktywne<br>
        <input type="radio" name="status" value="0" checked>Nieaktywne<br>
        
	    <button formmethod="post" type="submit">Add question</button>
	</form>
    <form method="get" action="/addQuestion" id="increment">
    </form>
    <form method="get" action="/addQuestion" id="decrement">
        
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