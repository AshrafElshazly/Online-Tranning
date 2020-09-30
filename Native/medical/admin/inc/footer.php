



    <script src="<?php echo JS ?>jquery-3.5.1.slim.min.js "></script>
    <script src="<?php echo JS ?>popper.min.js "></script>
    <script src="<?php echo JS ?>bootstrap.min.js "></script>
    <script>
        $(".delete-record ").click(() => {
            let state = confirm("Are You Sure From Deleteing ? ");
            if (state) {
                return true;
            } else {
                return false;
            }
        })
    </script>



    </body>

    </html>