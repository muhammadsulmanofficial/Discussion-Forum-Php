<div>
    <h1 class="text-center">Categories</h1>
    <?php
    include("./common/db.php");

    $stmt = $conn->prepare("SELECT * FROM category");
    $stmt->execute();

    $result = $stmt->get_result();

    foreach($result as $row){
        $name = ucfirst($row['name']);
        $id = $row['id'];

        echo "<div class='row question-list'>
                    <h5><a href='?category_id=$id'>$name</a></h5>
             </div>";
    }

    ?>
</div>