<?php
/**
 * File WordFactory.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Factory;

use PHPWeekly\Entity\Conjunction;
use PHPWeekly\Entity\Word;

/**
 * Class WordFactory
 *
 * @package PHPWeekly\Factory
 */
class WordFactory
{
    /**
     * Return a new Word entity
     *
     * @param string $word
     * @return Conjunction|Word
     */
    public function make($word)
    {
        if (!$this->isValid($word)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid word "%s" provided', $word)
            );
        }

        return $this->isConjunction($word) ? new Conjunction($word) : new Word($word);
    }

    /**
     * Test if word is an eligible oxford conjunction
     *
     * @param string $word
     * @return bool
     */
    private function isConjunction($word)
    {
        return in_array($word, Conjunction::getConjunctions());
    }

    /**
     * Validate word string
     *
     * @param string $word
     * @return bool
     */
    private function isValid($word)
    {
        if (!is_string($word) || empty($word)) {
            return false;
        }

        return true;
    }
}
