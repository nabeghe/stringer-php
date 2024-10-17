<?php declare(strict_types=1);

use Nabeghe\Stringer\Stringer;

class StringerTest extends \PHPUnit\Framework\TestCase
{
    public const SAMPLE_TEXT = 'In programming, a string is a sequence of characters, and string manipulation processes these characters.';

    public function testAfter()
    {
        $this->assertSame(
            ' is a sequence of characters, and string manipulation processes these characters.',
            (string) (new Stringer(static::SAMPLE_TEXT))->after('string'),
        );
    }

    public function testMultipleMethods()
    {
        $this->assertSame(
            'is a sequence of characters',
            (string) (new Stringer(static::SAMPLE_TEXT))->after('string ')->before(','),
        );
    }
}