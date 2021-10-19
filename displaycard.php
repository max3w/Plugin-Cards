<?php 

global $wpdb;
$tablename = $wpdb->prefix."flashcards";

// Remove cards
if(isset($_GET['delete_id'])){
    $delid = $_GET['delete_id'];
    $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<h1>All Flashcards</h1>

<table width='100%' border='1' style='border-collapse: collapse;'>
    <tr>
        <th>№</th>
        <th>Question</th>
        <th>Categories</th>
		<th>Multiple Answers</th>
        <th>Access</th>
		<th>Author</th>
		<th>Date</th>
    </tr>
    <?php
    // Display card
    $entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
    if(count($entriesList) > 0){
        $count = 1;
        foreach($entriesList as $entry){
            $id = $entry->id;
            $name = $entry->name;
            $cat = $entry->cat;

            echo "<tr>
      <td>".$count."</td>
      <td>".$name."</td>
      <td>".$cat."</td>
      <td><a href='?page=allentries&delete_id=".$id."'>Remove</a></td>
      </tr>
      ";
            $count++;
        }
    }else{
        echo "<tr><td colspan='5'>No Cards</td></tr>";
    }
    ?>
</table>
