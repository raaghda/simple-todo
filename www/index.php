<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My to do list</title>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        
        <link rel="stylesheet" href="style.css">
        <script src= "script.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <nav>
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo"><i class="large material-icons">done_all</i>2Do list</a>
            </div>
        </nav>
        <div class="head-container task-container">
            Enter new task
            <div class="row">
                <form class="col s12" action="addtodo.php" method="POST">
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="input_text" required type="text" name="todotext" data-length="60" maxlength="60">
                            <label for="input_text">Ex. pick up christmas gifts</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <input id="input_name" required type="text" name="createdby" maxlength="30">
                            <label for="input_name">Added by: ex. John Doe</label>
                        </div>
                    </div>
                    <div class="row">
                        <input type="checkbox" class="filled-in" name="prioritise" id="filled-in-box" />
                        <label for="filled-in-box">Prioritise</label>

                        <button class="right btn waves-effect waves-light" type="submit" name="action">Save
                        <i class="material-icons right">done_all</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="empty-container">
            <h5>Current todos:</h5>
            
            <!-- Switch -->
            <div class="switch">
                <label>
                    All
                    <input id="priorityCheck" <?php if(isset($_GET['p'])){ echo 'checked="checked"';} ?> type="checkbox">
                    <span class="lever"></span>
                    Priority
                </label>
            </div>
        </div>
        <?php 
            //Imports and displays tasks from database
            $completed = 0;
            require 'fetch_todos.php';
        ?>    
        <div class="empty-container">
            <h5>Completed todos:</h5>
        </div>
        <?php 
            //Imports and displays tasks from database
            $completed = 1;
            require 'fetch_todos.php';
            require 'footer.php';
        ?> 
    </body>
      <?php if(isset($_GET['success'])){ ?>
        <script>Materialize.toast('A new todo has been added!', 4000)</script>
        <?php } ?>
    
    <?php if(isset($_GET['missingtitle'])){ ?>
        <script>Materialize.toast('You must specify a title.', 4000)</script>
        <?php } ?>
    
    <?php if(isset($_GET['missingauthor'])){ ?>
        <script>Materialize.toast('You must specify an author.', 4000)</script>
        <?php } ?>
    
    <?php if(isset($_GET['duplicatetitle'])){ ?>
        <script>Materialize.toast('Title cannot be duplicate.', 4000)</script>
        <?php } ?>
    
    <?php if(isset($_GET['edited'])){ ?>
        <script>Materialize.toast('Task has been updated.', 4000)</script>
        <?php } ?>

</html> 
