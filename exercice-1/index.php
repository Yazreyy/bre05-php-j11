<?php

require 'Reader.php';

$reader = new Reader ("jean.dupont" , "mdp125");
print_r ($reader->login());

$reader = new Reader("jean.dupont@test.com", "mdp123");
$reader->addBookToFavorites("Harry Potter 1");
$books = $reader->addBookToFavorites("Harry Potter 2");

print_r($books);

$books = $reader->removeBookFromFavorites($books[1]);
print_r($books);
