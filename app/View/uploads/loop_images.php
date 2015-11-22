<?php
/*
 * loop de exibição
 * de imagens
 *
 */

if( empty($files) ){
    echo '<h5 class="center">Não há nenhuma imagem cadastrada</h5>';
    return false;
}

foreach ( $files as $key => $images ): ?>

    <div class="thumb_images">
        <input type="checkbox" name="img_doc" id="image_<?= $images['id_doc'] ?>" value="<?= $images['id_doc'] ?>" class="check_input">
        <img src="<?= $images['caminho'] ?>" class="responsive-img images_banco" data-check="#image_<?= $images['id_doc'] ?>">
    </div>

<?php endforeach; ?>