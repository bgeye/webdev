var Tools = (function(){
    var removeElement = function(element){

        element.parentNode.removeChild(element);
    };

    var delegate = function(target,callback){

            //function check is returned back for click!
            return function check(e){  //on click this function is executed, event is like when a normal click function is executed
               if(e.target && e.target.matches(target)){
                   console.log('callback event: '+e);
                   callback(e);//the function to remove the element is called e -> event
               }
            }

    };
    return{
        delegate:delegate,           //public methods to use in scripts in other files where tools.js is inbound
        removeElement:removeElement
    };
})()

