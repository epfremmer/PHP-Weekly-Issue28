<?php
/**
 * File index.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

use PHPWeekly\Transformer\Oxfordinator;

require_once 'vendor/autoload.php';

$tests = [
    'I like flour, sugar and chocolate in my brownies.',
    'My peripherals include headphones, keyboards and mice.',
    'Our presidents, Lady and Tom O’Neill.',
    'They went to the Nerdery with Joe, a client and an employee.',
];

$oxforder = new Oxfordinator();

foreach ($tests as $test) {
    echo sprintf('Original: %s', $test) . PHP_EOL;
    echo sprintf('Oxford:   %s', $oxforder->addOxfordCommas($test)) . PHP_EOL;
    echo sprintf('Serial:   %s', $oxforder->removeOxfordCommas($test)) . PHP_EOL;
    echo PHP_EOL;
}
