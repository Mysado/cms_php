<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navSeller.php'; ?>
    <h1>Ankieta</h1>

	<form method="post" action="/answerQuestion">
	    
        <?php 
            if (isset($id)) {
                echo "wynik ankiety {$client->name} {$client->surname}<br>";
                echo "email {$client->email}<br>";
                echo "firma {$client->company->name}<br>";
                echo "handlowiec {$client->seller->email}<br>";
                echo "<input type=text hidden='true' name=id value={$id}>";  
            }
            foreach ($questions as $question) {
                if ($question->status) {
                    echo "<h1>{$question->content}</h1>";
                    foreach ($question->answers as $answer) {
                        if ($answer->type == 'radio') {
                            echo "<input type=radio value=$answer->content/$answer->id name=answer[{$question->id}][]> {$answer->content}<br>";  
                        } elseif($answer->type == 'checkbox') {
                            echo "<input type=checkbox value=$answer->content/$answer->id name=answer[{$question->id}][]> {$answer->content}<br>";  

                        } elseif($answer->type == 'input') {
                            echo "<input type=text name=answer[{$question->id}][$answer->id]> {$answer->content}<br>";  

                        } elseif($answer->type == 'textarea') {
                            echo "<textarea name=answer[{$question->id}][$answer->id]> {$answer->content}<br>";  
                        }   
                    }
                }
            }
        ?>

        
	    <button formmethod="post" type="submit">Send Answers</button>
	</form>
	<form method="get" action="/contacts">
        <button formmethod="get" type="submit">Go back</button>
    </form>
    <p>

        <?php
            if (isset($errors)) {
                foreach ($errors as $error) {
                    echo "{$error}<br>";
                }
            }
        ?>
    </p>

<?php require './app/views/partials/footer.php';?>