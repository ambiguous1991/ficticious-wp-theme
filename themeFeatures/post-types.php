<?php

function ficticious_register_post_types() {
    register_post_type('experiment', array(
        'supports' => array( 'title', 'editor', 'excerpt', 'comments', 'thumbnail' ),
        'public' => true,
        'labels' => array(
            'name' => 'Eksperymenty',
            'singular_name' => 'Eksperyment',
            'add_new' => 'Dodaj eksperyment',
            'add_new_item' => 'Dodaj eksperyment',
            'all-items' => 'Wszystkie eksperymenty',
            'edit_item' => 'Edytuj eksperyment',
            'view_item' => 'Wyświetl eksperyment',
            'view_items' => 'Wyświetl eksperymenty',
            'search_items' => 'Przeszukaj eksperymenty',
        ),
        'has_archive' => 'experiment',
        'menu_icon' => 'data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZm9jdXNhYmxlPSJmYWxzZSIgZGF0YS1wcmVmaXg9ImZhcyIgZGF0YS1pY29uPSJmbGFzayIgY2xhc3M9InN2Zy1pbmxpbmUtLWZhIGZhLWZsYXNrIGZhLXctMTQiIHJvbGU9ImltZyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNDQ4IDUxMiI+PHBhdGggZmlsbD0iY3VycmVudENvbG9yIiBkPSJNNDM3LjIgNDAzLjVMMzIwIDIxNVY2NGg4YzEzLjMgMCAyNC0xMC43IDI0LTI0VjI0YzAtMTMuMy0xMC43LTI0LTI0LTI0SDEyMGMtMTMuMyAwLTI0IDEwLjctMjQgMjR2MTZjMCAxMy4zIDEwLjcgMjQgMjQgMjRoOHYxNTFMMTAuOCA0MDMuNUMtMTguNSA0NTAuNiAxNS4zIDUxMiA3MC45IDUxMmgzMDYuMmM1NS43IDAgODkuNC02MS41IDYwLjEtMTA4LjV6TTEzNy45IDMyMGw0OC4yLTc3LjZjMy43LTUuMiA1LjgtMTEuNiA1LjgtMTguNFY2NGg2NHYxNjBjMCA2LjkgMi4yIDEzLjIgNS44IDE4LjRsNDguMiA3Ny42aC0xNzJ6Ij48L3BhdGg+PC9zdmc+'
    ));
}

add_action('init', 'ficticious_register_post_types');