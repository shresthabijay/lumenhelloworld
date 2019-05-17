<?php

$router->post('/books', 'BookController@addBook');
$router->get('/books', 'BookController@getBooks');
$router->get('/books/{id}', 'BookController@getBook');
$router->put('/books/{id}', 'BookController@updateBook');
$router->delete('/books/{id}', 'BookController@deleteBook');

$router->get('/books/{id}/{author_id}/attach', 'BookController@attachAuthor');
$router->get('/books/{id}/{author_id}/detach', 'BookController@detachAuthor');

