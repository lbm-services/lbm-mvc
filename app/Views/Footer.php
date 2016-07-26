    <script>
        var url = "<?php echo URL; ?>";
    </script>
    
    <script type="text/javascript">
            var elems = document.getElementsByClassName('deleteLink');
            var confirmIt = function (e) {
                if (!confirm('Are you sure?'))
                    e.preventDefault();
            };
            for (var i = 0, l = elems.length; i < l; i++) {
                elems[i].addEventListener('click', confirmIt, false);
            }
    </script>
    <!-- script src="<?php echo URL; ?>js/application.js"></script -->
    <div class="container">
        <small><i>&copy; 2016, LBM Services, info@lbm-services.de <i></small>
    </div>
</body>
</html>
