<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10/12/14
 * Time: 11:41
 */

require_once('head.php');
require_once('navigation.php');

// views
require_once(__DIR__ . '/views/AuctionList.php');

// models
require_once(__DIR__ . '/models/TableRecordModel.php');

// controllers
require_once(__DIR__ . '/controllers/AuctionListController.php');

// routes
$routes = array(
    'auction-list' => array('model' => 'TableRecordModel', 'view' => 'AuctionList', 'controller' => 'AuctionController'),
);

// mvc solver
$route = isset($_GET["r"]) ? $_GET["r"] : null;
$action = isset($_GET["a"]) ? $_GET["a"] : null;

switch($route) {

    case 'auction-list':
        echo "route action-list";
        $model = new TableRecordModel();
        $controller = new AuctionListController($model);
        $view = new AuctionList($model, $controller);


        $view->render();

        if(isset($action)) {
            echo "executing action: action" . $action;
            //var_dump($q);
            //var_dump( $_GET['a'] );
            $controller->{$action}();
        }


        break;

    default:
        echo "no route";
        break;

}






//echo "current route: " . $route;

//echo "model: " . $routes['auctions']['model'];

//include_once(__DIR__ . $routes['auctions']['model'] . '.php');

echo "rodapé2";

include_once('footer.php');

