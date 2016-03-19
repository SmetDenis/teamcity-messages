<?php

namespace MichalKocarek\TeamcityMessages\Tests\Writers;

use MichalKocarek\TeamcityMessages\Writers\StdoutWriter;
use PHPUnit_Framework_TestCase;

require_once(__DIR__.'/DataProvider.php');

class StdoutWriterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderWrite
     * @param array $messages
     */
    public function testWrite($messages)
    {
        $messages = func_get_args(); // TODO replace to valid code for PHP 5.4+

        $writer = new StdoutWriter();

        ob_start();
        foreach($messages as $message) {
            $writer->write($message);
        }

        $result = ob_get_clean();

        $expected = implode($messages);
        self::assertSame($expected, $result);
    }

    public function dataProviderWrite()
    {
        return DataProvider::getMessages();
    }
}
