let currentCategory;
let currentQuestion = 0;
let score = 0;
let timer;

const quizCategories = {
  aiml: [
    {
                    question: "What is the primary goal of supervised learning in machine learning?",
                    options: ["Clustering data", "Making predictions or classifications based on labeled data", "Discovering hidden patterns in data", "Training a model without any guidance"],
                    correctAnswer: "Making predictions or classifications based on labeled data"
                },
                {
                    question: "Which algorithm is commonly used for regression tasks in machine learning?",
                    options: ["k-Nearest Neighbors (k-NN)", "Support Vector Machine (SVM)", "Decision Tree", "Linear Regression"],
                    correctAnswer: "Linear Regression"
                },
                {
                    question: "In unsupervised learning, what is the main objective of clustering algorithms?",
                    options: ["Predicting labels for input data", "Dividing data into distinct groups based on similarity", "Training a model with labeled data", "Generating new data points"],
                    correctAnswer: "Dividing data into distinct groups based on similarity"
                },
                {
                    question: "Which machine learning task is associated with making predictions on continuous numerical values?",
                    options: ["Classification", "Clustering", "Regression", "Dimensionality Reduction"],
                    correctAnswer: "Regression"
                },
                {
                    question: "What is the Turing Test used for in the field of AI?",
                    options: ["Evaluating the speed of AI algorithms", "Assessing the natural language processing capabilities of AI systems", "Testing the ability of AI to play games", "Determining if a machine can exhibit intelligent behavior indistinguishable from that of a human"],
                    correctAnswer: "Determining if a machine can exhibit intelligent behavior indistinguishable from that of a human"
                }
  ],
  general: [
      { question: "Who wrote the play Romeo and Juliet?",
      options:["William Shakespeare","Jane Austen","Charles Dickens","Mark Twain"],
      correctAnswer:"William Shakespeare" },
      
      { question: "Which country is known as the Land of the Rising Sun?",
      options:["China","Japan","South Korea","Thailand" ],
      correctAnswer:"Japan" },
    
      { question: "Who painted the famous artwork Mona Lisa?",
      options:["Vincent van Gogh","Leonardo da Vinci","Pablo Picasso","Michelangelo"],
      correctAnswer:"Leonardo da Vinci" },
    
      { question: " Who was the first President of the United States?",
      options:[" Thomas Jefferson"," John Adams","George Washington","Abraham Lincoln"],
      correctAnswer:"George Washington" },
      
      { question: "What is the largest desert in the world by area?",
      options:["Sahara Desert","Arabian Desert"," Gobi Desert","Antarctic Desert"],
      correctAnswer:"Antarctic Desert" }
    
  ],
  dsa: [
    { question: "",
    options:[],
    correctAnswer:"" },
  
    { question: "",
    options:[],
    correctAnswer:"" },
  
    { question: "",
    options:[],
    correctAnswer:"" },
  
    { question: "",
    options:[],
    correctAnswer:"" },
  
    { question: "",
    options:[],
    correctAnswer:"" }
  
  ],
};

function startQuiz(category) {
  currentCategory = category;
  currentQuestion = 0;
  score = 0;
  showQuiz();
  showNextQuestion();
  startTimer();
}

function showQuiz() {
  document.getElementById('category-selection').style.display = 'none';
  document.getElementById('quiz').style.display = 'block';
}

function showNextQuestion() {
  const questionContainer = document.getElementById('question-container');
  const optionsContainer = document.getElementById('options-container');
  const currentQuestionData = quizCategories[currentCategory][currentQuestion];

  questionContainer.innerHTML = currentQuestionData.question;

  optionsContainer.innerHTML = '';
  currentQuestionData.options.forEach((option, index) => {
    const button = document.createElement('button');
    button.innerText = option;
    button.onclick = () => checkAnswer(index);
    optionsContainer.appendChild(button);
  });
}

function checkAnswer(selectedIndex) {
  const currentQuestionData = quizCategories[currentCategory][currentQuestion];

  if (
    currentQuestionData.options[selectedIndex] ===
    currentQuestionData.correctAnswer
  ) {
    score++;
  }

  currentQuestion++;

  if (currentQuestion < quizCategories[currentCategory].length) {
    showNextQuestion();
  } else {
    endQuiz();
  }
}

function endQuiz() {
  clearInterval(timer);
  document.getElementById('quiz').style.display = 'none';
  document.getElementById('result').style.display = 'block';

  const resultText = document.getElementById('result-text');
  resultText.innerText = 'Quiz Ended';

  const scoreText = document.getElementById('score');
  scoreText.innerText = `Your Score: ${score} out of ${quizCategories[currentCategory].length}`;
}

function restartQuiz() {
  document.getElementById('category-selection').style.display = 'block';
  document.getElementById('result').style.display = 'none';
}

function startTimer() {
  let timeRemaining = 60;
  timer = setInterval(() => {
    timeRemaining--;
    document.getElementById('time').innerText = timeRemaining;

    if (timeRemaining <= 0) {
      endQuiz();
    }
  }, 1000);
}

