<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package  i-max
 * @since i-max 1.0
 */
 ?>

<div class="col-md-6">
     <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php /* ============= I-max_image_from_text ------- */?>
    	<div class="meta-img" style="width:100%;">
		<?php if (strlen(show_image_from_txt(get_the_ID())) > 0) : ?>
			<div class="entry-thumbnail">
			<?php if ( ! is_single() && ! is_sticky() ) : ?>
                    <div class="dateonimg">
                        <span class="pdate"><?php the_time('d') ?></span><span class="pmonth"><?php the_time('M') ?>/<?php the_time('y') ?></span>
                    </div>
                <?php elseif ( ! is_single() && is_sticky() ) : ?>
                	<div class="stickyonimg">
                    	<span class="featured-post"></span>
                    </div>
                <?php endif; ?>
				<?php
					echo '<img width="604" height="270" style="width:100%;" src="'.show_image_from_txt(get_the_ID()).'" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="">'; 
					?>
					
			</div>
		<?php /* ============= End I-max_image_from_text ------- */	?>
		<?php elseif ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <div class="entry-thumbnail">
            	<?php if ( ! is_single() && ! is_sticky() ) : ?>
                    <div class="dateonimg">
                        <span class="pdate"><?php the_time('d') ?></span><span class="pmonth"><?php the_time('M') ?>/<?php the_time('y') ?></span>
                    </div>
                <?php elseif ( ! is_single() && is_sticky() ) : ?>
                	<div class="stickyonimg">
                    	<span class="featured-post"></span>
                    </div>
                <?php endif; ?>
                <?php the_post_thumbnail(); ?>
            </div>
		
        <?php else : ?>
        	<div class="entry-nothumb">
            	<?php if ( ! is_single() && ! is_sticky() ) : ?>
                	<div class="noimg-bg"></div>
                    <div class="dateonimg">
                        <span class="pdate"><?php the_time('d') ?></span><span class="pmonth"><?php the_time('M') ?>/<?php the_time('y') ?></span>
                    </div>
                <?php elseif ( ! is_single() && is_sticky() ) : ?>
                	<div class="noimg-bg"></div>
                	<div class="stickyonimg">
                    	<span class="featured-post"></span>
                    </div>
                <?php endif; ?>
            </div>         
        <?php endif; ?>
        </div>
        
		<?php //$num++; ?>
       <div class="post-mainpart" style="width:100%;">    
            <header class="entry-header">
                <?php if ( is_single() ) : ?>
                <h1 class="entry-title"><?php the_title(); ?><?php echo " ".$num; ?> </h1>
                <?php else : ?>
                <h1 class="entry-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?><?php echo " ".$num; ?></a>
                </h1>
                <?php endif; // is_single() ?>
        
                <div class="entry-meta">
                    <?php imax_entry_meta(); ?>
                    <?php edit_post_link( __( 'Edit', 'i-max' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .entry-meta -->
            </header><!-- .entry-header -->
        
            <?php if ( is_search() || is_archive() ) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
            <?php else : ?>
            <div class="entry-content">
            
				<?php
                    if ( get_theme_mod('show_full', 0) == 1 )
                    {
                        the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'i-max' ) );
                    } else
                    {
                        the_excerpt();
                    }
                ?>	

                <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'i-max' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            </div><!-- .entry-content -->
            <?php endif; ?>
        
            <footer class="entry-meta">
                <?php if ( comments_open() && ! is_single() ) : ?>
                    <div class="comments-link">
                        <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'i-max' ) . '</span>', __( 'One comment so far', 'i-max' ), __( 'View all % comments', 'i-max' ) ); ?>
                    </div><!-- .comments-link -->
                <?php endif; // comments_open() ?>
        
                <?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
                    <?php get_template_part( 'author-bio' ); ?>
                <?php endif; ?>
            </footer><!-- .entry-meta -->
        </div>
    </article><!-- #post -->    
</div>
