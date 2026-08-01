// =========================
// Love Quiz by ChatGPT ❤️
// =========================

const questions = [

{
question:"Mera favourite colour kya hai? 🎨",
options:["Black","Blue","White","Red"],
answer:1
},

{
question:"Hamari pehli mulaqat kahan hui thi? 💕",
options:["College","School","Instagram","Park"],
answer:2
},

{
question:"Main tumhe kis naam se bulata hoon? 🥰",
options:["Nihu ❤️","Baby","Jaan","Princess"],
answer:0
},

{
question:"Hamari favourite memory? 🌹",
options:["First Date","Long Call","First Selfie","Sabhi ❤️"],
answer:3
},

{
question:"Mera favourite food kya hai? 🍕",
options:["Pizza","Burger","Biryani","Dosa"],
answer:0
},

{
question:"Main tumhe sabse zyada kab miss karta hoon? 💌",
options:["Morning","Night","Har Waqt ❤️","Weekend"],
answer:2
},

{
question:"Main tumse kitna pyaar karta hoon? ❤️",
options:[
"Bahut Zyada",
"Infinity ♾️",
"Words se bhi zyada",
"Sabhi ❤️"
],
answer:3
},

{
question:"Agar ek wish mile to main kya maangunga? 🌍",
options:[
"Paisa",
"Car",
"Tumhara Saath Hamesha ❤️",
"Vacation"
],
answer:2
},

{
question:"Meri sabse badi khushi kya hai? 😊",
options:[
"Shopping",
"Tumhari Smile ❤️",
"Movie",
"Travel"
],
answer:1
},

{
question:"Kya tum hamesha meri rahogi? 💍",
options:[
"Yes Forever ❤️",
"Always",
"100%",
"Bilkul Haan 🥰"
],
answer:0
}

];

let current = 0;
let score = 0;
let selected = -1;

// Elements

const welcome = document.getElementById("welcome");
const quiz = document.getElementById("quiz");
const result = document.getElementById("result");
const surprise = document.getElementById("surprise");

const question = document.getElementById("question");
const options = document.getElementById("options");
const questionNo = document.getElementById("questionNo");
const progressBar = document.getElementById("progressBar");
const scoreText = document.getElementById("scoreText");

const music = document.getElementById("bgMusic");

// Start Quiz
function startQuiz() {

    welcome.classList.remove("active");
    quiz.classList.add("active");

    music.volume = 0.5;

    music.currentTime = 0;

    music.play().then(() => {
        console.log("Music Started");
    }).catch((err) => {
        console.log("Music Error:", err);
    });

    loadQuestion();
}

// Load Question

function loadQuestion(){

selected=-1;

let q=questions[current];

question.innerHTML=q.question;

questionNo.innerHTML=
`Question ${current+1} / ${questions.length}`;

progressBar.style.width=
((current+1)/questions.length)*100+"%";

options.innerHTML="";

q.options.forEach((opt,index)=>{

let div=document.createElement("div");

div.className="option";

div.innerHTML=opt;

div.onclick=()=>selectOption(div,index);

options.appendChild(div);

});

}

// Select

function selectOption(element,index){

document.querySelectorAll(".option").forEach(o=>{
o.classList.remove("selected");
});

element.classList.add("selected");

selected=index;

createHearts(8);

}

// Next

function nextQuestion(){

if(selected==-1){

alert("Please select an answer ❤️");

return;

}

if(selected===questions[current].answer){

score++;

createHearts(20);

}

current++;

if(current<questions.length){

loadQuestion();

}else{

showResult();

}

}

// Result

function showResult(){

quiz.classList.remove("active");

result.classList.add("active");

scoreText.innerHTML=
`💖 You scored ${score} / ${questions.length}`;

createHearts(40);

}

// Surprise

function showSurprise(){

result.classList.remove("active");

surprise.classList.add("active");

createHearts(120);

}

// Restart

function restartQuiz(){

current=0;

score=0;

selected=-1;

surprise.classList.remove("active");

welcome.classList.add("active");

}

// Floating Hearts

function createHearts(total){

for(let i=0;i<total;i++){

let heart=document.createElement("div");

heart.className="heart";

heart.innerHTML=["❤️","💖","💕","💗","💘"]
[Math.floor(Math.random()*5)];

heart.style.left=Math.random()*100+"%";

heart.style.animationDuration=
(3+Math.random()*4)+"s";

heart.style.fontSize=
(18+Math.random()*22)+"px";

document.querySelector(".hearts")
.appendChild(heart);

setTimeout(()=>{

heart.remove();

},7000);

}

}

// Automatic Background Hearts

setInterval(()=>{

createHearts(2);

},1200);
