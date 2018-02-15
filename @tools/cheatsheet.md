##cheatsheet

###git
push branch to remote

        git push -u origin BRANCH-NAME


delete local branch

        git branch -d test
        git branch -D test


delete remote branch

        git push origin --delete test
        
       
###js
remove element from array with index = 3

        var myFish = ['angel', 'clown', 'drum', 'mandarin', 'sturgeon']; 
        var removed = myFish.splice(3, 1); 
        
        
###data types: null vs undefined 
Here are the quick facts:

        null is an assigned value. It means nothing.
        undefined means a variable has been declared but not defined yet.
        null is an object. undefined is of type undefined.
        null !== undefined but null == undefined(true).
        null === undefined(false, type is not the same, but value nothing in both)


demo


        typeof null          // "object" (not "null" for legacy reasons)
        typeof undefined     // "undefined"
        null === undefined   // false
        null == undefined    // true
        null === null        // true
        null == null         // true
        !null                // true
        isNaN(1 + null)      // false
        isNaN(1 + undefined) // true