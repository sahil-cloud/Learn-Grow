const quizDB = [
    {
        question: "Q1:  T What option does the central government does not include in development expenditure?",
        a: "Grant to States",
        b: "Expenditure on Social and Community Services",
        c: "Expenditure on Economic Services",
        d: "Defence Expenditure",
        ans: "ans4"
    },
    {
        question: "Q2:  On July 12, 1982, The ARDC collaborated with",
        a: " NABARD",
        b: " EXIM Bank",
        c: "RBI",
        d: "None of the above",
        ans: "ans1"
    },
    {
        question: "Q3: If RBI reduces the cash reserve ratio, the credit creation will",
        a: "No impact",
        b: "Decrease",
        c: "Increase",
        d: "None of the above",
        ans: "ans3"
    },
    {
        question: "Q4: The state financial corporation in the State bank of India gives assistance especially to",
        a: "Medium and Small-scale Industries",
        b: "Large-scale Industries",
        c: " Cottage Industry",
        d: "Agricultural Farms",
        ans: "ans1"
    },
    {
        question: "Q5:    The first complete Indian Bank was established in the year.",
        a: "1794",
        b: "1894",
        c: "1896",
        d: "1902",
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