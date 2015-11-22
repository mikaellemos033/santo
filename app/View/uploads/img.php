<main class="container z-depth-2 blockquote_upload">

    <section class="row">
        <article class="container-from col s12 uploads">

            <h4 class="lead-2"><?= $title_form; ?></h4>
            <hr>
            <form action="<?= $action ?>" enctype="multipart/form-data" method="post">

                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" multiple name="files[]">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Envie um ou mais arquivos">
                    </div>
                </div>

                <div class="center">
                    <button class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>Upload</button>
                </div>

            </form>

        </article>
    </section>

</main>