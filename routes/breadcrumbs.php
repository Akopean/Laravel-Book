<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});


// Home > Book
Breadcrumbs::register('book', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Book', route('book'));
});

// Home > [Category] > [Name]
Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Category');
    $breadcrumbs->push($category, route('category', $category));
});

// Home > [Tag] > [Name]
Breadcrumbs::register('tag', function ($breadcrumbs, $tag) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tag');
    $breadcrumbs->push($tag);

});

// Home > Search
Breadcrumbs::register('search', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Search');
});

/*
// Home > Blog > [Category] > [Post]
Breadcrumbs::register('post', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('category', $post->category);
    $breadcrumbs->push($post->title, route('post', $post));
});*/