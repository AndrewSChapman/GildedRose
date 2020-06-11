# The 'Gilded Rose' Coding Test

This is my implementation of the Gilded Rose challenge.  A few notes:

* I've added support for the new Conjured Items;
* All tests are passing;
* I made no change to the Items class or items property as instructed;
* I rejected the suggestion to change to a static method for nextDay / and or a static property for the items array;

Whilst it would have been possible to code a more complex solution, I've opted for simplicity.  

In general I believe code should be only as complex as the business logic demands.  Simple code is easy 
to read, easy to test and easy to maintain.   

I've implemented the solution using a strategy pattern, where the appropriate quality adjustment 
strategy is selected based on the item being evaluated.

The outcome is that instead of having multiple levels of if/else logic which is difficult to
reason about, there's now a simple strategy for each unique business rule combination.  Each strategy
is very easy to follow.

I used a custom / dedicated strategy for the backstage pass because the backstage pass was sufficiently
different from everything else to warrant it.  In the future if more products are added that are similar
in nature to the backstage pass, I would suggest adding a more generic strategy to deal with them one the 
shared logic is clear.

## A final note

I noticed that the last requirement of the task
"Sulfuras is a legendary item and as such its Quality is 80 and it never alters."
is not implemented by the initial code or reflected in the test suite.  I have left the test suite 
as it is, since it's unclear if this is a mistake in the original code or in the brief, however the
static strategy could be easy changed to return a fixed value instead of the "current" value.

Thanks for the opportunity to attempt this task :-)
