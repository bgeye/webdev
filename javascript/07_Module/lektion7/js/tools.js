var Tools = (function(){
    var removeElement = function(element){//only give the element which has to be deleted(to use in several cases)

        element.parentNode.removeChild(element);
    };

    var delegate = function(target,callback){

            //function check is returned back for click!
            return function check(e){  //on click this function is executed, event is like when a normal click function is executed
               if(e.target && e.target.matches(target)){
                   console.log('callback event: '+e);
                   callback(e);//the function to remove the element is called e -> event(this is the function in the html doc which is called)
                               //the callback function can also have other names.
                               //because we call the function and an event is required we have to send the event
               }
            }

    };
    return{
        delegate:delegate,           //public methods to use in scripts in other files where tools.js is inbound
        removeElement:removeElement
    };
})()

