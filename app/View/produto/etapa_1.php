<main class="container z-depth-2">

    <section class="row">
        <article class="container-form col l12">

            <div class="etapas">
                <div><span>1</span></div>
                <div class="active"><span>2</span></div>
                <div><span>3</span></div>
                <div><span>4</span></div>
            </div>

          <!--  <h4 class="lead">Segunda Etapa do Cadastro de Produto</h4>-->
            <br>
            <?php include VIEWS . 'uploads/galeria_img.php'; ?>

            <form action="/produto/add_galery" method="post">

                <input type="hidden" value="<?= $id_post ?>" name="id_pro">
                <input type="hidden" id="files_images" name="galeria">

                <div class="center col s12" style="margin-top: 20px;">
                    <button class="waves-effect waves-light btn">Cadastrar Galeria</button>
                    <a href="/produto/etapas_2/<?= $id_post ?>" class="waves-effect waves-light btn">Pular</a>
                </div>

            </form>

        </article>
    </section>

</main>