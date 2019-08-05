<?php include 'connection.php'; ?>
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
            <h4>Insertion of Data in the Database</h4>
            <form method="post">
                <div class="form-group">
                    <input type="text" id="author_name" name="author_name" class="form-control"
                        placeholder="Enter Author Name..">
                    <div class="author-name-error error"></div>
                </div><!--form-group -->
                <div class="form-group">
                    <input type="text" id="paper_type" name="paper_type" class="form-control"
                        placeholder="Enter Paper Type..">
                    <div class="paper-type-error error"></div>
                </div><!--form-group -->
                <div class="form-group">
                    <input type="text" id="journal_name" name="journal_name" class="form-control"
                        placeholder="Enter Journal Name..">
                    <div class="journal-name-error error"></div>
                </div><!--form-group -->
                <div class="form-group">
                    <input type="number" id="volume" name="volume" class="form-control"
                        placeholder="Enter Volume..">
                    <div class="volume-error error"></div>
                </div><!--form-group -->
                <div class="form-group">
                    <input type="number" id="year" name="year" class="form-control"
                        placeholder="Enter Year..">
                    <div class="year-error error"></div>
                </div><!--form-group -->
                <div class="form-group">
                    <input type="submit" name="insert" class="btn btn-success
                    btn-block form-btn" value="Submit">
                </div><!--form-group -->
            </form><!--form -->
            <h4>Display of Data in the Database</h4>
            <table class="table table-bordered">
                <thead>
                    <th>Author Name</th>
                    <th>Journal Name</th>
                    <th>Paper Type</th>
                    <th>Volume</th>
                    <th>Year</th>
                    <th colspan="2">Actions</th>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * from paper1";
                        $query = $db->prepare($sql);
                        $query->execute();

                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if($query->rowCount()>0):
                            $count=0;
                            foreach ($results as $row) {
                                $count++;
                                $id = $row->id;
                                echo  "<tr>
                                            <td>$row->author</td>
                                            <td>$row->journal_name</td>
                                            <td>$row->paper_type</td>
                                            <td>$row->volume</td>
                                            <td>$row->year</td>
                                            <td><button class='btn btn-success'><a href='edit.php?id=$id'>Edit</a></button></td>
                                            <td><button class='btn btn-success'><a href='index.php?id=$id&&action=del'>Delete</a></button></td>
                                       </tr>";
                            }
                        endif;
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['insert'])):
         $author_name = $_POST['author_name'];
         $paper_type = $_POST['paper_type'];
         $journal_name = $_POST['journal_name'];
         $volume = $_POST['volume'];
         $year = $_POST['year'];
        $sql = "INSERT into paper1 (author, paper_type, journal_name, year, volume) values (?, ?, ?, ?, ?)";
        $query = $db->prepare($sql);
        if($query):
            echo "<h3>Data inserted successfully</h3>";
        else:
            echo "Something went wrong";
        endif;
        $query->execute([$author_name, $paper_type, $journal_name, $volume, $year]);
    endif;
 ?>
<?php
    if(isset($_GET['action']) && $_GET['action'] == 'del'):
        $rid = $_GET['id'];
        $sql = "DELETE from paper1 where id = ?";
        $query = $db->prepare($sql);
        $query->execute([$rid]);
        if($query):
            echo "Data Deleted Successfully!";
        else:
            echo "something went Wrong!";
        endif;
    endif;
 ?>
