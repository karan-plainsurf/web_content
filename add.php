<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Web Builder</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/custom.css">

    </head>
    <body>
        <div>
            <nav class="navbar navbar-inverse bgcolor">
                <h1 align="center" style="color: white">Web Builder</h1>

            </nav>
        </div>
        <div class="sidebar"><br><br><br><br>
            <a href="list.php"><i class="glyphicon glyphicon-list-alt"></i> List</a>
            <a href="backup.php"><i class="glyphicon glyphicon-hdd"></i> Backup</a>
        </div>
        <div class="container" style="padding-left: 100px">
            <a href="add.php" class="btn btn-primary glyphicon-plus">Add</a>
        </div>
        <div class="modal-body" style="padding-left: 170px"> <br>
            <form action="connector_form.php" method="POST">
                <div class="form-group">
                    <label>Title</label>
                    <input name="title"type="text" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label type="text">Add Content</label>
                    <textarea name="textarea" class="form-control" rows="3"  placeholder="Enter Content"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

    </body>
</html>