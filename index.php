<?php
// index.php
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>EQ Test — Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    /* Internal CSS - stylish and professional */
    :root{
      --bg:#0f1724; --card:#0b1220; --accent:#7dd3fc; --muted:#94a3b8;
      --glass: rgba(255,255,255,0.04);
      font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    *{box-sizing:border-box}
    body{
      margin:0; min-height:100vh; background:linear-gradient(180deg,#071029 0%, #071724 60%);
      color:#e6eef6; display:flex; align-items:center; justify-content:center; padding:24px;
    }
    .container{width:100%; max-width:980px; background:var(--card); padding:28px; border-radius:14px; box-shadow:0 10px 30px rgba(2,6,23,0.6); border:1px solid rgba(255,255,255,0.03)}
    header{display:flex; gap:18px; align-items:center}
    .logo{width:64px;height:64px;border-radius:12px;background:linear-gradient(135deg,var(--accent),#60a5fa);display:flex;align-items:center;justify-content:center;font-weight:700;color:#042032;font-size:20px}
    h1{margin:0;font-size:28px}
    p.lead{color:var(--muted); margin-top:8px}
    .actions{margin-top:22px; display:flex; gap:12px; flex-wrap:wrap}
    .btn{
      appearance:none; border:0; padding:12px 18px; border-radius:10px; cursor:pointer;
      font-weight:600; transition:transform .12s ease, box-shadow .12s ease;
    }
    .btn-start{background:linear-gradient(90deg,#06b6d4,#3b82f6); color:#042032; box-shadow:0 8px 20px rgba(59,130,246,0.18)}
    .btn-ghost{background:transparent; color:var(--accent); border:1px solid rgba(125,211,252,0.12)}
    .btn:active{transform:translateY(1px)}
    .feature-grid{display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:12px; margin-top:20px}
    .card{background:var(--glass); padding:14px; border-radius:10px; border:1px solid rgba(255,255,255,0.02)}
    footer{margin-top:18px;color:var(--muted); font-size:13px}
    @media (max-width:520px){ h1{font-size:22px} .logo{width:52px;height:52px} }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div class="logo">EQ</div>
      <div>
        <h1>Emotional Intelligence Test</h1>
        <p class="lead">Understand your emotional strengths and areas to grow. 12 quick questions — takes ~5 minutes.</p>
      </div>
    </header>

    <div class="actions">
      <button class="btn btn-start" id="startBtn">Start Test</button>
      <button class="btn btn-ghost" id="learnBtn">Learn about EQ</button>
    </div>

    <div class="feature-grid">
      <div class="card">
        <strong>What it assesses</strong>
        <p class="lead" style="margin:8px 0 0 0">Self-awareness, empathy, emotional regulation — practical feedback and tips.</p>
      </div>
      <div class="card">
        <strong>Instant results</strong>
        <p class="lead" style="margin:8px 0 0 0">You’ll get a score, a summary, and suggestions to improve.</p>
      </div>
      <div class="card">
        <strong>Private & Lightweight</strong>
        <p class="lead" style="margin:8px 0 0 0">No login required. Results stored optionally for review.</p>
      </div>
    </div>

    <footer>
      <small>Designed by you • Fully PHP-based clone • Responsive layout</small>
    </footer>
  </div>

<script>
  document.getElementById('startBtn').addEventListener('click', function(){
    // JS redirection as requested (no PHP header redirect)
    window.location.href = 'quiz.php';
  });

  document.getElementById('learnBtn').addEventListener('click', function(){
    alert('Emotional intelligence (EQ) is the ability to understand and manage your emotions and the emotions of others. This mini-test helps you find practical strengths and growth areas.');
  });
</script>
</body>
</html>
