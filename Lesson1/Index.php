<?php
//Задание 1 - 4
class Basket {
    public $user;
    public $order;
    public $orderNumber;
    public $orderAddress;
    protected $sale = [];
    public $userPromoKey;
    protected  $promoKey;
    public  $sum;

    public function __construct($user, $order, $orderNumber, $orderAddress, $userPromoKey)
    {
        $this->user = $user;
        $this->order = $order;
        $this->orderNumber = $orderNumber;
        $this->orderAddress = $orderAddress;
        $this->userPromoKey= $userPromoKey;
    }

    public function doPromo($promoKey, $userPromokey){
        if ($promoKey == $userPromokey){
            $sum = $sum - 1000;
        }
    }

    public function prepareOrderToPost($user, $order, $orderAddres){
        sendToDataBase($user, $order, $orderAddres);
        sendEmailToUser($user, $order);
    }
}
// Класс склада, для проверки наличия товара на складе
class StoreStorage extends Basket{
    //public $stockCount = queryAll("SELECT * FROM shop.`stock` WHERE item = $order['itemName']");
    public $remains;
}

//Задание 5
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

//будет 1234, здесть пример как был на уроке. обоих случаях ссылка на обьект с ID [1] и получается, что переменная
// статическая и одна и та же в обоих оьбектах
//Задание 6

class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

// будет 1122 - примере из дз. или 5162 в моем случае по тому, что мы опредилили новый обьект B у которого новый ID
// и соответственно новая переменная, которая начинает отсчет с нуля.


//Задание 6 вроде бы тут ошибка, все идентично предыдущему заданию
class C {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class D extends C {
}
$a1 = new C;
$b1 = new D;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

//