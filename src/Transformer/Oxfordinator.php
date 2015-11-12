<?php
/**
 * File Oxfordinator.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Transformer;

use PHPWeekly\Factory\SentenceFactory;
use PHPWeekly\Factory\WordFactory;

/**
 * Class Oxfordinator
 *
 * @package PHPWeekly\Transformer
 */
class Oxfordinator
{
    /**
     * @var SentenceFactory
     */
    private $sentenceFactory;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sentenceFactory = new SentenceFactory(new WordFactory());
    }

    /**
     * Add oxford comma to input string
     *
     * @param string $input
     * @return string
     */
    public function addOxfordCommas($input)
    {
        $sentence = $this->sentenceFactory->make($input);
        $sentence->setOxford();

        return (string) $sentence;
    }

    /**
     * Remove oxford comma from input string
     *
     * @param string $input
     * @return string
     */
    public function removeOxfordCommas($input)
    {
        $sentence = $this->sentenceFactory->make($input);
        $sentence->setSerial();

        return (string) $sentence;
    }
}
