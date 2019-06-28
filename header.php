<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php clandestino_custom_meta_description(); ?>">
    <?php wp_head() ?>
</head>
<body <?php body_class() ?>>
    <header class="header">
        <?php get_template_part( './components/nav', 'menu' ); ?>
    </header>
    <main class="main">