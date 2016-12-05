<div id="signinModal" class="modal fade login" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        
            <div class="modal-content">
                <div class="modal-body">
                 <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Sign In</a></li>
    <li role="presentation"><a href="#join" aria-controls="join" role="tab" data-toggle="tab">Join</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="login">
        <div class="row">
            <div class="col-md-12">
                <div class="login-panel panel panel-default">                                                            
                        <form action="/" class="form-horizontal" method="post" id="login_form" role="form">                            
                            <span class="alert alert-danger" id="login_form_error" hidden=""></span>
                                <div class="input-group" style="padding: 10px;">
                                    <span class="input-group-addon"><i class="fa fa-at"></i></span><input class="form-control" placeholder="Email" name="email" type="username" autofocus required>
                                </div>
                                <div class="input-group" style="padding: 10px;">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span><input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>                                                               
                                <div class="input-group" style="padding: 10px;">
                                    <span class="input-group-addon"><input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Sign In"></span>
                                </div> <a class="btn btn-information btn-lg pull-right" href="#myModal" data-toggle="modal">Forgotten Password</a>                                                       
                        </form>
                    
                </div>
            </div>            
        </div>
    </div> <!-- TAB PANEL 1 -->    
    <div role="tabpane2" class="tab-pane fade" id="join">
    <div class="row">
            <div class="col-md-12">
                <div class="login-panel panel panel-default">                    
                    
                    
                        <form action="<?php echo base_url(); ?>trans/join" class="form-horizontal" method="post" id="join_form" role="form">                            
                                <div class="input-group" style="padding: 10px;">
                                    <span class="input-group-addon"><i class="fa fa-at"></i></span><input class="form-control" placeholder="Email" name="jemail" type="email" required>
                                </div>
                                <div class="input-group" style="padding: 10px;">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span><input class="form-control" placeholder="Full Name" name="jfullname" type="username" value="" required>
                                </div>
                                <div class="input-group" style="padding: 10px;">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span><input class="form-control" placeholder="Password" name="jpassword" type="password" value="" required>
                                </div>
                                <div class="input-group" style="padding: 10px;">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span><input class="form-control" placeholder="Confirm Password" name="cjpassword" type="password" value="" required>
                                </div>
                                <div class="input-group" style="padding: 10px;">
                                <span class="input-group-addon"><input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Join Us"></span>
                                </div>
                        </form>
                    
                </div>
            </div>            
        </div>
    </div> <!-- TAB PANEL 2 -->
  </div>

</div>
                    
                </div>
            </div>
        </form>
    </div>    
</div>

<!-- Bootstrap Core JavaScript -->    
<script src="<?php echo base_url();?>ext/js/bootstrap.min.js"></script>
<!-- Sign on JavaScript -->    
<script src="<?php echo base_url();?>ext/js/signon.js"></script>
<?php if($this->session->userdata('user_name')){ ?>
<!-- Add Comments JavaScript -->    
<script src="<?php echo base_url();?>ext/js/addcomnt.js"></script>
<!-- Update Comment View Timestamp JavaScript -->    
<script src="<?php echo base_url();?>ext/js/updatestmp.js"></script>
<!-- Update Unread-Comment Count sJavaScript -->     
<script src="<?php echo base_url();?>ext/js/unreadcmts.js"></script>
 <?php } ?>

<footer class="footer text-center">
    XYZ Store&copy; <?php echo date('Y'); ?>
</footer>
</body>
</html>