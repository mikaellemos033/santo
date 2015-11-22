<main class="container z-depth-2">

    <section class="row">
        <article class="container-form col l12">

            <div class="etapas">
                <div class="active"><span>1</span></div>
                <div><span>2</span></div>
                <div><span>3</span></div>
                <div><span>4</span></div>
            </div>

            <h4 class="lead">Cadastro de Produto</h4>

            <form action="/produto/add" method="post">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="nome" id="nome">
                    <label for="nome">Nome do Produto</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="acabamentos" name="acabamentos" class="materialize-textarea"></textarea>
                    <label for="acabamentos">Acabamentos</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="beneficios" name="beneficios" class="materialize-textarea"></textarea>
                    <label for="beneficios">Benefícios</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="caracteristicas" name="caracteristicas" class="materialize-textarea"></textarea>
                    <label for="caracteristicas">Caracteristicas</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="descricao" name="descricao" class="materialize-textarea"></textarea>
                    <label for="descricao">Descrição</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="ficha" name="ficha" class="materialize-textarea"></textarea>
                    <label for="ficha">Ficha Técnica</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="modelo" name="modelo" class="materialize-textarea"></textarea>
                    <label for="modelo">Modelos</label>
                </div>

                <div class="center">
                    <button class="waves-effect waves-light btn">Cadastrar</button>
                </div>

            </form>
        </article>
    </section>

</main>