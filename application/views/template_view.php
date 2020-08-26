<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BeeTasks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/<?= core\Model::$rootSite.'/css/style.css'?>">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container"><!--main container-->
        <div class="row">
            <div class="container col pagination"><!--pagination container-->
                <nav aria-label="Tasks pagination">
                    <ul class="pagination">
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
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <i class="fas fa-sort-amount-down"></i>
            </div><!-- end sorting container-->
            <div class="col-xl"></div>
        </div><!--end row-->
    </div><!--end main container-->
    <?php
        include 'application/views/'.$content_view;
    ?>

</body>
</html>