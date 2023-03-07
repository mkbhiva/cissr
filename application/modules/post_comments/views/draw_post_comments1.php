<?php
$comment_num_row = $comment_query->num_rows();


?>

<div class="comment-list">

        <div class="main-title">
            <h2> <?= $comment_num_row ?> Comments so far</h2>
            <span>Jump into a conversation</span>
        </div>								




        <div id="writecomment" class="writecomment">
        
            <form action="<?php echo base_url()?>post_comments/post_comment" method="post" enctype="multipart/form-data">

                <p class="comment-info">
                    <i class="fa fa-info"></i>
                    <strong>Your data will be safe! &amp; Published after Approval.</strong>
                    <span>Your e-mail address will not be published. Also other data will not be shared with third person.<br/>All fields are required.</span>
                </p>
                
                <?php if(isset($flash_msg)){
                        echo $flash_msg;
                    }?>

                <p class="contact-form-user">
                    <input type="text" placeholder="Your Name*" name="comment_name" value="" />
                    <input type="hidden" name="post_id" value="<?= $update_id ?>" />
                </p>
                <p class="contact-form-email">
                    <input type="text" placeholder="E-mail*" name="comment_email" value=""/>
                </p>
                <p class="contact-form-place">
                    <input type="text" placeholder="Place*" name="comment_place" value=""/>
                </p>
                <p class="contact-form-message">
                    <textarea placeholder="Your Comment*...." name="comment_text"></textarea>
                </p>
                
                
                <p class="contact-form-message">
                            
                                <span><?= $captcha_img ?></span>
                                <input type="text" class="form-control col-2" name="comment_captcha" id="comment_captcha" placeholder="*Type captcha here!!" required="required"/>
                </p>
                
                <p><input type="submit" class="button" name="submit" value="Submit Comment" /></p>
            </form>




        </div>

        <div class="block-comments">

            <ol id="comments">

				<?php
                foreach($comment_query->result() as $row){
				?>
				                
                <li>
                    <div class="comment-block">
                        <a href="#" class="image-avatar">
                            <img src="http://localhost/CI2JBh/mykit/images/photos/avatar-3.jpg" alt="online jai bhim" title="" />
                        </a>
                        <div class="comment-text">
                            <a href="#" class="reply-id">#3</a>
                            <strong class="user-nick"><a href="#">Dalit Tigers - Ahmedabad                                </a></strong>
                            <span class="time-stamp">8 September 2015,  02:22 PM</span>
                            <p align="justify">Good to see best site of our Lord Babasaheb. ..

Keep Help and support our people's. ..

Jay Bhim. ..</p>
                        </div>
                        <div class="clear-float"></div>
                    </div>
                </li>
                
                <?php } ?>
				
				                
				
				
      </ol>
      
        </div>



    </div>