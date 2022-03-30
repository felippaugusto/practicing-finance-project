<?php
// start sessions
session_start();

if(isset($_SESSION['message'])): ?>
    <?php 
        echo '<div class="container-modal active">
        <div class="modal">
        <p class="paragraph-modal">',$_SESSION['message'],'</p>
        <button class="btn-okay">Tentar novamente</button>
        </div>
        </div>';
    ?>
<?php
endif;
session_unset();
?>