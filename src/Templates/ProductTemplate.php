<?php
namespace Templates;
use Templates\BaseTemplate;
class ProductTemplate extends BaseTemplate
{
    public function getTemplate(array $arr): string
    {
        $template = parent::getBaseTemplate();
        $str = '';
        session_start();
        if (isset($_SESSION['flash'])) {
            $str .= <<<END
                <div id="liveAlertBtn" class="alert alert-success alert-dismissible" role="alert">
                    <div>{$_SESSION['flash']}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                    onclick="this.parentNode.style.display='none';"></button>
                    </div>
                    <script>
                    setTimeout(
                        function() {
                        var elem = document.getElementById("liveAlertBtn");
                        elem.style.display = "none";
                        }, 3000
                    );
            </script>
            END;
            unset($_SESSION['flash']);
        }
        foreach ($arr as $item) {
            $element_template = <<<END
            <div class="row mb-5">
                <div class="col-6">
                    <img src="%s" class="w-100">
                </div>
                <div class="col-6">
                    <div class="block">
                        <h2>%s</h2>
                        <p>%s</p>
                        <p>%s</p>
                        <h2>От %d ₽</h2>
                        <form action="/basket" method="POST">
                        <input type="hidden" name="id" value="%s">
                        <button type="submit" class="btn btn-primary mt-3">Забронировать</button>
                        </form>
                    </div>
                </div>
            </div>
            END;

            $str .= sprintf(
                $element_template,
                'https://localhost/' . $item['image'],
                $item['name'],
                $item['description'],
                $item['weigth'],
                $item['price'],
                $item['id']
            );
        }
        return sprintf($template, 'Список товаров', $str);
    }
    public function getPageTemplate(array $arr): string
    {
        $template = parent::getBaseTemplate();

        $element_template = <<<END
        <div class="row mb-5">
            <div class="col-6">
                <img src="%s" class="w-100">
            </div>
            <div class="col-6">
                <div class="block">
                    <h2>%s</h2>
                    <p>%s</p>
                    <p>%s</p>
                    <h2>От %d ₽</h2>
                    <form action="/basket" method="POST">
                    <input type="hidden" name="id" value="%s">
                    <button type="submit">Добавить в корзину</button>
                    </form>
                </div>
            </div>
        </div>
        END;

        $str = sprintf(
            $element_template,
            'https://localhost/' . $arr['image'],
            $arr['name'],
            $arr['description'],
            $arr['weigth'],
            $arr['price'],
            $arr['id']
        );

        $resultTemplate = sprintf($template, 'Страница товара', $str);
        return $resultTemplate;
    }
}