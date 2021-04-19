<?php

abstract class Figure
{
    const TYPE_CIRCLE = 'circle';
    const TYPE_SQUARE = 'square';
    const TYPE_RECTANGLE = 'rectangle';
 
    public static function getFigure($type, $param1, $param2 = null): Figure
    {
        switch ($type) {
            case self::TYPE_CIRCLE: return new Circle($param1);
            case self::TYPE_SQUARE: return new Square($param1);
            case self::TYPE_RECTANGLE: return new Rectangle($param1, $param2);
        }
 
        throw new \Exception('Неизвестный тип фигуры');
    }
    abstract public function getName(): string;
    abstract public function render();
}


class Circle extends Figure
{
    private $radius;
 
    public function __construct($radius)
    {
        if (empty($radius)) {
            throw new \Exception('Не указан радиус круга');
        } 
        else if ($radius < 0) {
            throw new \Exception('Радиус круга не может быть меньше нуля');
        }else {
            $this->radius = $radius;
        }
    }
 
    public function getName(): string
    {
        return 'Круг';
    }
 
    public function render()
    {
        //todo
    }
}

class Rectangle extends Figure
{
    private  $width;
    private $height;
 
    public function __construct(int $width, int $height)
    {
        if (empty($width)) {
            throw new \Exception('Не указана ширина прямоугольника');
        } 
        else if ($width < 0) {
            throw new \Exception('Ширина прямоугольника не может быть отрицательным числом');
        }
        if (empty($height) || $height == null) {
            throw new \Exception('Не указана высота прямоугольника');
        }
        else if ($height < 0) {
            throw new \Exception('Высота прямоугольника не может быть отрицательным числом');
        } else {
            $this->width = $width;
            $this->height = $height;
        }
    }
 
    public function getName(): string
    {
        return 'Прямоугольник';
    }
 
    public function render()
    {
        //todo
    }
}

class Square extends Figure
{
    private $side;
 
    public function __construct(int $side)
    {
        if (empty($side)) {
            throw new \Exception('Не указана сторона квадрата');
        }
        else if ($side < 0) {
            throw new \Exception('Cторона квадрата не может быть меньше нуля');
        } else {
            $this->side = $side;
        }
    }
 
    public function getName(): string
    {
        return 'Квадрат';
    }
 
    public function render()
    {
        //todo
    }
}


$circle = Figure::getFigure('circle', 100);
$rectangle = Figure::getFigure('rectangle', 100, 200);
$square = Figure::getFigure('square', 100);

echo $circle->getName() . "</br>";
echo $rectangle->getName() . "</br>";
echo $square->getName() . "</br>";