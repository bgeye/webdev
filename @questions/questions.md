###delegate
wieso return function innerhalb delegate -> würde das Ausführen der function
nicht genügen?

###post
response bei server error auch an callback übergeben?
successCallback
errorCallback

###get
response bei request.onload(if false) und request.onerror 
auch an callback übergeben?

wie mehrere requests handel

request.onload checkt nicht dass response da ist, deshalb checken mit 
if request.status

evt. sind weitere Stati korrekt, abhängig von Implementation

###function in variable
wieso funktion nicht in variable wie in Folie in JS Repetition 2?

Reihenfolge -> Funktion wird aufgerufen



###rendern
rendern nach delegate erst in callback function


###return function in delegate

this function will be executed by click -> it's like the function
which is defined in the eventlistener
