<?php

namespace Task02;

class Fraction
{
    private $numer;
    private $demo;

    public function __construct(int $numer, int $demo)
    {
        if ($demo == 0) {
            exit('Знаменатель не может быть равен 0.');
        }

        $this->numer = $numer;
        $this->demo = $demo;
        $this->reduceFraction();
    }

    public function getNumer(): int
    {
        return $this->numer;
    }

    public function getDenom(): int
    {
        return $this->demo;
    }

    public function add(Fraction $frac): Fraction
    {
        $newNumer = ($this->numer * $frac->demo) + ($this->demo * $frac->numer);
        $newDemo = $this->demo * $frac->demo;

        $sumFravtion = new Fraction($newNumer, $newDemo);

        return $sumFravtion;
    }

    public function sub(Fraction $frac): Fraction
    {
        $newNumer = ($this->numer * $frac->demo) - ($this->demo * $frac->numer);
        $newDemo = $this->demo * $frac->demo;

        $subFravtion = new Fraction($newNumer, $newDemo);

        return $subFravtion;
    }

    public function __toString()
    {
        if (abs($this->numer) > $this->demo) {
            $wholePart = intdiv($this->numer, $this->demo);
            $remainder = abs($this->numer % $this->demo);
            $stringFraction = "$wholePart`$remainder/$this->demo";
        } else {
            $stringFraction = "$this->numer/$this->demo";
        }

        return $stringFraction;
    }

    private function reduceFraction()
    {
        $nod = $this->nod($this->numer, $this->demo);
        if ($nod != 1) {
            $this->numer /= $nod;
            $this->demo /= $nod;
        }

        if (($this->numer < 0) && ($this->demo < 0)) {
            $this->numer = abs($this->numer);
            $this->demo = abs($this->demo);
        } elseif ($this->demo < 0) {
            $this->numer = - ($this->numer);
            $this->demo = abs($this->demo);
        }
    }

    private function nod($a, $b)
    {
        if ($b == 0) {
            return $a;
        } else {
            return $this->nod($b, $a % $b);
        }
    }
}?>