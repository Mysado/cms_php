<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navAdmin.php'; ?>
    <h1>Files</h1>
    <table>
        <?php foreach ($photos as $photo):?>
            <tr> 
            	<td>                 
                    <input type="checkbox"  name="id[]"
                        <?= "value={$photo->id}"?> form="deleteForm">
                </td>
                <td> <?= $photo->id; ?> </td>
                <td> <?= $photo->name; ?> </td>
                <td> <?= $photo->path; ?> </td>
                <td> <?= $photo->seller->email; ?> </td>
                <td> <?= $photo->type; ?> </td>
                <td> <?= $photo->upload; ?> </td>
            </tr>
        <?php endforeach ;?>
    </table>
    <div>
        <form method="post" action="/deletePhotos" id="deleteForm">
            <button type="submit" name="delete">Delete selected</button>
        </form>
    </div>
	<form action="/photos" method="post" enctype="multipart/form-data">
		<input type="text" name="name" required>Nazwa pliku</input>
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload Image" name="submit">
	</form>
    
<?php require './app/views/partials/footer.php';?>