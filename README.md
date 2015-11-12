# Challenge 028: Oxford Commas

## Challenge

This week’s challenge is the first a series of cross-backend technology challenges (JVM, .NET, and PHP). Code can be 
submitted in any language, and each submission will only be graded against like-languaged submissions.

First, some background: The oxford comma is a type of comma that is employed when there are more than two items in a 
list. It is also the source of countless pretentious debates.

This week’s challenge is to create a set of methods that do two things: remove oxford commas from a string, and add 
oxford commas to a string.

    class Oxfordinator
    {
        public function AddOxfordCommas($input);
    
        public function RemoveOxfordCommas($input);
    }
    
Example input strings:

* I like flour, sugar and chocolate in my brownies.
* My peripherals include headphones, keyboards and mice.
* Our presidents, Lady and Tom O’Neill.
* They went to the Nerdery with Joe, a client and an employee.

Winners will be selected using a secret input that we will keep hidden. The individual who adds the most correct 
commas to the input, while having the least errors, will be selected.

## Installation

1. `composer install`

## Useage

1. Run `php index.php`
