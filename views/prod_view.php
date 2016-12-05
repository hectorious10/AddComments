
<div class="container">
<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <h3><?php echo $prodnames[0]['prod_title']; ?></h3><hr>
 
        <img src="<?php $site = site_url(); echo $site.'ext/img/products/'. $prodnames[0]['prod_img']; ?>.jpg" style="width:90%;"><hr>
    <span class="glyphicon glyphicon-list"></span>Description
            <hr />
            <?php echo $prodnames[0]['prod_desc'];?>
            <hr>
    </div>
    <div class="col-md-3">
        <h3> Materials </h3>
        
    </div> 
    <div class="col-md-6 col-md-offset-2" >    
        <span class="glyphicon glyphicon-comment"></span> Comments  <?php if($this->session->userdata('user_name')){ echo '<div class="pull-right" id="msgunread">Unread: <span class="badge" name="unread" id="unread">0</span></div>';} ?>
            
            <div id="comments">
                <div class="actionBox" name="postscroll" id="postscroll">
                    <ul class="commentList" >
                    <?php                     
                    foreach($prodcommt as $commt){
                    echo '<li>By: '.$commt['usr_fullnm'].'<br><div class="commentText">'.$commt['com_rev'].'<br><span class="badge">Posted: '.$commt['com_time'].'</span></div></li>';
                    }                  
                    ?>
                    </ul>
                </div>
                <?php if($this->session->userdata('user_name')){ ?>
                <form action="/" class="form-horizontal" method="post" id="comment_form" role="form">
                <div class="input-group">
                    <input type="text" name="prod_id" id="prod_id" value="<?php echo $prodnames[0]['prod_id']; ?>" hidden="">                    
                    <textarea maxlength="255" name="usr_comment" id="usr_comment" class="form-control input-sm chat-input" placeholder="Message" required=""></textarea>Limit 255 Chars
                    <span class="input-group-btn">     
                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-comment"></span> Add Comment</button>
                    </span>                    
                </div>
                </form>
                <?php }else{ ?> To Post a comment <a data-toggle="modal" data-target="#signinModal" style="cursor:pointer;">Sign In/Join</a><?php } ?>
            </div>
    </div>     
</div>   
</div>

<!-- Modal -->
