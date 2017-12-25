<?php
abstract class ForAll
{
    protected $title;
    protected $price;
    protected $discount;
    protected $weigh;
    protected $dostavka;

    public function __construct($title, $price, $discount, $weigh) 
    {
        $this->title = $title;
        $this->price = $price;
        $this->discount = $discount;
        $this->weigh = $weigh;  
    }
}



interface ForProduct {
    public function setAbout($about);
    public function setPhoto($photo);
    public function getPriceWithWeigh10();
    public function getPriceWithDiscount();  // добавлен интерфейс ----------
}

class Product extends ForAll implements ForProduct
{
    
    public $about;
    public $photo = "<img src='http://fgupniisk.ru/en/assets/components/templates/img/no_image.jpg'>";
    public $status;
   

    public function setPhoto($photo) 
    {
        $this->photo = $photo;
        return $this;
    }

    public function setAbout($about) 
    {
        $this->about = $about;
        return $this;
    }

    public function __construct($title, $price, $discount, $weigh, $status)
    {
        parent::__construct($title, $price, $discount, $weigh);
        $this->status = $status;
        
    }

    public function getAll() {
        echo "<h1>", $this->title, "</h1>";
        echo $this->photo;
        echo "<p>", $this->about, "</p>";
        echo "<p>Вес товара: ", $this->weigh, " кг</p>";
        echo "<p>Наличие: ", $this->status, "</p>";
        echo "<p>Цена без учета скидок: ", $this->price, " Руб</p>";
        echo $this->getPriceWithDiscount();
        echo $this->getPriceWithWeigh10();
        echo $this->getDostavkaPrice();

    }

    public function getPriceWithWeigh10()
    {
        if ($this->weigh>=10)
        {
             echo "Цена со скидкой за товар более 10 кг: ", $this->price - ($this->price * 10 / 100), 'руб';
            echo "<br>";
        }
    }

    public function getPriceWithDiscount()
    {
        if ($this->discount>0)
        {
             echo "Цена со скидкой ", $this->discount, '% - ' , $this->price - ($this->price * $this->discount / 100), 'руб';
            echo "<br>";
        }
    }
    public function getDostavkaPrice()
    {
        if ($this->discount>0 or $this->weigh>=10) 
        {
            echo "Цена за доставку товара: ", 300, " Руб";
        } else {echo "Цена за доставку товара: ",  250, " Руб";}
    }

}

echo "<hr>";

$iphone8 = new Product ('Apple iphone 8', 80000, 10, 0.3, 'Нет в наличии');
$iphone8->setPhoto("<img src='http://fgupniisk.ru/en/assets/components/templates/img/no_image.jpg'>")->setAbout('Самая популярная камера усовершенствована. Установлен самый умный и мощный процессор, когда-﻿либо созданный для iPhone. Без проводов процесс зарядки становится элементарным. А дополненная реальность открывает невиданные до сих пор возможности. iPhone 8. Новое поколение iPhone.');
echo $iphone8->getAll(), "<hr>";

$plita = new Product ('Газовая плита gorenia', 110000, 0, 12, 'В наличии');
$plita->setPhoto("<img src='http://fgupniisk.ru/en/assets/components/templates/img/no_image.jpg'>")->setAbout('Плита газовая');
echo $plita->getAll(), "<hr>";

$iphoneX = new Product ('Apple iphone X', 110000, 15, 0.7, 'В наличии');
$iphoneX->setPhoto("<img src='http://fgupniisk.ru/en/assets/components/templates/img/no_image.jpg'>")->setAbout('Самая популярная камера усовершенствована. Установлен самый умный и мощный процессор, когда-﻿либо созданный для iPhone. Без проводов процесс зарядки становится элементарным. А дополненная реальность открывает невиданные до сих пор возможности. iPhone. Новое поколение iPhone.');
echo $iphoneX->getAll(), "<hr>";
