<?php
/**
 * File Sentence.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use PHPWeekly\Entity\Traits\Oxfordable;
use PHPWeekly\Factory\WordFactory;

/**
 * Class Sentence
 *
 * @package PHPWeekly\Entity
 */
class Sentence
{
    use Oxfordable;

    /**
     * @var string
     */
    private $text;

    /**
     * @var ArrayCollection|Word[]
     */
    private $words;

    /**
     * Constructor
     *
     * @param string $text
     * @param WordFactory $wordFactory
     */
    public function __construct($text, WordFactory $wordFactory)
    {
        $this->text = $text;

        $this->words = new ArrayCollection(explode(' ', $text));

        $this->words->forAll(function($index, $word) use ($wordFactory) {
            $this->words->set($index, $wordFactory->make($word));
            return true;
        });

    }

    /**
     * Set comma state on oxford candidate word and
     * implode words back together
     *
     * @return string
     */
    public function __toString()
    {
        $this->getOxfordItems()->map(function(Word $word) {
            $word->setComma($this->getOxford());
        });

        return implode(' ', $this->words->toArray());
    }

    /**
     * Return the last oxford comma eligible word
     * in the sentence
     *
     * @return ArrayCollection|Word[]
     */
    public function getOxfordItems()
    {
        $words = new ArrayCollection();
        $conjunctions = $this->words->filter(function(Word $word) {
            return $word instanceof Conjunction;
        });

        $conjunctions->map(function($word) use ($words) {
            if ($this->hasOxfordable($word)) {
                $index = $this->words->indexOf($word) - 1;

                $words->add($this->words->get($index));
            }
        });

        return $words;
    }

    /**
     * Test if there is a previous oxfordable word
     * available to the conjunction
     *
     * @param Conjunction $word
     * @return bool
     */
    private function hasOxfordable(Conjunction $word)
    {
        $index = $this->words->indexOf($word);

        return $this->words->offsetExists($index - 1);
    }
}
