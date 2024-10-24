<?php 
namespace Test;

use PHPUnit\Framework\TestCase;
use Routers\Router;

class InviteTest extends TestCase {
    public function test_router() {
        $invite = new Router();
        $_SERVER['REQUEST_METHOD']= "get";

        $html = $invite->route( "http://localhost/" );
        $pos= mb_strpos($html, "Сделать заказ");
        $this->assertNotEquals(false, $pos);
    }
}