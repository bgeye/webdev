var Speech = (function(){
    //var btnSpeech = document.querySelector('#speech');
    //var list = document.querySelector('.todo__list');

    var listen = function(callback){
        var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.
            msSpeechRecognition)();


        recognition.lang = 'de-CH';
        recognition.interimResults = false;
        recognition.maxAlternatives =  5;


        recognition.onresult = function(event){

            var response = event.results[0][0].transcript;
            callback(response);
        }

        recognition.start();


    }

    return{
        listen:listen
    };





})()



