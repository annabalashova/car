<?php


namespace Packages\Car;

interface MovableInterface
{
    /**
     * Включает зажигание
     * @return mixed
     */
    public function start();

    /**
     * Выключает зажигание
     * @return mixed
     */
    public function stop();

    /**
     * Увеличивает скорость движения
     * @return mixed
     */
    public function up();

    /**
     * Уменьшает скорость движения
     * @return mixed
     */
    public function down();
}