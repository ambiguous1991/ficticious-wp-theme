<?php

function ficticious_register_post_types() {
    register_post_type('experiment', array(
        'supports' => array( 'title', 'editor', 'excerpt', 'comments', 'thumbnail' ),
        'public' => true,
        'show_in_rest' => true,
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

    register_post_type('message', array(
        'supports' => array( 'title', 'editor' ),
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Wiadomości',
            'singular_name' => 'Wiadomość',
            'add_new' => 'Dodaj nową wiadomość',
            'add_new_item' => 'Dodaj wiadomość',
            'all-items' => 'Wszystkie wiadomości',
            'edit_item' => 'Edytuj wiadomość',
            'view_item' => 'Wyświetl wiadomość',
            'view_items' => 'Wyświetl wiadomość',
            'search_items' => 'Przeszukaj wiadomości',
        ),
        'taxonomies'=>array('category'),
        'menu_icon' => 'data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZm9jdXNhYmxlPSJmYWxzZSIgZGF0YS1wcmVmaXg9ImZhcyIgZGF0YS1pY29uPSJlbnZlbG9wZS1vcGVuLXRleHQiIGNsYXNzPSJzdmctaW5saW5lLS1mYSBmYS1lbnZlbG9wZS1vcGVuLXRleHQgZmEtdy0xNiIgcm9sZT0iaW1nIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1MTIgNTEyIj48cGF0aCBmaWxsPSJjdXJyZW50Q29sb3IiIGQ9Ik0xNzYgMjE2aDE2MGM4Ljg0IDAgMTYtNy4xNiAxNi0xNnYtMTZjMC04Ljg0LTcuMTYtMTYtMTYtMTZIMTc2Yy04Ljg0IDAtMTYgNy4xNi0xNiAxNnYxNmMwIDguODQgNy4xNiAxNiAxNiAxNnptLTE2IDgwYzAgOC44NCA3LjE2IDE2IDE2IDE2aDE2MGM4Ljg0IDAgMTYtNy4xNiAxNi0xNnYtMTZjMC04Ljg0LTcuMTYtMTYtMTYtMTZIMTc2Yy04Ljg0IDAtMTYgNy4xNi0xNiAxNnYxNnptOTYgMTIxLjEzYy0xNi40MiAwLTMyLjg0LTUuMDYtNDYuODYtMTUuMTlMMCAyNTAuODZWNDY0YzAgMjYuNTEgMjEuNDkgNDggNDggNDhoNDE2YzI2LjUxIDAgNDgtMjEuNDkgNDgtNDhWMjUwLjg2TDMwMi44NiA0MDEuOTRjLTE0LjAyIDEwLjEyLTMwLjQ0IDE1LjE5LTQ2Ljg2IDE1LjE5em0yMzcuNjEtMjU0LjE4Yy04Ljg1LTYuOTQtMTcuMjQtMTMuNDctMjkuNjEtMjIuODFWOTZjMC0yNi41MS0yMS40OS00OC00OC00OGgtNzcuNTVjLTMuMDQtMi4yLTUuODctNC4yNi05LjA0LTYuNTZDMzEyLjYgMjkuMTcgMjc5LjItLjM1IDI1NiAwYy0yMy4yLS4zNS01Ni41OSAyOS4xNy03My40MSA0MS40NC0zLjE3IDIuMy02IDQuMzYtOS4wNCA2LjU2SDk2Yy0yNi41MSAwLTQ4IDIxLjQ5LTQ4IDQ4djQ0LjE0Yy0xMi4zNyA5LjMzLTIwLjc2IDE1Ljg3LTI5LjYxIDIyLjgxQTQ3Ljk5NSA0Ny45OTUgMCAwIDAgMCAyMDAuNzJ2MTAuNjVsOTYgNjkuMzVWOTZoMzIwdjE4NC43Mmw5Ni02OS4zNXYtMTAuNjVjMC0xNC43NC02Ljc4LTI4LjY3LTE4LjM5LTM3Ljc3eiI+PC9wYXRoPjwvc3ZnPg=='
    ));

    wp_insert_term(
        'Kategorie wiadomości',
        'category',
        array(
            'slug' => 'message_category',
        )
    );

    wp_insert_term(
        'Oferta pracy',
        'category',
        array(
            'slug' => 'message_job_offer',
            'parent'=> term_exists( 'Kategorie wiadomości', 'category' )['term_id']
        )
    );

    wp_insert_term(
        'Inne wiadomości',
        'category',
        array(
            'slug' => 'message_other',
            'parent'=> term_exists( 'Kategorie wiadomości', 'category' )['term_id']
        )
    );
}

add_action('init', 'ficticious_register_post_types');