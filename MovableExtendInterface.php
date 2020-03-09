<?php


namespace Packages\Car;

require 'MovableInterface.php';

interface MovableExtendInterface extends MovableInterface
{
    public function transmission();
}