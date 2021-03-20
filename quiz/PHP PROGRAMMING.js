const quizDB = [
    {
        question: "Q1:  Who is the father of PHP??",
        a: "Rasmus Lerdorf",
        b: "Willam Makepiece",
        c: "Drek Kolkevi",
        d: " List Barely",
        ans: "ans1"
    },
    {
        question: "Q2: Which of the below symbols is a newline character?",
        a: "\r",
        b: "\n",
        c: "/n",
        d: "/r",
        ans: "ans2"
    },
    {
        question: "Q3: A function in PHP which starts with _ (double underscore) is known as _____",
        a: " Magic Function",
        b: "Inbuilt Function",
        c: "Default Function",
        d: "User Defined Function",
        ans: "ans1"
    },
    {
        question: "Q4:  How to define a function in PHP?",
        a: "function {function body}",
        b: "data type functionName(parameters) {function body}",
        c: " functionName(parameters) {function body}",
        d: "function functionName(parameters) {function body}",
        ans: "ans4"
    },
    {
        question: "Q5:  Type Hinting was introduced in which version of PHP?",
        a: "PHP 4",
        b: "PHP 5",
        c: "PHP 5.3",
        d: "PHP 6",
        ans: "ans2"
    },
];

const question = document.querySelector('.question');
const option1 = document.querySelector('#option1');
const option2 = document.querySelector('#option2');
const option3 = document.querySelector('#option3');
const option4 = document.querySelector('#option4');
const submit = document.querySelector('#submit');

const answers = document.querySelectorAll('.answer');
const showScore = document.querySelector('#showScore');
const id1 = document.querySelector('.card');

const id2 = id1.id;
// console.log(id2);

let questionCount = 0;
let score = 0;
let total = 10;


const loadQuestion = () => {
    // console.log(quizDB[0]);
    const questionList = quizDB[questionCount];

    question.innerHTML = questionList.question;
    option1.innerHTML = questionList.a;
    option2.innerHTML = questionList.b;
    option3.innerHTML = questionList.c;
    option4.innerHTML = questionList.d;

}


loadQuestion();

const getCheckAnswer = () => {
    let answer;

    answers.forEach((curAnsElem) => {
        if(curAnsElem.checked){
            answer = curAnsElem.id;
        }

    });
    return answer;

}

const deSelectAll = () => {
    answers.forEach((curAnsElem) => curAnsElem.checked = false);
}

submit.addEventListener('click',() => {
    const checkedAnswer = getCheckAnswer();
    // console.log(checkedAnswer);
    if(checkedAnswer == quizDB[questionCount].ans){
       score = score+2;
    };

    questionCount++;

    deSelectAll();

    if(questionCount < quizDB.length){
        loadQuestion();
    }else{
        showScore.innerHTML = `
        <h3> You Scored ${score}/${total} </h3>
        <div class='container mt-2'>
        <div class='row'>
        <div class='col-3'></div>
        <div class='col-3'>
        <button class='btn btn-primary' onclick='location.reload()'> Retake </button>
        </div>
        <form class='col-3' action='' method='GET'>
       \
        <a class='btn btn-success' type='submit' name='savenexit' href='takequiz.php?courseid=${id2}&marks=${score}&exit=1'> Save & Exit </a>
        </form>
        </div>
        </div>
        
        `;

            showScore.classList.remove('showArea');
    }
})