<?php require_once("connect.php"); ?>
<form action="addbookbd.php" method="POST" enctype="multipart/form-data">

<input type="text" name="title" placeholder="Название книги">
<input type="text" name="publishing" placeholder="Издательство">
<input type="text" name="series" placeholder="Серия">
<input type="text" name="autor" placeholder="Автор">
<select name="genre" id="">
    <?php 
    $sql = "SELECT * FROM `genre`";
    if($result = $connect -> query($sql)){
        while($row = $result -> fetch_array()){     
            echo'<option>'. $row['name_genre'] .'</option>';        
    
    
        }
    }
    ?>
</select>
<input type="text" name="price" placeholder="цена">
<input type="text" name="number_of_pages" placeholder="Количество страниц">
<input type="text" name="circulation" placeholder="Тираж">
<input type="text" name="age_limit" placeholder="Возрастное ограничение">
<input type="file" name="photo">
<input type="submit">

</form>

<form action="addgenre.php" method="POST">
    <input type="text" name="genre">
    <input type="submit">
</form>