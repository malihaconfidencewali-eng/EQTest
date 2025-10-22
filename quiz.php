<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EQ Test - Quiz</title>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: white;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 700px;
        margin: 50px auto;
        background: rgba(255,255,255,0.1);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(255,255,255,0.3);
    }

    h1 {
        text-align: center;
        color: #f1c40f;
    }

    .question {
        margin-bottom: 20px;
        font-size: 18px;
        font-weight: 500;
        color: white;
    }

    label {
        display: block;
        background: rgba(255, 255, 255, 0.15);
        margin: 6px 0;
        padding: 10px;
        border-radius: 10px;
        transition: 0.3s;
        color: yellow;
        cursor: pointer;
    }

    input[type="radio"] {
        margin-right: 10px;
    }

    label:hover {
        background: rgba(255, 255, 0, 0.3);
    }

    button {
        display: block;
        margin: 20px auto;
        padding: 10px 25px;
        font-size: 18px;
        background: #f1c40f;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
        color: black;
    }

    button:hover {
        background: #ffd700;
        transform: scale(1.05);
    }
</style>
</head>
<body>

<div class="container">
    <h1>Emotional Intelligence Test</h1>
    <form id="eqForm">

        <div class="question">1. How do you react when someone criticizes you?</div>
        <label><input type="radio" name="q1" value="1">I get angry quickly</label>
        <label><input type="radio" name="q1" value="2">I feel bad but stay calm</label>
        <label><input type="radio" name="q1" value="3">I listen and try to improve</label>

        <div class="question">2. How well do you understand your own emotions?</div>
        <label><input type="radio" name="q2" value="1">Not very well</label>
        <label><input type="radio" name="q2" value="2">Sometimes</label>
        <label><input type="radio" name="q2" value="3">Very well</label>

        <div class="question">3. How do you act when a friend is sad?</div>
        <label><input type="radio" name="q3" value="1">I ignore it</label>
        <label><input type="radio" name="q3" value="2">I ask what happened</label>
        <label><input type="radio" name="q3" value="3">I comfort them and listen</label>

        <div class="question">4. How do you handle stress?</div>
        <label><input type="radio" name="q4" value="1">I panic</label>
        <label><input type="radio" name="q4" value="2">I try to stay calm</label>
        <label><input type="radio" name="q4" value="3">I take deep breaths and plan</label>

        <div class="question">5. How do you react when someone disagrees with you?</div>
        <label><input type="radio" name="q5" value="1">I argue</label>
        <label><input type="radio" name="q5" value="2">I explain my point calmly</label>
        <label><input type="radio" name="q5" value="3">I listen and respect their opinion</label>

        <div class="question">6. How often do you help others?</div>
        <label><input type="radio" name="q6" value="1">Rarely</label>
        <label><input type="radio" name="q6" value="2">Sometimes</label>
        <label><input type="radio" name="q6" value="3">Often</label>

        <div class="question">7. Do you think before speaking?</div>
        <label><input type="radio" name="q7" value="1">No</label>
        <label><input type="radio" name="q7" value="2">Sometimes</label>
        <label><input type="radio" name="q7" value="3">Always</label>

        <div class="question">8. How do you feel when you make a mistake?</div>
        <label><input type="radio" name="q8" value="1">I get upset</label>
        <label><input type="radio" name="q8" value="2">I feel bad but learn</label>
        <label><input type="radio" name="q8" value="3">I take it as a chance to improve</label>

        <div class="question">9. How do you handle others’ emotions?</div>
        <label><input type="radio" name="q9" value="1">I ignore them</label>
        <label><input type="radio" name="q9" value="2">I notice but don’t react</label>
        <label><input type="radio" name="q9" value="3">I understand and support them</label>

        <div class="question">10. How often do you stay calm in tough situations?</div>
        <label><input type="radio" name="q10" value="1">Rarely</label>
        <label><input type="radio" name="q10" value="2">Sometimes</label>
        <label><input type="radio" name="q10" value="3">Almost always</label>

        <button type="button" onclick="submitQuiz()">Submit Test</button>
    </form>
</div>

<script>
function submitQuiz() {
    let total = 0;
    for (let i = 1; i <= 10; i++) {
        const ans = document.querySelector(`input[name="q${i}"]:checked`);
        if (ans) total += parseInt(ans.value);
    }

    if (total === 0) {
        alert("Please answer all questions before submitting!");
        return;
    }

    // Save score in localStorage
    localStorage.setItem("eq_score", total);

    // Redirect safely using JS (not PHP)
    window.location.href = "result.php";
}
</script>
</body>
</html>
