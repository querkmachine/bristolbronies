<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <div class="row">
          <div class="error-404">
            <img src="/wp-content/themes/godwin/assets/img/404.png" alt="Image Not Found">
            <h1>We just don't know what went wrong&hellip;</h1>
            <p>The page you were looking for doesn't exist.<br>It might be that you clicked on a broken link, this page was removed, or you simply typed gibberish into the address bar. Either way, it's not here.</p>
            <p><strong>Try <a href="javascript:history.go(-1);">going back</a> where you came from, <a href="/search">searching</a> for what you need, or head on <a href="/">home</a> and start over.</strong></p>
          </div>
        </div>

<!-- 404.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>