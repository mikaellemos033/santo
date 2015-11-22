<script type="text/javascript">

    $(document).ready(function(){

        /*
         *
         * Ativando click de arquivos
         *
         */

        var dados = {
            input: '#files_images', // input para onde será transferido o id das imagens
            check: '.check_input', // classe padrão dos inputs checkbox
            classe: '#escolher_imagens .images_banco', // classe das imagens que serão clicadas
            input_type: 'radio' // tipo dos inputs do modal de imagens
        };

        click_doc(dados);

        /*
         *
         * configurações para o upload
         * ajax de imagens
         *
         */

        upload({
            id_file: '#file_upload', // input file, de upload
            mens: '#mens_up', // tag de mensagem
            url: '/uploads/upload_img', // url de upload
            refresh: '/uploads/refresh_img', // url de refresh
            html: '#escolher_imagens',
            obj_action: dados //objeto com os dados da ação
        });

    });

</script>


<!-- Modal Structure -->
<div id="popup_imagens" class="modal modal-images">

    <article class="header-modal">
        <a href="#enviar_images" data-child="tabs_image" class="tabs tab_img">enviar</a>
        <a href="#escolher_imagens" data-child="tabs_image" class="tabs tab_img active">escolher imagens</a>
    </article>

    <div class="modal-content">

        <article class="tabs_image active row" id="escolher_imagens">
            <?php
            /*
             * incluindo o arquivo de
             * exibição de imagens
             *
             */
             include 'loop_images.php';

            ?>
        </article>

        <article class="tabs_image" id="enviar_images">

            <h4>Envie Imagens</h4>
            <form action="" enctype="multipart/form-data">

                <h5 class="text-center" id="mens_up"></h5>
                <div class="file-modal">
                    <label for="file_upload">IMAGENS</label>
                    <input type="file" id="file_upload" multiple>
                </div>
            </form>

        </article>
    </div>

</div>
