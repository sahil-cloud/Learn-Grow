const quizDB = [
    {
        question: "Q1:  GDP deflator?",
        a: "Evaluates inflation by utilizing present production basket",
        b: "Shows real GDP growth on the basis of current production",
        c: " The GDP deflator is in real terms while the CPI is in nominal terms",
        d: " None of the above",
        ans: "ans1"
    },
    {
        question: "Q2:  An increase in aggregate demand results in",
        a: " The cost to increase in the long term",
        b: " GDP to increase in the long term",
        c: " The cost to increase in the short run",
        d: "GDP to increase in the short term",
        ans: "ans4"
    },
    {
        question: "Q3: The financial year in India is",
        a: "April 1 to March 31",
        b: "January 1 to December 31",
        c: "March 1 to April 30",
        d: " March 16 to March 15",
        ans: "ans1"
    },
    {
        question: "Q4: The net value of GDP after deducting depreciation from GDP is",
        a: " Net national product",
        b: "  Net domestic product",
        c: " Gross national product",
        d: " Disposable income",
        ans: "ans2"
    },
    {
        question: "Q5:  The average income of the country is",
        a: "Per capita income",
        b: " Disposable income",
        c: " Inflation rate",
        d: "Real national income",
        ans: "ans1"
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