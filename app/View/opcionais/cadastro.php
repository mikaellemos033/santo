<script type="text/javascript">

    $(document).ready(function(){
        validForm('#cadastrar', ['nome', 'files_images']);
    });

</script>

<main class="container z-depth-2">

    <h5>Cadastro de Displays</h5>

    <hr>

    <form action="/opcionais/add" method="post">

        <div class="input-field col s12">
            <input type="text" class="validate" name="titulo" id="nome">
            <label for="nome">Titulo da Aplicação</label>
        </div>

        <a class="waves-effect waves-light btn modal-trigger" href="#popup_imagens">Escolher Imagem</a>
        <input type="hidden" id="files_images" name="id_img">

        <div class="center">
            <button id="cadastrar" class="waves-effect waves-light btn">Cadastrar</button>
        </div>

    </form>

</main>

<?php

include VIEWS . '/uploads/modal_img.php';