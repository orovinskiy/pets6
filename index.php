<?php

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require autoload file
require("vendor/autoload.php");
require("model/validation-functions.php");

session_start();

// Instantiate F3
$f3 = Base::instance();
$f3->set('colors', array('pink', 'green', 'blue'));

//set debug level
$f3->set('DEBUG', 3);
$db = new DHB();

// Define a default route
$f3->route('GET /', function () {
    echo "<h1> My Pets <br></h1>";
    echo "<a href='order'>Order a Pet</a>";

    //$views = new Template();
    //echo $views->render("views/home.html");
});

$f3->route('GET|POST /order', function($f3) {
    $_SESSION = array();
    if(isset($_POST['animalName'])) {
        $animal = $_POST['animalName'];
        if (validString($animal)) {
            switch(strtolower($animal)){
                case "cat":
                    $_SESSION['animal'] = new Cat($animal);
                    break;
                case "dog":
                    $_SESSION['animal'] = new Dog($animal);
                    break;
                case "bengal":
                    $_SESSION['animal'] = new Bengal($animal);
                    break;
                default:
                    $_SESSION['animal'] = new Pet($animal);
            }
            $f3->reroute('/order2');
        } else {
            $f3->set("errors['animal']", "Please enter an animal");
        }
    }
    $view = new Template();
    echo $view->render('views/form1.html');
});

$f3->route('GET|POST /order2', function($f3) {
//    var_dump($_POST);
    if (isset($_POST['color'])) {
        $color = $_POST['color'];
        if (validColor($color)) {
            $_SESSION['animal']->setColor($color);
            $f3->reroute('/results');
        } else {
            $f3->set("errors['color']", "Please enter a color");
        }
    }
    $view = new Template();
    echo $view->render('views/form2.html');
});

$f3->route('POST|GET /results', function() {
    var_dump($_SESSION);
    global $db;
    $db->addPet($_SESSION['animal']->getName(),$_SESSION['animal']->getColor(),$_SESSION['animal']->getType());
    $view = new Template();
    echo $view->render('views/results.html');
});

$f3->route('GET /@item', function($f3, $params){
    //var_dump($params);
    $item = $params['item'];

    switch($item) {
        case 'chicken':
            echo "<p>Cluck</p>";
            break;
        case 'dog':
            echo "<p>woof</p>";
            break;
        case 'horse':
            echo "<p>neigh</p>";
            break;
        case 'cat':
            echo "<p>meow</p>";
            break;
        case 'dino':
            echo "<p>rwar</p>";
            break;
        default:
            $f3->error(404);
    }
});


$f3->route('GET /view', function($f3) {
    global $db;
    $results = $db->getList();
    foreach($results as $result) {
        foreach($result as $item) {
            echo "$item ";
        }
        echo "<br>";
    }
});
// Run F3
$f3->run();