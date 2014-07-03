          <?php
            if(have_comments() || comments_open()):
          ?>
          <section id="comments" class="comments">
            <?php /*
            <div id="disqus_thread"></div>
            <script type="text/javascript">
              var disqus_shortname = 'bristolbronies'; 
              var disqus_identifier = '<?php echo get_the_ID(); ?>';
              var disqus_title = '<?php echo addslashes(get_the_title()); ?>';
              var disqus_url = '<?php echo get_permalink(); ?>';
              (function() {
                  var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                  dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                  (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
              })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
            */ ?>    
            <h1 class="comments__title">
              Comments
              <small>
                <?php
                  printf( _n( '1 comment', '%1$s comments', get_comments_number() ),
                  number_format_i18n( get_comments_number() ) );
                ?>
              </small>
            </h1>
            <?php if(have_comments()): ?>
            <ol class="comments__list">
              <?php
                wp_list_comments('type=comment&callback=bb_comment_formatter');
              ?>
            </ol>
            <?php endif; ?>
            <?php 
              comment_form(array(
                'title_reply' => '',
                'comment_notes_before' => '<h2>Leave a comment</h2>',
                'comment_notes_after' => '',
                'fields' => bb_comment_fields(),
                'comment_field' => bb_comment_form(),
                'format' => 'xhtml'
              )); 
            ?>
          </section>
          <?php
            endif; 
          ?>