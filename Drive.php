<?php


namespace Packages\Car;
require 'MovableExtendInterface.php';

class Drive implements MovableExtendInterface
{
    public $engine;
    private $oldspeed;
    private $speed;
    public $transmission;
    private $maxspeed;
    private $minspeed;
    const MAXSPEED = 200;

    public function start()
    {
        if ($this->engine) {
            echo "Двигатель запущен.\n";
        }
    }

    public function stop()
    {
        if (!$this->engine) {
            echo "Двигатель остановлен.\n";
        }
    }

    private function isSpeedCorrect($speed)
    {
        return $speed <= self::MAXSPEED;
    }

    public function setSpeed($speed)
    {
        if ($this->isSpeedCorrect($speed)) {
            $this->speed = $speed;
        } else {
            $this->speed = self::MAXSPEED;
        }
    }

    private function setOldSpeed()
    {
        $file = 'file';

        if (!file_exists($file)) {
            file_put_contents($file, $this->speed);
        } else {
            $this->oldspeed = file_get_contents($file);
            file_put_contents($file, $this->speed);
        }
    }

    public function up()
    {
        if ($this->engine) {
            $this->setOldSpeed();
            if ($this->speed > $this->oldspeed) {
                echo 'Скорость автомобиля увеличилась на ', $this->speed - $this->oldspeed, " и составляет $this->speed км/ч.\n";
            }
        }
    }

    public function down()
    {
        if ($this->engine) {
            if ($this->speed < $this->oldspeed) {
                echo 'Скорость автомобиля уменьшилась на ', $this->oldspeed - $this->speed, " и составляет $this->speed км/ч.\n";
            }
        }
    }

    public function transmission()
    {
        if ($this->engine) {
            switch ($this->transmission) {
                case '1':
                    $this->minspeed = 1;
                    $this->maxspeed = 10;
                    break;
                case '2':
                    $this->minspeed = 10;
                    $this->maxspeed = 30;
                    break;
                case '3':
                    $this->minspeed = 30;
                    $this->maxspeed = 50;
                    break;
                case '4':
                    $this->minspeed = 50;
                    $this->maxspeed = 80;
                    break;
                case  '5':
                    $this->minspeed = 80;
                    $this->maxspeed = self::MAXSPEED;
            }
            if ($this->transmission >= 1 && $this->transmission <= 5) {
                echo "Для установленной передачи рекомендуемая скорость составляет от $this->minspeed до $this->maxspeed км/ч.\n";
            } else {
                echo 'Выберите корректное значение для переключения коробки передач';
            }
            $this->noSpeedCorrectTransmission();
        }
    }

    private function isSpeedCorrectTransmission()
    {
        return $this->speed > $this->maxspeed || $this->speed < $this->minspeed;
    }

    private function noSpeedCorrectTransmission()
    {
        if ($this->isSpeedCorrectTransmission()) {
            echo 'Для достижения необходимой скорости переключите коробку передач.';
        }
    }
}

$drive = new Drive();
$drive->engine = true;
$drive->start();
$drive->stop();
$drive->setSpeed(rand(1, 250));
$drive->up();
$drive->down();
$drive->transmission = 5;
$drive->Transmission();
