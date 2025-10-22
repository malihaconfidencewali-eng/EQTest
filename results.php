<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EQ Test - Results</title>

<style>
    body {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        font-family: 'Poppins', sans-serif;
        color: white;
        text-align: center;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 100px auto;
        background: rgba(255, 255, 255, 0.1);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
    }

    h1 {
        color: #f1c40f;
        font-size: 32px;
    }

    .score {
        font-size: 24px;
        font-weight: bold;
        color: yellow;
        margin: 20px 0;
    }

    .feedback {
        font-size: 18px;
        line-height: 1.6;
        color: #f9f9f9;
        background: rgba(255, 255, 255, 0.15);
        padding: 15px;
        border-radius: 10px;
    }

    button {
        margin-top: 25px;
        padding: 10px 20px;
        font-size: 18px;
        background-color: #f1c40f;
        color: black;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background-color: #ffd700;
        transform: scale(1.05);
    }
</style>
</head>
<body>

<div class="container">
    <h1>Your EQ Test Result</h1>
    <div class="score" id="scoreDisplay"></div>
    <div class="feedback" id="feedback"></div>
    <button onclick="retakeTest()">Retake Test</button>
</div>

<script>
    const score = localStorage.getItem("eq_score");
    const scoreDisplay = document.getElementById("scoreDisplay");
    const feedback = document.getElementById("feedback");

    if (!score) {
        scoreDisplay.innerHTML = "No score found!";
        feedback.innerHTML = "Please complete the test first.";
    } else {
        scoreDisplay.innerHTML = `Your EQ Score: ${score} / 30`;

        let message = "";
        if (score >= 25) {
            message = "🌟 Excellent Emotional Intelligence!<br>You understand emotions and handle stress calmly.";
        } else if (score >= 18) {
            message = "🙂 Good EQ level!<br>You understand emotions but can still improve your control.";
        } else {
            message = "😕 Needs Improvement.<br>Try to stay calm and understand others’ feelings better.";
        }

        feedback.innerHTML = message;
    }

    function retakeTest() {
        localStorage.removeItem("eq_score");
        window.location.href = "quiz.php";
    }
</script>

</body>
</html>
