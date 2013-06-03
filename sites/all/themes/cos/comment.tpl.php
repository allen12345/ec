 <div class="review_item">
        <h2><?php print $comment->subject; ?></h2>
        <div class="customer_name"><strong><?php print theme('username', array('account' => $content['comment_body']['#object'])) ?></strong>
          <div class="rating"><?php print render($content['rate_customer_rating']) ?></div>
        </div>
        <div class="review_txt"><?php hide($content['links']); print render($content) ?></div>
		    <?php if (isset($content['links'])) { ?>
        <div class="comment-links">
            <?php print render($content['links']) ?>
        </div>
    <?php } ?>
</div>
<?php //print serialize($comment) ?>