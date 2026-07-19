<div class="container">
    <h1 class="text-center">Question</h1>
    <div class="row">
        <div class="col-8">
            <?php
            include("./common/db.php");

            $stmt = $conn->prepare("SELECT * FROM questions WHERE id = ?");
            $stmt->bind_param("i", $question_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_assoc();
            $category_id = $row['category_id'];

            echo "<h5 class='margin-bottom-15 question-title'>Question : " . $row['title'] . "</h5>";
            echo "<p class='margin-bottom-15'>" . $row['description'] . "</p>";

            include("./client/answers.php");
            ?>
            <form action="./server/requests.php" method="post">
                <input type="hidden" name="question_id" value="<?php echo $question_id ?>">
                <textarea class="form-control margin-bottom-15" name="answer" id="textarea" placeholder="Your answer..."></textarea>
                <button class="btn btn-primary">Write your answer</button>
            </form>
        </div>
        <div class="col-4">
            <?php

            $nameCategoryStmt = $conn->prepare("SELECT name FROM category WHERE id = ?");
            $nameCategoryStmt->bind_param("i", $category_id); 
            $nameCategoryStmt->execute();           
            $result = $nameCategoryStmt->get_result();
            $categoryRow = $result->fetch_assoc();
            
            $categoryName = ucfirst($categoryRow['name']);

            echo "<h1>".$categoryName."</h1>";

            // echo $category_id;
            $relatedStmt = $conn->prepare("SELECT * FROM questions WHERE category_id = ? AND id != ? "); /* yeah queries sirf us question ko la rahi ha jo hamari category_id say match karrahey hein or hum ne likha ha ki lekin hamara current question na ho is may */
            /* id != $question_id means “jis id ka question open hai usko exclude kar do” */
            $relatedStmt->bind_param("ii", $category_id, $question_id);
            $relatedStmt->execute();

            $result = $relatedStmt->get_result();


            foreach ($result as $row) {
                $id = $row['id'];
                $title = $row['title'];

                echo "<div>
                        <h5 class='question-list'><a href='?question_id=$id'>$title</a></h5>
                     </div>";
            }


            ?>
        </div>
    </div>
</div>