<?php
// submit.php - expects JSON POST: { answers: [ {question_id:..., choice_id:...}, ... ] }
// returns JSON: { success:true, result_id: N }

header('Content-Type: application/json');
require_once 'db.php';

$input = json_decode(file_get_contents('php://input'), true);
if (!isset($input['answers']) || !is_array($input['answers'])) {
    echo json_encode(['success'=>false,'message'=>'Invalid input']);
    exit;
}

$answers = $input['answers'];

// Validate and compute total
$totalScore = 0;
$maxPerQuestion = 3;
$questionCount = 0;

$insertResponses = [];

try {
    // start transaction
    $pdo->beginTransaction();

    // We'll compute score: look up choice scores for provided choice ids
    $choiceStmt = $pdo->prepare("SELECT score, question_id FROM choices WHERE id = ?");
    foreach ($answers as $a) {
        if (!isset($a['question_id'])) continue;
        $questionCount++;
        if (empty($a['choice_id'])) {
            // unanswered -> score 0
            continue;
        }
        $choiceStmt->execute([$a['choice_id']]);
        $row = $choiceStmt->fetch();
        if ($row) {
            $totalScore += (int)$row['score'];
            $insertResponses[] = [
                'question_id' => $a['question_id'],
                'choice_id' => $a['choice_id']
            ];
        } else {
            // invalid choice id -> skip
        }
    }

    if ($questionCount === 0) {
        $pdo->rollBack();
        echo json_encode(['success'=>false,'message'=>'No questions provided']);
        exit;
    }

    $maxScore = $questionCount * $maxPerQuestion;
    $percent = $maxScore>0 ? round(($totalScore / $maxScore) * 100, 2) : 0;

    // determine summary and suggestions
    if ($percent >= 70) {
        $summary = 'High EQ';
        $detailed = 'You demonstrate strong emotional intelligence. Keep practicing self-reflection and help others build their EQ.';
    } elseif ($percent >= 40) {
        $summary = 'Moderate EQ';
        $detailed = 'You have a fair grasp of emotions and empathy. Focus on building awareness and regulation in stressful situations.';
    } else {
        $summary = 'Developing EQ';
        $detailed = 'You may benefit from practices like mindfulness, journaling, and active listening to improve emotional skills.';
    }

    // insert into results
    $ins = $pdo->prepare("INSERT INTO results (user_name, total_score, max_score, percent, summary, detailed) VALUES (?, ?, ?, ?, ?, ?)");
    $userName = null; // no login
    $ins->execute([$userName, $totalScore, $maxScore, $percent, $summary, $detailed]);
    $resultId = $pdo->lastInsertId();

    // insert each response
    $respIns = $pdo->prepare("INSERT INTO responses (result_id, question_id, choice_id) VALUES (?, ?, ?)");
    foreach ($insertResponses as $r) {
        $respIns->execute([$resultId, $r['question_id'], $r['choice_id']]);
    }

    $pdo->commit();

    echo json_encode(['success'=>true, 'result_id' => $resultId, 'score'=>$totalScore, 'max_score'=>$maxScore, 'percent'=>$percent]);
    exit;

} catch (Exception $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>'Server error: '.$e->getMessage()]);
    exit;
}
