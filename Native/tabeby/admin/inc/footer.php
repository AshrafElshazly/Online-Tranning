



    <script src="<?php echo JS ?>jquery.min.js"></script>
    <script src="<?php echo JS ?>popper.min.js"></script>
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
    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    </script>


    </body>

    </html>