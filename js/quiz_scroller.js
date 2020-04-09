/*var questionArray = [
    {
        title:"Zip line", 
        description:"A zip line starts on a platform that is 40 meters above the ground. The anchor for the zip line is 198198198 horizontal meters from the base of the platform.", 
        graphicpath:"css/resource/quiz/graphic1.png",
        question:"How long is the zip line?",
        answer:"202"
    },
    {
        title:"Treasure hunt", 
        description:"Peter is making an 'X marks the spot' flag for a treasure hunt. The flag is made of a square white flag with sides of 121212 centimeters. He will make the 'X' by stretching red ribbon diagonally from corner to corner.", 
        graphicpath:"",
        question:"How many centimeters of ribbon will Peter need to make the 'X'?",
        answer:"34"
    }
    
];
*/
//Requires variable questionArray set from php query  
var questionSize = questionArray.length;
var questionTitle = document.getElementById('question-title');
var questionDesc = document.getElementById('question-desc');
var questionSentence = document.getElementById('actual-question');
var questionGraphic = document.getElementById('graphic');
var counter = document.getElementById('question-counter');
var answerBox = document.getElementById('answer-text');
var checkButton = document.getElementById('button-check');

var currentIndex = 0;


function setCheckAnswer(){
    checkButton.addEventListener("click", function(){
        if(answerBox.value == questionAnswer)
            alert("Correct");
        else
            alert("Incorrect");
    })
}

function setQuestionInfo(){
    questionTitle.innerHTML = questionArray[currentIndex].title;
    questionDesc.innerHTML = questionArray[currentIndex].description;
    questionSentence.innerHTML = questionArray[currentIndex].question;
    questionGraphic.src = questionArray[currentIndex].graphicpath;
    questionAnswer = questionArray[currentIndex].answer;
    counter.innerHTML = "(" + (currentIndex + 1) + "/" + questionSize + ")";
}

document.getElementById("button-next").addEventListener("click", function(){
    if(currentIndex < questionSize-1)
        currentIndex++;
    setQuestionInfo();
});

document.getElementById("button-prev").addEventListener("click", function(){
    if(currentIndex > 0)
        currentIndex--;
    setQuestionInfo();
});

setQuestionInfo();
setCheckAnswer();