<?php
/**
 * File Oxfordable.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Entity\Traits;

/**
 * Class Oxfordable
 *
 * @package PHPWeekly\Entity\Traits
 */
trait Oxfordable
{
    /**
     * @var bool
     */
    private $oxford;

    /**
     * Get oxford flag
     *
     * @return bool
     */
    public function getOxford()
    {
        return $this->oxford;
    }

    /**
     * Set as oxford item
     *
     * @return $this
     */
    public function setOxford()
    {
        $this->oxford = true;

        return $this;
    }

    /**
     * Set as serial item
     *
     * @return $this
     */
    public function setSerial()
    {
        $this->oxford = false;

        return $this;
    }
}
