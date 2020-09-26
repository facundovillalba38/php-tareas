<?php
include('Config/constants.php');
//include('Config/Autoload.php');
require_once("Models/Task.php");
require_once("Repositories/TaskRepository.php");

use Repositories\TaskRepository as TaskRepository;
use Models\Task as Task;


$taskRepo = new TaskRepository();
$taskList = $taskRepo->getAll();

?>


<?php include('header.php') ?>

<div class="dashboard uk-flex"> 

    <div class="box">

        <h2>Agregar tarea</h2>

        <form action="<?= ROOT_CLIENT."/process/addtasks.php" ?>" method="POST">
            <?php if(isset($_GET["ok"]))
                    echo '<p class="alert-success">Tarea Cargada correctamente</p>';
            ?>
            <div class="uk-margin">
                <label for="user">Título</label>
                <input type="text" name="title" class="uk-input"/>
            </div>

            <div class="uk-margin">
                <label for="">Fecha</label>
                <input type="date" name="date" class="uk-input"/>
            </div>

            <div class="uk-margin">
                <label for="">Descripción</label>
                <textarea name="description" class="uk-textarea"></textarea>
            </div>

            <div class="uk-margin">
                <label for="">Recordatorio</label>
                <select class="uk-select" name="reminder">
                    <option>5 min</option>
                    <option>10 min</option>
                    <option>30 min</option>
                    <option>1 hora</option>
                    <option>1 día</option>
                </select>
            </div>

            <button type="submit" class="uk-button uk-button-primary">Enviar</button>
        </form>
    </div>

    <div class="box uk-width-1-1">

        <h2 style="color:white">Tareas</h2>

        <div class="tasks uk-flex uk-flex-wrap">
            

            <?php foreach($taskList as $task) { ?> 
                <div class="card uk-width-1-3@m">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                    <span uk-icon="icon: comments"></span>
                                </div>
                                <div class="uk-width-expand">
                                    <h3 class="uk-card-title uk-margin-remove-bottom">
                                        <?php echo $task->getTitle(); ?>
                                    </h3>
                                    <p class="uk-text-meta uk-margin-remove-top">
                                        <time datetime="2016-04-01T19:00">
                                            <?php echo $task->getDate(); ?>
                                        </time>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <?php echo $task->getDescription(); ?>
                        </div>
                        <div class="uk-card-footer uk-flex uk-flex-between">
                            <div class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: clock" class="uk-margin-small-right"></span><?php echo $task->getReminder(); ?>
                            </div>
                            <div>
                                <form action="<?php echo ROOT_CLIENT ?>/process/removetask.php" method="GET">

                                    
                                <!-- OJO este input es importante -->

                                    <input type="hidden" value="<?php echo $task->getTitle()?>" name="title">
                                
                                    <!-- OJO este input es importante -->

                                
                                    <button type="submit" class="uk-button uk-button-danger uk-button-small">
                                        <span uk-icon="icon: trash"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>          
        
        </div>

    </div>
    
</div>

<?php include('footer.php') ?>