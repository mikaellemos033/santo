<?php
    $categoria = (array) $categoria[0];
?>

<script type="text/javascript">

    $(document).ready(function(){
        validForm('#cadastrar', ['nome', 'keywords', 'description']);
    });

</script>

<main class="container z-depth-2">

    <section class="row">
        <article class="container-form col s12">

            <h4 class="lead">Cadastro de Categoria</h4>
            <hr>
            <form action="/categoria/edit" method="post" name="categoria_form">

                <div class="input-field col s12">
                    <input type="text" class="validate" name="nome" id="nome" value="<?= $categoria['nome'] ?>">
                    <label for="nome">Nome da Categoria</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" class="validate" name="keywords" id="keywords" value="<?= $categoria['keywords'] ?>">
                    <label for="keywords">Keywords</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" class="validate" name="description" id="description" value="<?= $categoria['description'] ?>">
                    <label for="description">Description</label>
                </div>

                <input type="hidden" name="id_cat" value="<?= $categoria['id_cat'] ?>">

                <div class="input-field col s12">
                    <select class="browser-default" name="lang" id="lang">
                        <option value="1">Português</option>
                        <option value="2">Inglês</option>
                        <option value="3">Espanhol</option>
                    </select>
                </div>

                <div class="input-field col s12 center">
                    <button id="cadastrar" class="waves-effect waves-light btn">Atualizar</button>
                </div>

            </form>

        </article>
    </section>

</main>