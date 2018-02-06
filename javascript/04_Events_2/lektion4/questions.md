##questions

###uebung_2_5.html
####e.target
why e.target to assign to a variable? because it's an object
and there is no access before
e.target.className?

        var moveItem = e.target;
        console.log(moveItem.className);
        
        
        
####nextElementSibling / previousElementSibling

        //down
        moveItem.parentNode.parentNode.insertBefore(moveItem.parentNode.nextElementSibling,moveItem.parentNode);
        //parentNode: moveItem.parentNode.parentNode.insertBefore
        //newNode: moveItem.parentNode.nextElementSibling
        //referenceNode: moveItem.parentNode
        
        //up
        moveItem.parentNode.parentNode.insertBefore(moveItem.parentNode,moveItem.parentNode.previousElementSibling);