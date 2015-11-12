<?php
/**
 * File NullWord.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Entity;

/**
 * Class NullWord
 *
 * Null representation used as shim
 * for Word a entity
 * 
 * @package PHPWeekly\Entity
 */
class NullWord extends Word
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        parent::__construct(null);
    }
}
