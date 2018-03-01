

var btnSpeech = document.querySelector('#speech');
var list = document.querySelector('.todo__list');

var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.
msSpeechRecognition)();

recognition = 'de-CH';
recognition.interimResults = false;
recognition.maxAlternatives =  5;

recognition.onresult = function(event){
    console.log('You said: '+ event.results[0][0].transcript);
    var li = document.createElement('li');
    li.innerText = event.results[0][0].transcript;
    list.appendChild(li);
}

btnSpeech.addEventListener('click',function(){
    recognition.start();

})

