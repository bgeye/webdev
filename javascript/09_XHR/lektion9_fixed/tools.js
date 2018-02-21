var Tools = (function () {
  var removeElement = function (element) {
    element.parentNode.removeChild(element);
  };

  var delegate = function (target, callback) {
    return function(event) {
      if (event.target && event.target.matches(target)) {
        callback(event);
      };
    }
  };

  var get = function(url,callback){
    //return function getData(){
      var request = new XMLHttpRequest();
      request.open('GET',url,true);
      request.onload = function(){
        if(request.status >= 200 && request.status < 400){
              var data = JSON.parse(request.responseText);
              callback(data);
        }else{
          console.log('server meldet error');
        }
      }

      request.onerror = function(){
        console.log('server not reachable');
      }
      request.send();
   // }
  }

  var post = function(url,data,callback){

      console.log('in setData');
      var request = new XMLHttpRequest();
      request.open('POST',url,true);
      request.setRequestHeader("Content-Type","application/json");
      var data = JSON.stringify(data);
      request.onload = function(){
        if(request.status >= 200 && request.status < 400){
          var serverResponse = JSON.parse(request.responseText);
          callback(serverResponse);
        }else{
          console.log('server meldet error');
        }
      }
      request.send(data);
  }

  return {
    delegate: delegate,
    removeElement: removeElement,
    get: get,
    post: post
  };
})()