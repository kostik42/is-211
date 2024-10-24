<?php
namespace Controllers;
use Services\FileStorage;
use Templates\ProductTemplate;
class Product
{
    public function get(int $id): string
    {
        $obj = new FileStorage();
        $products = $obj->loadData('data.json');
        foreach ($products as $product) {
            if ($product['id'] == $id) {
                $obj = new ProductTemplate();
                $template = $obj->getPageTemplate($product);
                return $template;
            }
        }
        return '404';
    }
    public function getAll(): string
    {
        $obj = new FileStorage();
        $products = $obj->loadData('data.json');
        $obj = new ProductTemplate();
        $template = $obj->getTemplate($products);
        return $template;
    }
}