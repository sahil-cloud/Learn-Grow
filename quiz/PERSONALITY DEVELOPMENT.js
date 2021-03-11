const quizDB = [
    {
        question: "Q1:  The foremost skill required for learning a language is ___.",
        a: "Writing skill",
        b: "Speaking skill",
        c: "Reading skill",
        d: "Listening skill",
        ans: "ans2"
    },
    {
        question: "Q2:  SQ3R techniques for reading is given by",
        a: " Braille, 1965",
        b: "Robinson in 1970",
        c: "Both a & b",
        d: "Billmeyer, 1962",
        ans: "ans2"
    },
    {
        question: "Q3: A group of words which forms part of a sentence, and contains a subject and a predicate, is called –",
        a: " Magic Function",
        b: "Inbuilt Function",
        c: "Default Function",
        d: "User Defined Function",
        ans: "ans1"
    },
    {
        question: "Q4:  Listening process involves –",
        a: "Clause",
        b: "Phrase",
        c: " Gambit",
        d: "Idioms",
        ans: "ans1"
    },
    {
        question: "Q5:   the fascinating areas of language learning is –",
        a: "Reading",
        b: "Listening",
        c: "Writing",
        d: "Speaking",
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