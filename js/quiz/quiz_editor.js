var questionArray = []
var questionWrapper = document.getElementById("quiz-upload-wrapper");

class QuestionElement{
    constructor()
    {
        this.title = "";
        this.description = "";
        this.image = "";
        this.question = "";
        this.answer = "";

        this.mainElem = null;
        this.createHTML();
    }

    removeFromArray(){
        console.log('ok');
        questionArray = questionArray.filter(q => q === this);
    }

    createHTML(){
        let mainElem = document.createElement('div');
        mainElem.className = "quiz-upload-entry";
        this.mainElem = mainElem;
        
        let titleElem = document.createElement('input');
        titleElem.className = "quiz-upload-title";

        let descElem = document.createElement('input');
        descElem.className = "quiz-upload-desc";

        let imgElem = document.createElement('input');
        imgElem.className = "quiz-upload-image";

        let questionElem = document.createElement('input');
        questionElem.className = "quiz-upload-question";

        let answerElem = document.createElement('input');
        answerElem.className = "quiz-upload-answer";

        let button = document.createElement('button');
        button.innerText = 'Delete';
        
        this.mainElem.addEventListener('change', (event) => {
            switch(event.target.className){
                case "quiz-upload-title":
                    this.title = event.target.value;
                    console.log(this.title);
                    break;
                case "quiz-upload-desc":
                    this.description = event.target.value;
                    console.log(this.description);
                    break;
                case "quiz-upload-image":
                    this.image = event.target.value;
                    console.log(this.image);
                    break;
                case "quiz-upload-question":
                    this.question= event.target.value;
                    console.log(this.question);
                    break;
                case "quiz-upload-answer":
                    this.answer= event.target.value;
                    console.log(this.answer);
                    break;
                default:
                    break;
            }
        });

        mainElem.appendChild(titleElem);
        mainElem.innerHTML += '<br>';
        mainElem.appendChild(descElem);
        mainElem.innerHTML += '<br>';
        mainElem.appendChild(imgElem);
        mainElem.innerHTML += '<br>';
        mainElem.appendChild(questionElem);
        mainElem.innerHTML += '<br>';
        mainElem.appendChild(answerElem);
        mainElem.innerHTML += '<hr>';
        questionWrapper.appendChild(mainElem);
    }
}

class Question{
    constructor(title, desc, img, question, answer)
    {
        this.title = title;
        this.description = desc;
        this.image = img;
        this.question = question;
        this.answer = answer;
    }
}


function addQuestion(){
    let question = new QuestionElement();
    questionArray.push(question);
}

function arrayToJSON(){
    let uploadArray = [];
    for(i=0; i<questionArray.length; i++){
        uploadArray.push(new Question(questionArray[i].title, 
                                    questionArray[i].description, 
                                    questionArray[i].image, 
                                    questionArray[i].question, 
                                    questionArray[i].answer));
    }
    var x = JSON.stringify(uploadArray);
    console.log(x);
}

function removeQuestion(){

}