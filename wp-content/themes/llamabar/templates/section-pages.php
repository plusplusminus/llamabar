<div class="page-link">

  <?php global $post; ?>

  <?php
  $entries = get_post_meta( get_the_ID(), '_ck_page_links', true );

  foreach ( (array) $entries as $key => $entry ) {
    $img = $title = $desc = $caption = '';

    if ( isset( $entry['title'] ) )
        $title = esc_html( $entry['title'] );

    if ( isset( $entry['link'] ) )
        $link = esc_html( $entry['link'] );

    if ( isset( $entry['image_id'] ) ) {
        $img = wp_get_attachment_image_src( $entry['image_id'], 'full' );
    }

    ?>
    <div class="col-xs-12 col-sm-4 col-md-4 link-box" style="background:url('<?php echo $img[0];?>');">
        <div class="row"> 
          <a href="<?php echo $link;?>" title="<?php echo $title; ?>">
            <?php echo $title; ?>
          </a> 
        </div>
    </div>

    <?php

      

      // Do something with the data
  }

  ?>

</div>