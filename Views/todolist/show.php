<div class="container">
    <div class="container mt-5 col-xs">
        <?php foreach( $viewmodel as $show_to_do){ ?>
            <div class="card rounded-0">
                <div class="card-header bg-primary text-light rounded-0 p-2 text-center">
                            <?php echo $show_to_do['title'];?>
                </div>

                <div class="card-body p-2 rounded-0">
                            <?php echo $show_to_do['topic'];?>
                </div>
            </div>
            <?php }?>
    </div>
</div>