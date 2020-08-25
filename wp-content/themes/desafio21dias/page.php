<?php

/**
 * Tema construido no Desafio21Dias
 *
 * @link http://torneseumprogramador.com.br
 *
 * @package WordPress
 * @subpackage Desafio21Dias
 * @since Desafio21Dias
 */

get_header();
$url = get_stylesheet_directory_uri();

$args = array(
  'posts_per_page' => 2,
  'paged' => get_query_var("paged"),
  'post_type' => 'post'
);
$the_query_post = new WP_Query($args);
if ($the_query_post->have_posts()) {  ?>
<div class="container" style="margin-top: 150px;">
  <h2>Habilidades </h2>
  <br>
  <table class="table" id="tabHabilidades">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Imagem</th>
        <th scope="col">Título</th>
        <th scope="col">Conteúdo</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($the_query_post->have_posts()) {
          $the_query_post->the_post();
        ?>
      <tr>
        <th scope="row"><?php the_id(); ?></th>
        <td>
          <a href="<?php echo get_permalink(); ?>">
            <div style="width:128px; height: 128px; overflow: hidden;">
              <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid', 'style' => 'width:100%')); ?>
            </div>
          </a>
        </td>
        <td><a href="<?php echo get_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </td>
        <td>
          <a href="<?php echo get_permalink(); ?>">
            <?php the_content(); ?>
          </a>
        </td>
      </tr>
      <?php

        } // end while
        ?>

    </tbody>
  </table>
  <div class="pagination">
    <?php
      $wp_query = $the_query_post;
      global $wp_query;
      echo paginate_links(array(
        'prev_text' => __('Anterior - Do Marcos')
      ));
      ?>
  </div>

</div>
<?php
} //
else { ?>
<div class="text-center mt-4 alert alert-danger" role="alert">
  <p>Nenhum post encontrado!</p>
</div>
<?php
} //end if
?>
<div class="text-center mt-4">
  <a class="btn btn-xl btn-primary" href="<?php home_url('/'); ?>"><i class="fa fa-arrow-left mr-2"></i>
    Voltar
  </a>
</div>
</div>
</div>

</section>

<?php get_footer(); ?>
<script>
$(document).ready(function() {
  $("#txtbusca").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabHabilidades tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>