   
   
   
   <script src="<?php echo JS ?>jquery.min.js"></script>
    <script src="<?php echo JS ?>popper.min.js"></script>
    <script src="<?php echo JS ?>bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js" integrity="sha256-2JRzNxMJiS0aHOJjG+liqsEOuBb6++9cY4dSOyiijX4=" crossorigin="anonymous"></script>
    <script src="<?php echo JS ?>backend.js"></script>
    <script>
    $(function() {
    $('#datetimepicker1').datetimepicker();
    });
    </script>
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