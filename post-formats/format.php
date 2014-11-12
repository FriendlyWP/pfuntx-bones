              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">
                  <h2 class="section-title"><?php the_title(); ?></h2>
                </header> <?php // end article header ?>

                <section class="entry-content cf" itemprop="articleBody">
                  
                    <?php 
                    the_content();
                  ?>
                 
                </section> <?php // end article section ?>

                <footer class="article-footer">

                  <?php //printf( __( 'Filed under: %1$s', 'bonestheme' ), get_the_category_list(', ') ); ?>

                  <?php // the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

                </footer> <?php // end article footer ?>

              </article> <?php // end article ?>