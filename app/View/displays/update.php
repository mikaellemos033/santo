
<script type="text/javascript">

    $(document).ready(function(){
        validForm('#cadastrar', ['nome']);
    });

</script>

<main class="container z-depth-2">

    <h5>Cadastro de Displays</h5>

    <hr>

    <form action="/displays/up" method="post">

        <div class="input-field col s12">
            <input type="text" class="validate" name="titulo" id="nome" value="<?= $display['titulo'] ?>">
            <label for="nome">Titulo do display</label>
        </div>

        <?php
            if( file_exists(ROUT . $display['caminho']) ){
                echo "<div style='height: 150px; overflow: hidden;'><img src='{$display['caminho']}' class='responsive-img'></div>";
            }
        ?>

        <a class="waves-effect waves-light btn modal-trigger" href="#popup_imagens">Escolher Imagem</a>
        <input type="hidden" id="files_images" name="id_img" value="<?= $display['id_doc'] ?>">

        <input type="hidden" name="side_kick" value="<?= $display['id_doc'] ?>">
        <input type="hidden" name="id_display" value="<?= $display['id_display'] ?>">

        <div class="input-field col s12">
            <select class="browser-default" name="lang" id="lang">
                <option value="1">Português</option>
                <option value="2">Inglês</option>
                <option value="3">Espanhol</option>
            </select>
        </div>

        <div class="center">
            <a href="/displays" class="waves-effect waves-light btn">cancelar</a>
            <button id="cadastrar" class="waves-effect waves-light btn">Atualizar</button>
        </div>

    </form>

</main>

<?php
  include VIEWS . '/uploads/modal_img.php';