<script type="text/javascript">

    $(document).ready(function(){
        validForm('#cadastrar', ['nome']);
    });

</script>

<main class="container z-depth-2">

    <h5>Cadastro de Displays</h5>

    <hr>

    <form action="/opcionais/edit" method="post">

        <div class="input-field col s12">
            <input type="text" class="validate" name="titulo" id="nome" value="<?= $opcionais['titulo'] ?>">
            <label for="nome">Titulo da Aplicação</label>
        </div>

        <?php
            if( $img && file_exists(ROUT . $img['caminho']) ){
                echo "<div style='height: 150px; overflow: hidden;'><img src='{$img['caminho']}' class='responsive-img'></div><br>";
                echo "<input type='hidden' value='{$img['id_doc']}' name='side_kick'>";
            }
        ?>

        <a class="waves-effect waves-light btn modal-trigger" href="#popup_imagens">Escolher Imagem</a>
        <input type="hidden" id="files_images" name="id_img">

        <div class="center">
            <button id="cadastrar" class="waves-effect waves-light btn">Atualizar</button>
        </div>

    </form>

</main>

<?php

include VIEWS . '/uploads/modal_img.php';