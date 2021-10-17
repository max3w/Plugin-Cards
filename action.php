<?php

/*
   Plugin Name: Flashcadrs
   description: Wineabe Flashcadrs
   Version: 1.0.0
   Author: Alieksieienko Maksym
   Author URI: https://t.me/max3w
*/

// Add table DB
function flashcards_table()
{

    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();

    $tablename = $wpdb->prefix . "flashcards";

    $sql = "CREATE TABLE $tablename (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  cat varchar(255) NOT NULL,
  PRIMARY KEY  (id)
  ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

}

register_activation_hook(__FILE__, 'flashcards_table');

// Add menu
function mycard_menu()
{

    add_menu_page("Flashcards", "Flashcards", "manage_options", "mycard", "displayList", "dashicons-clipboard", "2"); //https://developer.wordpress.org/resource/dashicons/#clipboard
    add_submenu_page("mycard", "Edit flashcards", "Edit flashcards", "manage_options", "allentries", "displayList");
    add_submenu_page("mycard", "New flashcards", "New flashcards", "manage_options", "addnewentry", "addEntry");
	add_submenu_page("mycard", "Flashcard Categories", "Flashcard Categories", "manage_options", "addnewcat", "addCat");
   // remove_submenu_page('mycard','myfirstplugin');
}

add_action("admin_menu", "mycard_menu");


// Func add card
function displayList()
{
    include "displaycard.php";
}

function addEntry()
{
    include "addcard.php";
}

function addCat()
{
    include "addcard.php";
}