var Tools = (function(){
    var removeElement = function(element){

        element.parentNode.removeChild(element);
    };

    var delegate = function(param,callback){

            return function remove(e){
                console.log(param);
                console.log(e.target);
               if(e.target && e.target.matches(param)){

                   callback(e);
               }
            }

    };
    return{
        delegate:delegate,
        removeElement:removeElement
    };
})()

