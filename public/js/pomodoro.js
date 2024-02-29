//functions
function padWithZeros(number, totalLength = 2) {
    return number.toString().padStart(totalLength, "0");
}

const AddScore = async (user) => {
    await fetch(`http://127.0.0.1:8000/api/addScore/${user}`, { method: "GET" });
};

// variables
let workTitle = document.getElementById("work");
let breakTitle = document.getElementById("break");

let workTime = 25;
let breakTime = 5;

let seconds = 0;

// display
window.onload = () => {
    document.getElementById("minutes").innerHTML = padWithZeros(workTime);
    document.getElementById("seconds").innerHTML = padWithZeros(seconds);

    workTitle.classList.add("active");
};

// start timer
function start() {
    // change button
    document.getElementById("start").style.display = "none";
    document.getElementById("reset").style.display = "block";

    // change the time
    seconds = 59;

    let workMinutes = workTime - 1;
    let breakMinutes = breakTime - 1;

    let breakCount = 0;

    // countdown
    let timerFunction = () => {
        //change the display
        document.getElementById("minutes").innerHTML = workMinutes;
        document.getElementById("seconds").innerHTML = seconds;

        // start
        seconds = seconds - 1;

        if (seconds === 0) {
            workMinutes = workMinutes - 1;
            if (workMinutes === -1) {
                if (breakCount % 2 === 0) {
                    // start break
                    workMinutes = breakMinutes;
                    breakCount++;

                    // change the panel
                    workTitle.classList.remove("active");
                    breakTitle.classList.add("active");
                } else {
                    // continue work
                    workMinutes = workTime;
                    breakCount++;
                    AddScore();
                    // change the panel
                    breakTitle.classList.remove("active");
                    workTitle.classList.add("active");
                }
            }
            seconds = 59;
        }
    };

    // start countdown
    setInterval(timerFunction, 1000); // 1000 = 1s
}
