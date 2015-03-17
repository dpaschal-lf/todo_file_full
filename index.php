<?php require_once( 'includes/functions.php');?>
<!doctype html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Todo List</title>

    <link rel="stylesheet" href="assets/external/bootstrap/css/bootstrap.min.css">
    <script src="assets/external/jquery.min.js"></script>
    <script src="assets/external/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/main.js"></script>
</head>

<body>

    <?php include( 'includes/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 todo-display-container">
                <button id="display_refresh" type="button" class="btn btn-default glyphicon glyphicon-refresh"></button>
                <div class="todo-list">
                    <p>My Todo items should be here</p>
                </div>
            </div>
            <div class="col-md-4">
                <div id="todo-add" class="panel panel-default">
                    <div class="panel-heading">Create New Todo</div>
                    <div class="panel-body">
                        <form>
                            <input class="form-control" type="text" name="title" placeholder="Task Title">
                            <input class="form-control" type="text" name="date" placeholder="Task Due">
                            <textarea class="form-control" name="details" placeholder="Task"></textarea>
                            <button type="button" id="save_task" class="btn btn-default glyphicon glyphicon-plus"></button>
                        </form>
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <?php include( 'includes/footer.php'); ?>
</body>

</html>