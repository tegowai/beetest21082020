<?php
    foreach($data as $row)
        echo '
            <div class="container-sm p-3 my-3 bg-secondary text-white">
                <p>'.$row['date'].'</p>
                <h1>'.$row['name'].'</h1>
                <p>'.$row['mail'].'</p>
                <p>'.$row['task'].'</p>
            </div>
        ';
    }

?>