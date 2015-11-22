<script type="text/javascript">

    $(document).ready(function(){
        validForm('#cadastrar', ['nome']);
    });

</script>

<main class="container z-depth-2">

    <h5>Cadastro de Displays</h5>

    <hr>

    <form action="/displays/add" method="post">

        <div class="input-field col s12">
            <input type="text" class="validate" name="titulo" id="nome">
            <label for="nome">Titulo do display</label>
        </div>

        <a class="waves-effect waves-light btn modal-trigger" href="#popup_imagens">Escolher Imagem</a>
        <input type="hidden" id="files_images" name="id_img">

        <div class="input-field col s12">
            <select class="browser-default" name="lang" id="lang">
                <option value="1">Português</option>
                <option value="2">Inglês</option>
                <option value="3">Espanhol</option>
            </select>
        </div>

        <div class="center">
            <button id="cadastrar" class="waves-effect waves-light btn">Cadastrar</button>
        </div>

    </form>

</main>

<?php

 include VIEWS . '/uploads/modal_img.php';