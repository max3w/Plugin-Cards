<?php 

//responsible for adding records to the database. It will display the html form, and when you click the "Save" button, send the data to the database.

global $wpdb;

// Добавляем подписчика
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $cat = $_POST['cat'];
    $tablename = $wpdb->prefix."flashcards";

    if($name != '' && $cat != ''){
        // Checking the name field if there is such a card
        $check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE cat='".$name."' ");
        if(count($check_data) == 0){
            $insert_sql = "INSERT INTO ".$tablename."(name,cat) values('".$name."','".$cat."') ";
            $wpdb->query($insert_sql);
            echo $name . "Cards add!";
        }
    }
}

?>
<h1>Add Flashcards</h1>
<form method='post' action=''>
    <table>
        <tr>
            <td>Flashcards name</td>
            <td><input type='text' name='name'></td>
        </tr>
        <tr>
            <td>Flashcards categories</td>
            <td><input type='text' name='cat'></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type='submit' name='submit' value='Add'></td>
        </tr>
    </table>
</form>