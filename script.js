let txt="Niharika ❤️ You Are My Everything...";
let i=0;

function type(){
    if(i<txt.length){
        document.getElementById("typing").innerHTML+=txt.charAt(i);
        i++;
        setTimeout(type,100);
    }
}
type();
function createHeart(){

const h=document.createElement("div");

h.innerHTML="💖";

h.style.position="fixed";
h.style.left=Math.random()*100+"vw";
h.style.top="-20px";
h.style.fontSize=(20+Math.random()*30)+"px";

document.body.appendChild(h);

let y=0;

let fall=setInterval(function(){

y+=5;

h.style.top=y+"px";

if(y>window.innerHeight){
clearInterval(fall);
h.remove();
}

},30);

}

setInterval(createHeart,200);
<h3 id="counter"></h3>
let love=0;

setInterval(function(){

love++;

document.getElementById("counter").innerHTML=
"❤️ Love Meter : "+love+"%";

if(love==100) love=0;

},100);
function showLove(){

document.getElementById("text").innerHTML = `
<h2 style="color:#ffeb3b;">💖 Happy Girlfriend Day, Niharika! 💖</h2>

<p>
Niharika ❤️<br><br>

Happy Girlfriend Day! 🌹<br><br>

Thank you meri life me aane ke liye aur har din ko itna special banane ke liye. 💕<br><br>

Tumhari smile meri sabse favorite cheez hai, aur tumhari khushi mere liye bahut important hai. 😊<br><br>

Main dua karta hoon ki tum hamesha khush raho aur tumhare saare sapne poore hon. ✨<br><br>

❤️ Happy Girlfriend Day! ❤️<br>
🌹 With Love 🌹
</p>
`;
}
function closePopup(){
document.getElementById("popup").style.display="none";
}
function finalLove(){

alert("🌹 Happy Girlfriend Day Niharika ❤️\n\nThank you for being such an important part of my life. Wishing you lots of happiness and smiles! 💖");

}
function closePopup(){
    document.getElementById("popup").style.display = "none";
}
function closePopup() {
    const popup = document.getElementById("popup");
    popup.style.display = "none";
}
function openPopup(){
    document.getElementById("popup").style.display = "flex";
}

function closePopup(){
    document.getElementById("popup").style.display = "none";
}
function openPopup(){
    document.getElementById("popup").style.display="flex";
}

function closePopup(){
    document.getElementById("popup").style.display="none";
}