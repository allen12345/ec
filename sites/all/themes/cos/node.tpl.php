<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php //print $picture ?>

<?php if ($page == 0): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>

  <?php if ($submitted): ?>
    <span class="submitted"><?php print $submitted; ?></span>
  <?php endif; ?>

  <div class="txt clear-block">
    <?php hide($content['links']); hide($content['comments']); print render($content) ?>
  </div>

  <div class="clear-block">
      <div class="links"><?php print render($content['links']) ?></div>
  </div>

</div>
<?php if ($node->comment_count > 0 and $page) { ?><h2 class="page_subtitle"><?php print t('Latest Customer Comments') ?></h2><?php print render($content['comments']) ?><?php } ?>