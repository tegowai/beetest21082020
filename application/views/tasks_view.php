<div class="container"><!--main container-->
    <div class="row">
        <div class="container col pagination"><!--pagination container-->
            <nav aria-label="Tasks pagination">
                <ul class="pagination ul-pag">
                    <?php
                    $root = '/' . core\Model::$rootSite . '/';
                    $fullSite = 'http://'.$_SERVER['SERVER_NAME'].$root."Tasks/";
                    //counted pages quantity (tasks from database/show block size)
                    $pages = models\ModelTasks::getPagesQuantity();
                    $status_first = $page == 1 ? 'disabled' : '';
                    $status_last = $page == $pages ? 'disabled' : '';
                    $previous_status = $page == 1 ? 'disabled' : '';
                    $previous_page = $page == 1 ? 1 : $page-1;
                    $next_status = $page == $pages ? 'disabled' : '';
                    $next_page = $page == $pages ? $pages : $page+1;
                    echo '
                        <li class="page-item '.$status_first.'">
                            <a class="page-link" href="'.$fullSite.'1">
                                Первая
                            </a>
                        </li>';
                    echo '
                        <li class="page-item '.$previous_status.'">
                            <a class="page-link" href="'.$fullSite.$previous_page.'" aria-label="Предыдущая">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Предыдущая</span>
                            </a>
                        </li>';
                    $paginationStart = 1;
                    if($page>1)
                        $paginationStart = $page-1;
                    if($page==$pages)
                        $paginationStart = $page-2;
                    if($page==$pages-2)
                        $paginationStart = $page;
                    for($i=$paginationStart;$i<=$paginationStart+2;$i++){
                        $activity = $i==$page ? 'active' : '';
                        echo '
                        <li class="page-item '.$activity.'">
                            <a class="page-link" href="'.$fullSite.$i.'">'.$i.'</a>
                        </li>';
                    }
                    echo '
                        <li class="page-item '.$next_status.'">
                            <a class="page-link" href="'.$fullSite.$next_page.'" aria-label="Следующая">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Следующая</span>
                            </a>
                        </li>';
                    echo '
                        <li class="page-item '.$status_last.'">
                            <a class="page-link" href="'.$fullSite.$pages.'">
                                Последняя
                            </a>
                        </li>';
                    ?>
                </ul>
            </nav>
        </div><!--end pagination container-sm-->
        <div class="container-sm col"><!-- sorting container-->

        </div><!-- end sorting container-->
    </div><!--end row-->
</div><!--end main container-->
<?php
    foreach($data as $row){
        if(!isset($_SESSION['login'])){
            $edited = $row['edited']==0 ? 'visibility:hidden' : '';

            if($row['status']=='in progress')
                $statusColor = "bg-warning";
            else if($row['status']=='finished')
                $statusColor = "bg-success";
            else
                $statusColor = "bg-danger";

            echo '
                <div class="container-sm p-3 my-3 bg-light border task">
                    <p class="task_id">#<span name="task_id">'.$row['task_id'].'</span></p>
                    <p>'.$row['date'].'</p>
                    <h1>'.$row['name'].'</h1>
                    <p>'.$row['mail'].'</p>
                    <p>'.$row['task'].'</p>
                    <span class="taskstatus '.$statusColor.'">'.$row['status'].'</span>
                    <span class="text-secondary edited" style="'.$edited.'">**отредактировано администратором**</span>
                </div>
            ';
        }
        else{
            echo '
                <div class="container-sm p-3 my-3 bg-light border task">
                    <p class="task_id">#<span name="task_id">'.$row['task_id'].'</span></p>
                    <p>'.$row['date'].'</p>
                    <h1>'.$row['name'].'</h1>
                    <p>'.$row['mail'].'</p>
                    <p>'.$row['task'].'</p>
                </div>
            ';
        }
    }

?>
<div class="container">

</div>