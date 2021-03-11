const quizDB = [
    {
        question: "Q1:  What dairy product contains several nutrients?",
        a: "Milk",
        b: "Cheese",
        c: "Ice-cream",
        d: "Cream",
        ans: "ans1"
    },
    {
        question: "Q2: What two vitamins does milk contain?",
        a: " Vitamin A",
        b: " Vitamin B12",
        c: "Both A & B",
        d: "None of the above",
        ans: "ans3"
    },
    {
        question: "Q3: What kind of drink did Pasteur invent his heat treatment for?",
        a: "Wine",
        b: "Bear",
        c: "Water",
        d: "Vodka",
        ans: "ans1"
    },
    {
        question: "Q4: Milk is a complete food because it contains ___.",
        a: "Proteins",
        b: "  Fats",
        c: " All of these",
        d: "Vitamins and minerals",
        ans: "ans3"
    },
    {
        question: "Q5: Select the correct statement.",
        a: "Roughage present in vegetables and fruits must be discarded.",
        b: " Overcooking decreases the nutritive value of food.",
        c: "Preserved food has conditions suitable for growth of microbes.",
        d: "Growing children need more fats to build strong muscles.",
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