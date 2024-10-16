<?php declare(strict_types=1);

use Nabeghe\Stringer\Str;

class StrTest extends \PHPUnit\Framework\TestCase
{
    public const SAMPLE_TEXT = 'In programming, a string is a sequence of characters, and string manipulation processes these characters.';

    public function testAfter()
    {
        $this->assertSame(
            ' is a sequence of characters, and string manipulation processes these characters.',
            Str::after(self::SAMPLE_TEXT, 'string'),
        );
    }

    public function testAfterLast()
    {
        $this->assertSame(
            ' manipulation processes these characters.',
            Str::afterLast(self::SAMPLE_TEXT, 'string'),
        );
    }

    public function testBefore()
    {
        $this->assertSame(
            'In programming, a ',
            Str::before(self::SAMPLE_TEXT, 'string'),
        );
    }

    public function testBeforeLast()
    {
        $this->assertSame(
            'In programming, a string is a sequence of characters, and ',
            Str::beforeLast(self::SAMPLE_TEXT, 'string'),
        );
    }

    public function testBetween()
    {
        $this->assertSame(
            'a string is a sequence of characters',
            Str::between(self::SAMPLE_TEXT, 'programming, ', ', and'),
        );
    }

    public function testBetweenFirst()
    {
        $this->assertSame(
            'a string is a sequence of characters',
            Str::betweenFirst(self::SAMPLE_TEXT, 'programming, ', ', and'),
        );
    }

    public function testCamel()
    {
        $this->assertSame(
            'thisIsAVariable',
            Str::camel('this_is_a_variable'),
        );
    }

    public function testCast()
    {
        $object = new class {
            public function __toString()
            {
                return 'nabeghe/string';
            }
        };
        $this->assertSame(
            'nabeghe/string',
            Str::cast($object),
        );
    }

    public function testChars()
    {
        $this->assertSame(
            ['n', 'a', 'b', 'e', 'g', 'h', 'e', '/', 's', 't', 'r', 'i', 'n', 'g'],
            Str::chars('nabeghe/string'),
        );
    }

    public function testCharAt()
    {
        $this->assertSame(
            '❤️',
            Str::charAt('nabeghe/string ❤️', 15),
        );
    }

    public function testChopStart()
    {
        $this->assertSame(
            'string',
            Str::chopStart('nabeghe/string', 'nabeghe/'),
        );

        $this->assertSame(
            'Nabeghe/string',
            Str::chopStart('Nabeghe/string', 'nabeghe/'),
        );

        $this->assertSame(
            'string',
            Str::chopStart('Nabeghe/string', 'nabeghe/', true),
        );
    }

    public function testChopEnd()
    {
        $this->assertSame(
            'nabeghe',
            Str::chopEnd('nabeghe/string', '/string'),
        );

        $this->assertSame(
            'nabeghe/String',
            Str::chopEnd('nabeghe/String', '/string'),
        );

        $this->assertSame(
            'nabeghe',
            Str::chopEnd('nabeghe/String', '/string', true),
        );
    }

    public function testChunk()
    {
        $this->assertSame(
            ['In programming, a string❤️', ' is a sequence of charact', 'ers, and string manipulat', 'ion processes these chara', 'cters😌.'],
            Str::chunk('In programming, a string❤️ is a sequence of characters, and string manipulation processes these characters😌.', 25),
        );
    }

    public function testContains()
    {
        $this->assertTrue(Str::contains(self::SAMPLE_TEXT, 'In programming'));
        $this->assertTrue(Str::contains(self::SAMPLE_TEXT, 'in programming', true));
        $this->assertFalse(Str::contains(self::SAMPLE_TEXT, 'in programming'));
    }

    public function testContainsAll()
    {
        $this->assertTrue(Str::contains(self::SAMPLE_TEXT, ['In programming', 'string']));
    }

    public function testDoesntContain()
    {
        $this->assertTrue(Str::doesntContain(self::SAMPLE_TEXT, ['In developing', 'integer']));
    }

    public function testDef()
    {
        $this->assertSame('nabeghe/string', Str::def(null, 'nabeghe/string'));
        $this->assertSame('nabeghe/string', Str::def('', 'nabeghe/string'));
        $this->assertSame(self::SAMPLE_TEXT, Str::def(self::SAMPLE_TEXT, 'nabeghe/string'));
    }

    public function testEscapeMarkdown()
    {
        $this->assertSame(
            '\\*This\\* is the \\`code\\` that needs to be escaped.',
            Str::escapeMarkdown('*This* is the `code` that needs to be escaped.')
        );
    }

    public function testEscapeMarkdownCode()
    {
        $this->assertSame(
            'This is the \\`code\\` that needs to be escaped.',
            Str::escapeMarkdownCode('This is the `code` that needs to be escaped.')
        );
    }

    public function testEscapeMarkdownV2CodeBlock()
    {
        $this->assertSame(
            'This is the \\```code\\``` that needs to be escaped.',
            Str::escapeMarkdownV2CodeBlock('This is the ```code``` that needs to be escaped.')
        );
    }

    public function testFirstWord()
    {
        $this->assertSame(
            'In',
            Str::firstWord(self::SAMPLE_TEXT)
        );
    }

    public function testHasChar()
    {
        $this->assertTrue(Str::hasChar('nabeghe/string ❤️', ['❤️']));
    }

    public function testIsMadeOf()
    {
        $this->assertTrue(Str::isMadeOf('nabeghe/string ❤️', [...range('a', 'z'), ...range('A', 'Z'), ...range(0, 9), ' ', '/', '❤️']));
        $this->assertFalse(Str::isMadeOf('nabeghe/string ❤️', ['n']));
    }

    public function testIsJson()
    {
        $this->assertTrue(Str::isJson('{"packageName": "nabeghe/string"}'));
    }

    public function testIsUrl()
    {
        $this->assertTrue(Str::isUrl('https://github.com/nabeghe/string-php'));
        $this->assertTrue(Str::isUrl('https://elatel.ir'));
        $this->assertFalse(Str::isUrl('google.com'));
    }

    public function testIsUuid()
    {
        $this->assertTrue(Str::isUuid('7457ccf7-ec0f-4ba9-a9e7-e9c4db536a91'));
        $this->assertFalse(Str::isUuid('nabeghe/string'));
    }

    public function testKebab()
    {
        $this->assertSame('my-variable', Str::kebab('myVariable'));
        $this->assertSame('my_variable', Str::kebab('my_variable'));
    }

    public function testLimit()
    {
        $this->assertSame(
            'In programming, a string❤️...',
            Str::limit('In programming, a string❤️ is a sequence of characters, and string manipulation processes these characters😌.', 25)
        );
    }

    public function testLimitWords()
    {
        $this->assertSame(
            'In programming, a string❤️...',
            Str::limitWords('In programming, a string❤️ is a sequence of characters, and string manipulation processes these characters😌.', 4)
        );
    }

    public function testLines()
    {
        $this->assertSame(
            ['line1', 'line2', 'line3', 'line4', 'line5'],
            Str::lines(" line1 \n line2 \n line3 \n line4 \n line5")
        );
    }

    public function testLongestSequence()
    {
        $this->assertSame(
            14,
            Str::longestSequence("nabeghe/string  nabeghe/string              nabeghe/string")
        );
        $this->assertSame(
            14,
            Str::longestSequence("nabeghe/string❤️❤️nabeghe/string❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️nabeghe/string", '❤️')
        );
    }
}