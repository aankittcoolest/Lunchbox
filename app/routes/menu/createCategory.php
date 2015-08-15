<?php

$app->get('/new-category', function() use ($app){
    $app->render('/menu/createCategory.php');
})->name('new_category');

$app->post('/new-cateogory', function() use ($app){
    echo "hello";
})->name('new_category.post');
