<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="text-center">Questions</h1>
            <?php
            $user_id = null;
            include("./common/db.php");

            if (isset($_GET['category_id'])) { /* agar hamarey category id hamarye question_id ki saath match na kare to phir bus empty result aye ga. yeah $result = $stmt->get_result(); empty ho ga jis ki wajah sya loop nai chalye or kuch bhi show nai ho ga */
                $category_id = $_GET['category_id'];
                $stmt = $conn->prepare("SELECT * FROM questions WHERE category_id = ?");
                $stmt->bind_param("i", $category_id);
            } else if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                $stmt = $conn->prepare("SELECT * FROM questions WHERE user_id = ? "); /* agar user_id aye url me to us user ki questions lao */
                $stmt->bind_param("i", $user_id);
            } else if (isset($_GET['latest'])) {
                $stmt = $conn->prepare("SELECT * FROM questions ORDER BY id DESC");
            } else if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $searchQuestion = "%$search%";
                $stmt = $conn->prepare("SELECT * FROM questions WHERE title LIKE ?");
                $stmt->bind_param("s", $searchQuestion);
            } else {
                $stmt = $conn->prepare("SELECT * FROM questions");
            }


            $stmt->execute();
            $result = $stmt->get_result();

            foreach ($result as $row) {
                $title = $row['title'];
                $id = $row['id'];

                echo "
                        <div class='row question-list border p-3 mb-2 '>
                            <div class='d-flex justify-content-between align-items-center'>
                                <h5 class='m-0'>
                                    <a class='text-decoration-none' href='?question_id=$id'>
                                        $title
                                    </a>
                                </h5>
                                ".($user_id ? "
                                    <a 
                                        href='./server/requests.php?delete=$id'
                                        class='btn btn-danger btn-sm text-white'
                                    >
                                        DELETE
                                    </a>
                                " : "")."
                            </div>
                        </div>
                    ";
            }

            ?>
        </div>
        <div class="col-4">
            <?php
            include("categorylist.php");
            ?>
        </div>
    </div>
</div>