<?php include 'connection.php'; ?>
<?php
    if(isset($_POST['update'])):
        $rid = $_GET['id'];
        $author_name = $_POST['author_name'];
        $paper_type = $_POST['paper_type'];
        $journal_name = $_POST['journal_name'];
        $volume = $_POST['volume'];
        $year = $_POST['year'];
        $data = [$author_name, $paper_type, $journal_name, $volume, $year, $rid];

        $sql = "UPDATE paper1 set author = ?, paper_type = ?, journal_name = ?, volume = ?, year = ? where id = ?";
        $query = $db->prepare($sql);
        $query->execute($data);
        if($query):
            echo "Data updated successfully!";
        else:
            echo "Something went wrong!";
        endif;
    endif;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- stylesheet -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap scripts -->
    <script src="jquery.js" charset="utf-8"></script>
    <script src="bootstrap.js" charset="utf-8"></script>
    <script src="insert.js" charset="utf-8"></script>
    <script type="text/javascript">

    </script>
    <title>Basic CRUD</title>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <h4>Updation of Data in the Database</h4>
            <form method="post">
                <?php
                    $rid = $_GET['id'];
                    $sql = "SELECT * from paper1 where id = ?";
                    $query = $db->prepare($sql);
                    $query->execute([$rid]);

                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount()>0):
                        $count=0;
                        foreach ($results as $row) {
                            $count++;
                            // echo $row->author;

                 ?>
                <div class="form-group">
                    <label for="author_name">Author Name</label>
                    <input type="text" id="author_name" name="author_name" class="form-control"
                        placeholder="Enter Author Name.." value="<?php echo $row->author; ?>">
                    <div class="author-name-error error"></div>
                </div><!--form-group -->
                <div class="form-group">
                    <label for="author_name">Paper Type</label>
                    <input type="text" id="paper_type" name="paper_type" class="form-control"
                        placeholder="Enter Paper Type.." value="<?php echo $row->paper_type; ?>">
                    <div class="paper-type-error error"></div>
                </div><!--form-group -->
                <div class="form-group">
                    <label for="author_name">Journal Name</label>
                    <input type="text" id="journal_name" name="journal_name" class="form-control"
                        placeholder="Enter Journal Name.." value="<?php echo $row->journal_name; ?>">
                    <div class="journal-name-error error"></div>
                </div><!--form-group -->
                <div class="form-group">
                    <label for="author_name">Volume</label>
                    <input type="number" id="volume" name="volume" class="form-control"
                        placeholder="Enter Volume.."  value="<?php echo $row->volume; ?>">
                    <div class="volume-error error"></div>
                </div><!--form-group -->
                <div class="form-group">
                    <label for="author_name">Year</label>
                    <input type="number" id="year" name="year" class="form-control"
                        placeholder="Enter Year.."  value="<?php echo $row->year; ?>">
                    <div class="year-error error"></div>
                </div><!--form-group -->
            <?php }endif;
             ?>
                <div class="form-group">
                    <input type="submit" name="update" class="btn btn-success
                    btn-block form-btn" value="Update">
                </div><!--form-group -->
            </form><!--form -->

        </div>
    </div>
</body>
</html>
