###delegate
wieso return function innerhalb delegate -> würde das Ausführen der function
nicht genügen?

diese funktion wird bei click ausgeführt, die funktion welche gerufen wird
ist im prinzip diese, welche in der einfachen definition eines eventlisteners
definiert wird und bei einem event gerufen wird; also ganz einfach :-)

this function will be executed by click -> it's like the function
which is defined in the eventlistener

#####rendern
rendern nach delegate erst in callback function

###post
response bei server error auch an callback übergeben?
successCallback
errorCallback

###get
response bei request.onload(if false) und request.onerror 
auch an callback übergeben?

successCallback
errorCallback

request.onload checkt nicht dass response da ist, deshalb checken mit 
if request.status

evt. sind weitere Stati korrekt, abhängig von Implementation

###function in variable
wieso funktion nicht in variable wie in Folie in JS Repetition 2?

Reihenfolge -> Funktion wird aufgerufen








