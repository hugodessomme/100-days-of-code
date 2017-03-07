<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <?php the_author_meta( 'description' ); ?>
    </div>
    <div class="sidebar-module">
        <h4>Archives</h4>
        <ol class="list-unstyled">
            <?php wp_get_archives( 'type=monthly' ) ?>
        </ol>
    </div>
    <div class="sidebar-module">
        <h4>Liens</h4>
        <ul clas="list-unstyled">
            <li><a href="<?php echo get_option('github'); ?>">Github</a></li>
            <li><a href="<?php echo get_option('twitter'); ?>">Twitter</a></li>
        </ul>
    </div>
</div><!-- /.blog-sidebar -->