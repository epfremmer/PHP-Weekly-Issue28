<?php
/**
 * File SentenceFactory.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Factory;

use PHPWeekly\Entity\Sentence;

/**
 * Class SentenceFactory
 *
 * @package PHPWeekly\Factory
 */
class SentenceFactory
{
    /**
     * @var WordFactory
     */
    private $wordFactory;

    /**
     * @param WordFactory $wordFactory
     */
    public function __construct(WordFactory $wordFactory)
    {
        $this->wordFactory = $wordFactory;
    }

    /**
     * Return new Sentence entity
     *
     * @param string $sentence
     * @return Sentence
     */
    public function make($sentence)
    {
        if (!$this->isValid($sentence)) {
            throw new \InvalidArgumentException(
                'Sentences must begin with capital letter/number and end with a period or semicolon'
            );
        }

        return new Sentence($sentence, $this->wordFactory);
    }

    /**
     * Validate sentence string
     *
     * @param string $sentence
     * @return bool
     */
    private function isValid($sentence)
    {
        if (!is_string($sentence) || empty($sentence)) {
            return false;
        }
        
        $first = substr($sentence, 0, 1);
        $last  = substr($sentence, -1, 1);

        return ctype_upper($first) || is_numeric($first)
            && in_array($last, ['.', ';']);
    }
}
