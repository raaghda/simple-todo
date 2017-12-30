<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "todos";
$pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

/* Priority query is empty, if the get parameter is set, the priority is set as prioritised */
$priorityQuery = "";
if(isset($_GET['p'])) {
    $priorityQuery = "AND priority='1'";
}

/* Fetching todos through SQL query by descending order */
$fetch_todos = $pdo->prepare
    ("SELECT title, createdby, completed, priority, todoid FROM todos WHERE completed = $completed $priorityQuery
        ORDER by todoid DESC"    );
$fetch_todos->execute();
$tasks = $fetch_todos->fetchAll(PDO::FETCH_ASSOC);

$editTodoid = -1;
if(isset($_GET['todoid'])) {
    $editTodoid = intval($_GET['todoid']);
}

/*Loop for showing each unfinished todo */
foreach ($tasks as $task){ ?>

<div class="task-container" id="todo<?php echo($task["todoid"]); ?>">
    <div class="row">
        <?php if ($task["priority"]==1){ echo '<i title="Prioritised" class="priority-mark material-icons">priority_high</i>';} ?>   
        
        <div class="col s9">
            <?php if ($editTodoid == $task["todoid"]){ ?>
                <form class="col s12" action="edittitle.php" method="POST">
                        <div class="input-field">
                            <input id="input_text" value="<?php echo($task["title"]); ?>" required type="text" name="todotext" data-length="60" maxlength="60">
                            <label for="input_text">Ex. pick up christmas gifts</label>
                        </div>
                        <input name="todoid" type="hidden" value="<?php echo($task["todoid"]); ?>">
                        <button class="right btn waves-effect waves-light" type="submit" name="action">Save
                        <i class="material-icons right">done_all</i>
                        </button>
                </form>
            <?php } else { ?>
            <!-- Checkbox for completed/uncompleted todo -->
            <div class="checkbox">
                <input type="checkbox" <?php if ($task["completed"]==1){ echo 'checked="checked"';} ?> name="completed" id="<?php echo($task["todoid"]); ?>" />
                <label onClick="window.location.href = 'toggletodo.php?todoid=<?php echo($task["todoid"]); ?>&completed=<?php echo($task["completed"]); ?>'" class="strikethrough" for="<?php echo($task["todoid"]); ?>"><?php echo($task["title"]); ?></label>
            </div>
            <?php } ?>
         </div>
        <div class="col s3">
            <!-- Dropdown Trigger -->
            <a class='dropdown-button btn-flat' data-hover="true" href='#' data-activates='dropdown<?php echo($task["todoid"]); ?>'><i class="small material-icons">more_vert</i></a>
            <!-- Dropdown Structure -->
           <ul id='dropdown<?php echo($task["todoid"]); ?>' class='dropdown-content'>
            <li><a href="?todoid=<?php echo($task["todoid"]); ?>#todo<?php echo($task["todoid"]); ?>">edit</a></li>
            <li class="divider"></li>
            <li><a href="deletetodo.php?todoid=<?php echo($task["todoid"]); ?>">delete</a></li>
          </ul>
        </div> 
    </div>
    <!-- Author area -->
    <div class="row">
        <div class="col s12 createdby">
            <i class="tiny material-icons">person</i>

            <?php echo($task["createdby"]); ?>
        </div>
    </div>


    

</div>

<?php } ?>