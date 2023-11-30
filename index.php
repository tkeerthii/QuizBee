<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
		font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      position: relative;
    }

    #logout-button {
      position: absolute;
      top: 10px;
      right: 10px;
      padding: 10px 20px;
      background-color: #3498db;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }

    #logout-button:hover {
      background-color: #2980b9;
    }

    img {
      width: 100%;
      height: auto;
      display: block;
    }

    .quiz-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
      background-color: black; 
      padding: 20px;
      border-radius: 10px;
    }
    
  </style>
  <title>Quiz Website</title>
</head>
<body>
    <a href="logout.php" id="logout-button">Logout</a>
    <img src="bg.jpeg" alt="Background" width="200%" height="100%">
	
  <div class="quiz-container" id="quiz-container">
  
    
    <h1 id="quiz-title">Quiz Website</h1>
    
    <div id="category-selection">
      <p>Select a category:</p>
      <button onclick="startQuiz('aiml')">AIML</button>
      <button onclick="startQuiz('general')">General Knowledge</button>
      <button onclick="startQuiz('dsa')">DSA</button>
    </div>
    <div id="quiz" style="display: none;">
      <div id="question-container">
        <p id="question-text"></p>
      </div>
      <div id="options-container"></div>
      <button id="next-button" onclick="nextQuestion()">Next</button>
      <p id="timer">Time Remaining: <span id="time">60</span> seconds</p>
    </div>
    <div id="result" style="display: none;">
      <p id="result-text"></p>
      <p id="score"></p>
      <button onclick="restartQuiz()">Restart</button>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>


