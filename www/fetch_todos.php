<?php
require 'database.php';
$priorityQuery = "";
if(isset($_GET['p'])) {
    $priorityQuery = "WHERE priority='1'";
}
$fetch_todos = $pdo->prepare
    ("SELECT title, createdby, completed, priority, todoid FROM todos $priorityQuery
        ORDER by todoid DESC"    );
$fetch_todos->execute();
$tasks = $fetch_todos->fetchAll(PDO::FETCH_ASSOC);


//Loop for showing each unfinished todo
foreach ($tasks as $task){ ?>

<div class="task-container">
    <div class="row">
        <?php if ($task["priority"]==1){ echo '<i title="Prioritised" class="priority-mark material-icons">priority_high</i>';} ?>   
        
        <div class="col s9">
            <div class="checkbox">                
                <input type="checkbox" <?php if ($task["completed"]==1){ echo 'checked="checked"';} ?> name="completed" id="<?php echo($task["todoid"]); ?>" />
                <label class="strikethrough" for="<?php echo($task["todoid"]); ?>"><?php echo($task["title"]); ?></label>
                
            </div>
         </div>
        <div class="col s3">
            <!-- Dropdown Trigger -->
            <a class='dropdown-button btn-flat' data-hover="true" href='#' data-activates='dropdown1'><i class="small material-icons">more_vert</i></a>
            <!-- Dropdown Structure -->
           <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">edit</a></li>
            <li><a href="#!">prioritise</a></li>
            <li class="divider"></li>
            <li><a href="#!">delete</a></li>
          </ul>
        </div> 
    </div>
    
    <div class="row">
        <div class="col s12 createdby">
            <i class="tiny material-icons">person</i>

            <?php echo($task["createdby"]); ?>
        </div>
    </div>


    

</div>

<?php } ?>