const backBtn = document.getElementById('backBtn');
const nextBtn = document.getElementById('nextBtn');
const skipBtn = document.getElementById('skipBtn');
const totalQuestions = document.getElementsByClassName('box').length;

let currentQuestion = 1;

backBtn.addEventListener('click', goBack);
nextBtn.addEventListener('click', goNext);
skipBtn.addEventListener('click', skipQuestion);

updateRecord();

function goBack() {
	if (currentQuestion > 1) {
		currentQuestion--;
		updateRecord();
	
    }

    function goNext() {
    if (currentQuestion < totalQuestions) {
    currentQuestion++;
    updateRecord();
    }
    }
    
    function skipQuestion() {
    currentQuestion++;
    updateRecord();
    }
    
    function updateRecord() {
    // Update record of answered and unanswered questions
    const answeredQuestions = document.querySelectorAll('input[name^="q"]:checked').length;
    const unansweredQuestions = totalQuestions - answeredQuestions;
    document.querySelector('.answered').textContent = answeredQuestions;
    document.querySelector('.unanswered').textContent = unansweredQuestions;
    // Enable/disable back and next buttons
if (currentQuestion === 1) {
	backBtn.disabled = true;
} else {
	backBtn.disabled = false;
}

if (currentQuestion === totalQuestions) {
	nextBtn.disabled = true;
} else {
	nextBtn.disabled = false;
}

// Update question number
const boxElements = document.getElementsByClassName('box');
for (let i = 0; i < boxElements.length; i++) {
	if (i === currentQuestion - 1) {
		boxElements[i].classList.add('active');
	} else {
		boxElements[i].classList.remove('active');
	}
}
}

// Set initial active box
document.getElementsByClassName('box')[0].classList.add('active');
}
// Get all the question boxes
const boxes = document.querySelectorAll('.box');

// Add the question number to each box
for (let i = 0; i < boxes.length; i++) {
    const questionNumber = i + 1;
    const box = boxes[i];
    const boxNumber = document.createElement('span');
    boxNumber.textContent = questionNumber;
    boxNumber.classList.add('box-number');
    box.appendChild(boxNumber);
}