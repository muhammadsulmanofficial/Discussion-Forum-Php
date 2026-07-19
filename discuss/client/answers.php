<div class="container">
    <div class="offset-sm-1">
    <h5>Answers : </h5>
    <?php
    
    $stmt = $conn->prepare("SELECT * FROM answers WHERE question_id = ?");
    $stmt->bind_param("i", $question_id);
    $stmt->execute();

    $result = $stmt->get_result();

    foreach($result as $row){
        $answer = $row['answer'];

        echo "<div class='row'>
                <p class='answer-wrapper'>$answer</p>
             </div>";
    }   

    ?>
    </div>
</div>