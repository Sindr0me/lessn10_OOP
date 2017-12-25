<?php
class ForAll
{
    protected $nameForAll;
    protected $WTF;

    public function setNameForAll($nameForAll) 
    {
        $this->nameForAll = $nameForAll;
    }

    public function getNameForAll() 
    {
        echo 'Имя объекта: ', $this->nameForAll, PHP_EOL;
    }

    public function setWTF($WTF) 
    {
        $this->WTF = $WTF;
    }

    public function getWTF() 
    {
        echo 'Это - ', $this->WTF, PHP_EOL;
    }
}

interface ForCar {
    public function getMaxSpeed();
    public function getPrice();
    public function getColor();
    public function getFuel();
    public function getPriceWithFuel95();            //добавлен интерфейс-----------------
    public function getPriceWithFuel93();
    public function getPriceWithFuel92();
}

class Car implements ForCar
{
    public $color = 'Черный';
    private $maxSpeed = 240;   #скорость км в ч
    private $price = 40000;   #цена в долларах
    private $fuel = [95, 92, 93];
    private $discount = [0, 10, 20, 50];
    const WHEELS = 4;

    public function getPrice()
    {
        echo $this->price;
    }

      public function getMaxSpeed()
    {
        echo $this->maxSpeed;
    }

      public function getColor()
    { 
        echo $this->color;
    }

      public function getFuel()
    {
        
        var_dump ($this->fuel);
    }

    public function getPriceWithFuel95()
    {
        
        if ($this->fuel[0] == 95){ echo "Цена мазды с бензином 95: ", $this->price - ($this->price * $this->discount[0] / 100), '$';
            echo "<br>";
        } 
    }

    public function getPriceWithFuel92()
    {
        
        if ($this->fuel[1] == 92){ echo "Цена мазды с бензином 92: ", $this->price - ($this->price * $this->discount[2] / 100), '$';
            echo "<br>";
        } 
    }

    public function getPriceWithFuel93()
    {
        
        if ($this->fuel[2] == 93){ echo "Цена мазды с бензином 93: ", $this->price - ($this->price * $this->discount[1] / 100), '$';
            echo "<br>";
        }
    }

    public function getPriceForOthers()
    {
        
         echo $this->price - ($this->price * $this->discount[3] / 100), '$';
    }

}

$mazda7 = new Car();
echo "<h2>Модель машины: мазда7</h2>";
echo $mazda7->getPriceWithFuel95();
echo $mazda7->getPriceWithFuel92();
echo $mazda7->getPriceWithFuel93();
echo 'Количество колес по умолчанию:', Car::WHEELS, '<br>';
echo 'Цвет машины: ', $mazda7->getColor('$ed');
echo "<br>";
echo 'Максимальная скорость: ', $mazda7->getMaxSpeed(), 'км/ч';


$bmw = new Car();
echo "<h2>Модель машины: bmw</h2>";
echo "Цена машины: ", $bmw->getPriceForOthers();
echo "<br>";
echo 'Цвет машины: ', $bmw->getColor();
echo "<br>";
echo 'Количество колес по умолчанию:', Car::WHEELS, '<br>';
echo 'Максимальная скорость: ', $bmw->getMaxSpeed(), 'км/ч';

interface ForTV {
    public function __construct($model, $color, $diagonale, $price);           //добавлен интерфейс-----------------
}

class TV implements ForTV
{
    public $model;
    public $color;
    public $diagonale;   #в дюймах
    public $price;   #цена в долларах
    public $matrix = 'ЖК';

    public function __construct($model, $color, $diagonale, $price)
    {
        echo '<br><h2>Телевизор ', $this->model = $model, '</h2>';
        echo '<br> Цвет:', $this->color = $color;
        echo '<br> Диагональ:', $this->diagonale = $diagonale;
        echo '<br> Цена:', $this->price = $price, '$';
        echo '<br>Тип матрицы: ', $this->matrix;
    }
}

echo '<hr>';
$samsung = new TV('Samsung', 'Красный', 25, 500);
$lg = new TV('LG', 'Черный', 30, 900);

interface ForPen {
    public function setColor($color);
    public function __construct();
}

class Pen implements ForPen
{
    public $color= 'Синий';
    public $price = 1;   #цена в долларах
    public static $how = 0;
    public $part = 0;

    public function __construct()
    {
        ++self::$how;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getPart()
    {   
        if ($this->part>=0) {
        echo '<br>Партия №: ', $this->part++;} //как тут сделать чтобы каждая партия считалась за 1 и прибавла +1 к следующей?
    }
}

$pen1 = new Pen();
$pen1->setColor('Голубой');
echo '<hr><br>Цвет ручки: ', $pen1->color;
echo $pen1->getPart(); //как тут сделать чтобы каждая партия считалась за 1 и прибавла +1 к следующей?

$pen2 = new Pen();
$pen2->setColor('Красный');
echo '<br>Цвет ручки: ', $pen2->color;
echo $pen2->getPart();

echo '<br><strong>На данный момент выпущено партий по 100 шт: ', Pen::$how, '</strong>';


interface ForDuck {
    public function getAllStats();
    public function setAnotherStats($name, $color, $sex, $status, $age);   //добавлен интерфейс-----------------
}

class Duck implements ForDuck
{
    public $name= 'Утка обкновенная';
    public $color = 'Коричневая';
    public $sex = 'Самец';
    public $status = 'Живая';
    public $age = 1;

    function getAllStats()
    {
        echo '<h2>', $this->name, '</h2>';
        echo '<br>Цвет: ', $this->color;
        echo '<br>Пол: ', $this->sex;
        echo '<br>Состояние на настоящий момент: ', $this->status;
        echo '<br>Возраст: ', $this->age;
    }

    public function setAnotherStats($name, $color, $sex, $status, $age)
    {
        $this->name = $name;
        $this->color = $color;
        $this->sex = $sex;
        $this->status = $status;
        $this->age = $age;
    }
}

$duckSiberia1 = new Duck();
$duckSiberia1->setAnotherStats('Утка сибирская', 'Красно-белый', 'Самка', 'Мертва', 6);
echo "<hr>";
echo $duckSiberia1->getAllStats();

$duckDefault1 = new Duck();
echo $duckDefault1->getAllStats();


interface ForProduct {

    public function getPriceWithDiscount();  // добавлен интерфейс ----------
}

class Product extends ForAll implements ForProduct
{
    public $title= 'Тут название товара';
    public $about = 'О товаре';
    public $photo = "<img src='http://fgupniisk.ru/en/assets/components/templates/img/no_image.jpg'>";
    private $price;
    public $status = 'Нет в наличии';
    private $discount;
    private $buttonBuy='<a href="URL">Купить</a>';



    public function __construct($title, $about, $price, $discount)
    {
        echo '<br><h2>Товар: ', $this->title = $title, '</h2>';
        echo $this->photo;
        echo '<br> О товаре: ', $this->about = $about;
        $this->price = $price;
        $this->discount = $discount;

        echo $this->getPriceWithDiscount();

    }

    public function getPriceWithDiscount()
    {
        if ($this->price>0)
        {
             echo "<br>Цена: ", $this->price - ($this->price * $this->discount / 100), 'руб';
            echo "<br>";
        }
    }

    public function getStatus($status)
    {
        $this->status = $status;
    }

    public function getButton(){
        if ($this->status == 'В наличии') {
            echo 'Телефон есть в наличии на складе <br><strong>', $this->buttonBuy, '<br>', '</strong>';
        } else { echo $this->status;}
    }
}

echo "<hr>";
$iphone8 = new Product('iphone 8', 'Новый инновационный смартфон от яблока', 50000, 10, 'Телефон');
echo $iphone8->getStatus('В наличии');
echo $iphone8->getButton();

$iphone8->setNameForAll('Смартфон<br>');
$iphone8->setWTF('высокотехнологичное устройство<br>');   //---добавлено полсе из суперкласса-------------
echo $iphone8->getNameForAll();
echo $iphone8->getWTF();


$iphone10 = new Product('iphone 10', 'Новый инновационный смартфон от яблока, еще круче предыдущего', 110000, 0);
echo $iphone10->getStatus('Нет в наличии');
echo $iphone10->getButton();

$samsunGalaxy = new Product('samsung Galaxy чето там', 'Новый инновационный смартфон от самсунг, говорят он лучше яблока, но это не точно', 110000, 0);
echo $iphone8->getStatus('В наличии');
echo $iphone8->getButton();