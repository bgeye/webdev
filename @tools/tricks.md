##tricks

###document.querySelector

querySelector() has not only to be used on document also on event.target e.g. is
possible

        document.querySelector('.class');
        event.target.querySelector('li');
        document.querySelector('li').parentNode.querySelector(':last-child');
        
###module pattern
function (e.g. function in var App = ....)will be executed immediately
returned is then an object which contains all functions

init function should contain event binding