<select class="form-select" name="category" id="category">
    <option value="">Select A Category</option>
    <?php
        include("./common/db.php");
        
        $stmt = $conn->prepare("SELECT * FROM category");
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        foreach($result as $row){
            $name = ucfirst($row['name']);
            $id= $row['id'];

            echo "<option value='$id'>$name</option>";

        }
        
        
        ?>
</select>