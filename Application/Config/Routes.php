<?php
Use Core\Router;

Router::add("Home","home", "HomeController", "index");
Router::add("Home","about", "HomeController", "about");