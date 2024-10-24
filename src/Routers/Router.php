<?php
namespace Routers;
use Controllers\Basket;
use Controllers\Home;
use Controllers\Order;
use Controllers\Product;
class Router
{
    public function route(string $url): string
    {
        $path = parse_url($url, PHP_URL_PATH);

        $pieces = explode("/", $path);

        $id = 0;
        if (isset($pieces[2]) && !empty($pieces[2])) {
            $id = $pieces[2];
        }

        $method = $_SERVER['REQUEST_METHOD'];

        $resource = $pieces[1];
        $html_result = "";

        switch ($resource) {
            case "products":
                $product = new Product();
                if ($id)
                    $html_result = $product->get($id);
                else
                    $html_result = $product->getAll();
                break;
            case "orders":
                $order = new Order();
                if ($method == "POST")
                    $html_result = $order->create();
                else
                    $html_result = $order->get();
                break;
            case "basket":
                $basket = new Basket();
                if ($method == "POST")
                    $html_result = $basket->add();
                break;
            case "basket_clear":
                $basket = new Basket();
                if ($method == "POST")
                    $html_result = $basket->clear();
                break;
            default:
                $home = new Home();
                $html_result = $home->get();
                break;
        }
        return $html_result;
    }
}