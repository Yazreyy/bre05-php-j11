<?php

require 'Reader.php';

$reader = new Reader ("jean.dupont" , "mdp125");
$data = (array) $reader;
echo "Email : " . array_values($data)[0];
echo "Mot de passe : " . array_values($data)[1];

$reader = new Reader("jean.dupont@test.com", "mdp123");
$reader->addBookToFavorites("Harry Potter 1");
$books = $reader->addBookToFavorites("Harry Potter 2");

print_r($books);

$books = $reader->removeBookFromFavorites($books[1]);
print_r($books);
