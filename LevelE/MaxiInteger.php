<?php

namespace Hackathon\LevelE;

class MaxiInteger
{
    private $value;
    private $reverse;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * @FIX : CAN BE UPDATED
     *
     * @param MaxiInteger $other
     * @return $this|MaxiInteger
     */
    public function add(MaxiInteger $other)
    {
        if (is_null($other)) {
            return $this;
        }

        /**
         * You can delete this part of the code
         */
        $maxLength = max(strlen($this->getValue()), strlen($other->getValue()));
        if ($maxLength) {
            $other = $other->fillWithZero($maxLength);
            $this->setValue($this->fillWithZero($maxLength)->getValue());
        }

        return $this->realSum($this, $other);
    }

    /**
     * @TODO
     *
     * @param MaxiInteger $a
     * @param MaxiInteger $b
     * @return MaxiInteger
     */
    private function realSum($a, $b)
    {
        $result = '';

        $plopA = $a->getReverseValue();
        $plopB = $b->getReverseValue();

        $maxLength = max(strlen($plopA), strlen($plopB));

        $plopA = str_pad($plopA, $maxLength - strlen($plopA), "0");
        $plopB = str_pad($plopB, $maxLength - strlen($plopB), "0");

        $i = 0;

        $retenue = 0;
        while ($i < $maxLength) {
            $sum = $plopA[$i] + $plopB[$i] + $retenue;
            if ($sum >= 10) {
                $sum -= 10;
                $retenue = 1;
            } else {
                $retenue = 0;
            }
            $result .= $sum;

            $i++;
        }

        if ($retenue > 0) {
            $result .= $retenue;
        }

        return new MaxiInteger(strrev($result));
    }

    private function setValue($value)
    {
        $this->value = $value;
        $this->reverse = $this->createReverseValue($value);
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getReverseValue()
    {
        return $this->reverse;
    }


    private function getNthOfMaxiInteger($n)
    {
        return $this->value[$n];
    }
    private function createReverseValue($value)
    {
        return strrev($value);
    }

    private function fillWithZero($totalLength)
    {
        return new self(strrev(str_pad($this->reverse, $totalLength, '0')));
    }
}
