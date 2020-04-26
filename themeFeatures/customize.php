<?php

function ficticious_create_panel($wp_customize)
{
    $wp_customize->add_panel('ficticious_panel', array(
        'title' => __('Motyw Ficticious'),
        'description' => 'Ustawienia motywu',
        'priority' => 20
    ));
}

add_action('customize_register', 'ficticious_create_panel');

function ficticious_change_head_bg($wp_customize)
{
    $wp_customize->add_section('ficticious_header_bg_section', array(
        'title' => __('Tło nagłówka'),
        'priority' => 40,
        'description' => 'Obraz wyświetlany w nagłówku strony',
        'panel' => 'ficticious_panel'
    ));
    $wp_customize->add_setting($FICTICIOUS_HEADER_BACKGROUND_IMAGE);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ficticious_header_bg', array(
        'label' => __('Obraz tła'),
        'section' => 'ficticious_header_bg_section',
        'settings' => 'ficticious_header_bg',
    )));
}

add_action('customize_register', 'ficticious_change_head_bg');

function addSettingToSection($wp_customize, $setting_name, $setting_default, $setting_type, $setting_section, $label, $choices)
{
    $wp_customize->add_setting($setting_name, array(
        'default' => $setting_default,
    ));
    $wp_customize->add_control($setting_name, array(
        'label' => __($label),
        'type' => $setting_type,
        'section' => $setting_section,
        'choices' => $choices
    ));
}

function ficticious_header($wp_customize)
{
    include 'variables.php';
    $heading_section = 'heading_section';
    $panel_name = 'ficticious_panel';

    $wp_customize->add_section($heading_section, array(
        'title' => 'Treści w nagłówku',
        'description' => 'Określ treści, jakie mają być widoczne w nagłówku strony',
        'panel' => $panel_name
    ));

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_HEADLINE,
        'Jestem nagłówkiem',
        'text',
        $heading_section,
        'Tekst nagłówka',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_SUBHEADLINE,
        'Jestem nagłówkiem drugiego poziomu',
        'text',
        $heading_section,
        'Tekst nagłówka drugiego poziomu',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_BUTTONS_ENABLED,
        0,
        'radio',
        $heading_section,
        'Przyciski',
        array(
            0 => 'wyłączone',
            1 => 'włączone'
        )
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_BUTTON_1_LABEL,
        'Jestem przyciskiem',
        'text',
        $heading_section,
        'Treść przycisku 1',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_BUTTON_1_HREF,
        'https://someaddress',
        'text',
        $heading_section,
        'Adres przekierowania przycisku 1',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_BUTTON_2_LABEL,
        'Również jestem przyciskiem',
        'text',
        $heading_section,
        'Treść przycisku 2',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_BUTTON_2_HREF,
        'https://someaddress',
        'text',
        $heading_section,
        'Adres przekierowania przycisku 2',
        null
    );
}

add_action('customize_register', 'ficticious_header');

function ficticious_white_intro($wp_customize)
{
    include 'variables.php';
    $intro_section = 'intro_section';
    $panel_name = 'ficticious_panel';

    $wp_customize->add_section($intro_section, array(
        'title' => 'Sekcja intro',
        'description' => 'Określ treści, jakie mają być widoczne w sekcji intro',
        'panel' => $panel_name
    ));

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_INTRO_ENABLED,
        1,
        'radio',
        $intro_section,
        'Sekcja intro',
        array(
            0 => 'wyłączone',
            1 => 'włączone',
        )
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_INTRO_TITLE,
        'miło Cię tutaj widzieć',
        'text',
        $intro_section,
        'Nagłówek',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_INTRO_INTRODUCTION,
        'Nazywam się Jakub Bartusiak',
        'text',
        $intro_section,
        'Wstęp',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_INTRO_CONTENT,
        'Jestem absolwentem Politechniki Wrocławskiej i programistą o szerokich zainteresowaniach.
        Staram się stale rozwijać swoje umiejętności i codziennie uczyć się czegoś nowego.',
        'textarea',
        $intro_section,
        'Zawartość',
        null
    );
}

add_action('customize_register', 'ficticious_white_intro');

function ficticious_skills_image($wp_customize)
{
    include 'variables.php';
    $wp_customize->add_section('ficticious_header_bg_section', array(
        'title' => __('Tło nagłówka'),
        'priority' => 40,
        'description' => 'Obraz wyświetlany w nagłówku strony',
        'panel' => 'ficticious_panel'
    ));
    $wp_customize->add_setting($FICTICIOUS_HEADER_BACKGROUND_IMAGE);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ficticious_header_bg', array(
        'label' => __('Obraz tła'),
        'section' => 'ficticious_header_bg_section',
        'settings' => 'ficticious_header_bg',
    )));
}

add_action('customize_register', 'ficticious_skills_image');

function ficticious_skills($wp_customize)
{
    include 'variables.php';
    $skills_section = 'skills_section';
    $panel_name = 'ficticious_panel';

    $wp_customize->add_section($skills_section, array(
        'title' => 'Sekcja umiejętności',
        'description' => 'Określ treści, jakie mają być widoczne w sekcji umiejętności',
        'panel' => $panel_name
    ));

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_SKILLS_ENABLED,
        1,
        'radio',
        $skills_section,
        'Sekcja umiejętności',
        array(
            0 => 'wyłączona',
            1 => 'włączona',
        )
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_SKILLS_TITLE,
        'dwa słowa o mnie',
        'text',
        $skills_section,
        'Treść nagłówka',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_SKILLS_DESCRIPTION,
        'Jestem osobą ambitną i lubię wiedzieć jak najwięcej. Nie lubię też prosić się innych o pomoc, dlatego dążę do posiadania dużej ilości umiejętności i technicznego know-how, tak aby być jak najbardziej niezależny.
        Nie zmienia to faktu, że dobrze pracuję w grupie, a koledzy i koleżanki zawsze chwalą sobie moje towarzystwo, zarówno ze względów praktycznych (dobra jakość pracy), jak też towarzyskich (niecodziennie - ale dobre poczucie humoru).',
        'textarea',
        $skills_section,
        'Opis po lewej stronie',
        null
    );

    $wp_customize->add_setting($FICTICIOUS_SKILLS_IMAGE);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $FICTICIOUS_SKILLS_IMAGE, array(
        'label' => __('Obrazek w centrum'),
        'section' => $skills_section,
        'settings' => $FICTICIOUS_SKILLS_IMAGE,
    )));

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_SKILLS_LIST,
        'JAVA / SPRING
        Java 7+, Spring, Hibernate, Thymeleaf, REST, Mockito, JUnit, Thymeleaf
        HTML / CSS
        HTML 5, CSS 2+, SCSS, Bootstrap
        JAVASCIPT
        ES 2015+, Webpack, Babel, Npm, React, Type Script
        INNE
        Kubernetes, MySQL, Oracle DB, Amazon Web Services, Jenkins, Maven, Gradle, Android SDK... wymieniać dalej? :)'
        , 'textarea',
        $skills_section,
        'Umiejętności (oddzielone znakiem nowej linii)',
        null
    );
}

add_action('customize_register', 'ficticious_skills');