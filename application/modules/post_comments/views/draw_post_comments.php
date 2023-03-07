<?php
$comment_num_row = $comment_query->num_rows();
$seg_post_url = $this->uri->segment(3);
?>


<!-- Post comment start -->
                    <div id="comments" class="comments-area block">
                        <h3 class="block-title"><span><?= $comment_num_row ?> Comments</span></h3>

                        <ul class="comments-list">
                            <li>
                            	<?php
                                if($comment_num_row<1){
								?>
                                
                                <div class="comment">
                                    <div class="comment-body">
                                        <div class="comment-content">
                                        <p><a href="#"><strong>Be the first to comments on this News</strong></a></p></div>
                                          
                                    </div>
                                </div><!-- Comments end -->
                                
                                <?php } ?>
                            	<?php
									$i  = $comment_num_row;
									$this->load->module('timedate');
									foreach($comment_query->result() as $row){
									$comment_date = $this->timedate->get_nice_date($row->comment_date, 'full');	
								?>
                            
                                <div class="comment">
                                    <img class="comment-avatar pull-left" alt="" src="<?= base_url() ?>assets/images/authors/thumb/no_img.png">
                                    <div class="comment-body">
                                        <div class="meta-data">
                                            <span class="comment-author"><?= $row->comment_name ?></span>
                                            <span class="comment-date pull-right"><?= $comment_date ?></span>
                                        </div>
                                        <div class="comment-content">
                                        <p><?= $row->comment_text ?></p></div>
                                          
                                    </div>
                                </div><!-- Comments end -->
                                
                                <?php
								$i--;
								 } ?>

                            </li><!-- Comments-list li end -->
                        </ul><!-- Comments-list ul end -->
                    </div>
                    <!-- Post comment end -->

                    <div class="comments-form">
                        <h3 class="title-normal">Leave a comment</h3>

                        <form role="form" action="<?php echo base_url()?>post_comments/post_comment" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if(isset($flash_msg)){
                                        echo $flash_msg;
                                    }?>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control required-field" name="comment_text" id="message" placeholder="Your Comment" rows="10" required></textarea>
                                    </div>
                                </div><!-- Col end -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="comment_name" id="name" placeholder="Your Name" type="text" required>
                                        <input type="hidden" name="seg_post_url" value="<?= $seg_post_url ?>" />
                                    </div>
                                </div><!-- Col end -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="comment_email" id="email" placeholder="Your Email" type="email" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="comment_place" placeholder="Place" type="text" required>
                                    </div>
                                </div>
                            </div><!-- Form row end -->
                            <div class="clearfix">
                                <input type="submit" class="comments-btn btn btn-primary" name="submit" value="Submit Comment">
                            </div>
                        </form><!-- Form end -->
                    </div>