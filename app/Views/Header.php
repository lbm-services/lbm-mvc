<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>MVC Case Study</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link href="<?php echo URL; ?>/public/css/style.css" rel="stylesheet">
        
    </head>
    <body>
        <!-- logo -->
        <div class="logo">
            MVC Case Study
        </div>

        <!-- navigation -->
        <div class="navigation">
            <a href="<?php echo URL; ?>/">home</a>
            <a href="<?php echo URL; ?>/admin">Admin Area</a>
            <a href="<?php echo URL; ?>/page">CMS</a>
            <a href="<?php echo URL; ?>/user">User Area</a>
            <a href="<?php echo URL; ?>/instrument">instruments</a>
            <p><?php echo ( null !== $this->authUsername() ? "Logged in as " . $this->authUsername() : "Hello Gast" ); ?>.</p>
        </div>
