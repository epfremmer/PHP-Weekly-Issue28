<?php
/**
 * File Conjunction.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Entity;

/**
 * Class Conjunction
 *
 * @package PHPWeekly\Entity
 */
class Conjunction extends Word
{
    const AMP_CONJ = '&';
    const AND_CONJ = 'and';
    const OR_CONJ = 'or';
    const NOR_CONJ = 'nor';
    const BUT_CONJ = 'but';

    /**
     * @var string[]
     */
    public static $conjunctions = [
        self::AMP_CONJ,
        self::AND_CONJ,
        self::OR_CONJ,
        self::NOR_CONJ,
        self::BUT_CONJ,
    ];

    /**
     * @return string[]
     */
    public static function getConjunctions()
    {
        return self::$conjunctions;
    }
}
