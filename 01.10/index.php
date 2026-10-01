<?php

class Book {
    public $title;
    public $author;
    public $year;
    public $price;

    function __construct($title, $author, $year, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->price = $price;
    }

    function getInfo() {
        echo "Книга: $this->title, автор: $this->author, год: $this->year, цена: $this->price<br>";
    }

    function applyDiscount($percent) {
        $this->price = $this->price - ($this->price * $percent / 100);
        echo "Цена со скидкой: $this->price<br>";
    }
}

class Student {
    public $name;
    public $group;
    public $grades = array();

    function __construct($name, $group) {
        $this->name = $name;
        $this->group = $group;
    }

    function addGrade($grade) {
        $this->grades[] = $grade;
    }

    function getAverage() {
        $sum = 0;
        for ($i = 0; $i < count($this->grades); $i++) {
            $sum = $sum + $this->grades[$i];
        }
        return $sum / count($this->grades);
    }

    function getStatus() {
        $sr = $this->getAverage();
        if ($sr >= 4.5) {
            return "отличник";
        } else if ($sr >= 3.5) {
            return "хорошист";
        } else {
            return "троечник";
        }
    }
}

class Vehicle {
    public $brand;
    public $speed;

    function __construct($brand, $speed) {
        $this->brand = $brand;
        $this->speed = $speed;
    }

    function start() {
        echo "$this->brand завелся<br>";
    }

    function stop() {
        echo "$this->brand заглох<br>";
    }
}

class Car extends Vehicle {
    public $doors;

    function __construct($brand, $speed, $doors) {
        parent::__construct($brand, $speed);
        $this->doors = $doors;
    }

    function honk() {
        echo "$this->brand бибикнул<br>";
    }
}

class Motorcycle extends Vehicle {
    public $hasSidecar;

    function __construct($brand, $speed, $hasSidecar) {
        parent::__construct($brand, $speed);
        $this->hasSidecar = $hasSidecar;
    }

    function wheelie() {
        echo "$this->brand встал на заднее колесо<br>";
    }
}

class Account {
    public $balance;

    function __construct($balance) {
        $this->balance = $balance;
    }

    function deposit($sum) {
        $this->balance = $this->balance + $sum;
        echo "Пополнил на $sum, теперь $this->balance<br>";
    }

    function withdraw($sum) {
        if ($sum > $this->balance) {
            echo "Денег нет<br>";
        } else {
            $this->balance = $this->balance - $sum;
            echo "Снял $sum, осталось $this->balance<br>";
        }
    }
}

class SavingsAccount extends Account {
    public $percent;

    function __construct($balance, $percent) {
        parent::__construct($balance);
        $this->percent = $percent;
    }

    function addInterest() {
        $this->balance = $this->balance + ($this->balance * $this->percent / 100);
        echo "Начислили проценты, теперь $this->balance<br>";
    }
}

class CreditAccount extends Account {
    public $limit;
    public $debt = 0;

    function __construct($limit) {
        parent::__construct(0);
        $this->limit = $limit;
    }

    function withdraw($sum) {
        if ($this->debt + $sum > $this->limit) {
            echo "Лимит превышен<br>";
        } else {
            $this->debt = $this->debt + $sum;
            echo "Взял в долг $sum, долг теперь $this->debt<br>";
        }
    }
}