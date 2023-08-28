<?php
$option = get_option('wiki-homepage-options');
$wiki_solution = isset($option['wiki-solution']) ? $option['wiki-solution'] : '';
if (!empty($wiki_solution)) {
?>
    <section class="solution-home">
        <div class="container">
            <h2 class="heading">GIẢI PHÁP TỪ WIKI NHA KHOA</h2>
            <div class="row list-solution">
                <?php
                foreach ($wiki_solution as $key => $value) {
                    $url = wp_get_attachment_url($value['wiki-solutio-image'][0]);
                ?>
                    <div class="col-6 col-md item-solution">
                        <div class="inner">
                            <img class="img" src="<?php echo $url; ?>" alt="">
                            <h3 class="solution-title"><?php echo $value['wiki-solution-title']; ?></h3>
                            <p class="solution-desc"><?php echo $value['wiki-solution-link']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php
}
