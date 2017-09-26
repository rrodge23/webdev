    
    <!--MODAL-->

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-update" style="margin:25px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" style="padding:20px;">
                <form action="info.php" method="POST" onsubmit="return false;" id="frm-update">
                    <input type="hidden" value="update" name="method">
                    <input type="hidden" value="" name="id" class="input-id">
                    <div class="row" style="margin-top:20px;">
                        <div class="input-group">
                            <span class="input-group-addon">Firstname</span>
                            <input type="text" class="form-control input-firstname" name="firstname" placeholder="Enter Firstname" required="">
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="input-group">
                            <span class="input-group-addon">Lastname</span>
                            <input id="" type="text " class="form-control input-lastname" name="lastname" placeholder="Enter Lastname" required="">
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="input-group">
                            <span class="input-group-addon">Email</span>
                            <input id="" type="email" class="form-control input-email" name="email" placeholder="Enter Email Address" required="">
                        </div>
                    </div>
                   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="frm-update" class="btn btn-primary">Save changes</button>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--JAVASCRIPT-->
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    
</body>
</html>