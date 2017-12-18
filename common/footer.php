</div>
    </main>
    <footer role="contentinfo" class="center">
        <div class="container">
            <p class="text-center">
                <?php echo __('Copyright &copy; ') . date('Y') . ' ' . "Arteveldehogeschool"  . '  Disclaimer'; ?><br>
            </p>
        </div>
        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
</div>
</body>
<?php queue_js_file('globals'); ?>
<?php queue_js_file('items-show'); ?>
</html>