<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    public function testTruncate(): void
    {
        $title = 'Колотухин Дмитрий Валерьевич';

        $truncater1 = new Truncater();

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Колотухин Дмитрий...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 17]));

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Колотухин Дмитрий***";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 17, 'separator' => '***']));

        $expected = "Колотухин Дмитрий...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => -11]));

        $truncater2 = new Truncater(['length' => 17, 'separator' => '!!!']);

        $expected = "Колотухин Дмитрий!!!";
        $this->assertSame($expected, $truncater2->truncate($title));
    }
}
