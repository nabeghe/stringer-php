<?php namespace Nabeghe\Stringer;

/**
 * A string class.
 * Accepts any value, converts it to a string, stores it, and returns it via __toString
 */
class Stringer
{
    protected string $value;

    public function __construct($value)
    {
        $this->value = strval($value);
    }

    public function __toString()
    {
        return $this->value;
    }
}