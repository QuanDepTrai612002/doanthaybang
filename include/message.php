<?php
if (!empty($_SESSION['message']))
{
    ?>


    <div class="alert alert-dismissible alert-<?php echo $_SESSION['message']['alertType'] ?>">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?php echo $_SESSION['message']['message'] ?>
    </div>
    <?php
    unset($_SESSION['message']);
}
?>