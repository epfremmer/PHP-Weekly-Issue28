<?php
/**
 * File Word.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Entity;

use PHPWeekly\Entity\Traits\Oxfordable;

/**
 * Class Word
 *
 * @package PHPWeekly\Entity
 */
class Word
{
    use Oxfordable;

    const COMMA = ',';

    /**
     * @var string
     */
    private $word;

    /**
     * @var bool
     */
    private $comma;

    /**
     *
     * Constructor
     *
     * @param string $word
     */
    public function __construct($word)
    {
        $this->word = str_replace(self::COMMA, '', $word);
        $this->comma = substr($word, -1) === self::COMMA;
    }

    /**
     * Return word to original string with or without
     * optional oxford comma
     *
     * @return string
     */
    public function __toString()
    {
        return implode('', [
            $this->word,
            $this->comma ? self::COMMA : ''
        ]);
    }

    /**
     * Set word to use trailing comma
     *
     * @param bool $comma
     * @return $this
     */
    public function setComma($comma)
    {
        $this->comma = (bool) $comma;

        return $this;
    }

    /**
     * Return existence of trailing comma
     *
     * @return bool
     */
    public function hasComma()
    {
        return $this->comma;
    }
}
