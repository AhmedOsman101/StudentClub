//functions
function padWithZeros(number, totalLength = 2) {
    return number.toString().padStart(totalLength, "0");
}

const AddScore = async (user) => {
    await fetch(`http://localhost:8000/api/addScore/${user}`, { method: "GET" });
};

// Function to hide the element
function hideElement(element) {
    element.classList.add("hidden")
}

// Function to unhide the element
function unhideElement(element) {
    element.classList.remove("hidden");
}

// variables
let workTitle = document.getElementById("work");
let breakTitle = document.getElementById("break");
let pauseBtn = document.getElementById("pause");
let resetBtn = document.getElementById("reset");
let resumeBtn = document.getElementById("resume");
let startBtn = document.getElementById("start");
let minutes = document.getElementById("minutes");
let secondsDisplay = document.getElementById("seconds");

let workTime = 1;
let breakTime = 1;

let seconds = 0;
let timerInterval;
let isPaused = false;
let isCompleted = false;

// display
window.onload = () => {
    minutes.innerHTML = padWithZeros(workTime);
    secondsDisplay.innerHTML = padWithZeros(seconds);
    hideElement(pauseBtn);
    hideElement(resumeBtn);
    hideElement(resetBtn);
    workTitle.classList.add("active");
};

// start timer
function start(userId) {
    // change button
    hideElement(resumeBtn);
    hideElement(startBtn);
    unhideElement(pauseBtn);
    unhideElement(resetBtn);

    // change the time
    seconds = 59;

    let workMinutes = workTime - 1;
    let breakMinutes = breakTime - 1;

    let breakCount = 0;

    // countdown
    const timerFunction = () => {
        if (!isPaused) {
            //change the display
            minutes.innerHTML = padWithZeros(workMinutes);
            secondsDisplay.innerHTML = padWithZeros(seconds);

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
                        AddScore(userId);
                        // change the panel
                        breakTitle.classList.remove("active");
                        workTitle.classList.add("active");
                        isCompleted = true;
                        reset();
                    }
                }
                seconds = 59;
            }
        }
    };

    // start countdown
    timerInterval = setInterval(timerFunction, 1000); // 1000 = 1s
}

// pause timer
function pause() {
    isPaused = true;
    hideElement(pauseBtn);
    unhideElement(resumeBtn)
}

// resume timer
function resume() {
    isPaused = false;
    hideElement(resumeBtn);
    unhideElement(pauseBtn);
}

// reset timer
function reset() {
    clearInterval(timerInterval);
    isPaused = false;
    isCompleted = false;

    // reset button display
    unhideElement(startBtn);
    hideElement(pauseBtn)
    hideElement(resumeBtn);
    hideElement(resetBtn);

    // reset time
    seconds = 0;

    // reset display
    minutes.innerHTML = padWithZeros(workTime);
    secondsDisplay.innerHTML = padWithZeros(seconds);

    // reset title
    workTitle.classList.add("active");
    breakTitle.classList.remove("active");
}
