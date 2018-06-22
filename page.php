<?php get_header(); ?>
    <main class="pagina-main">
        <article class"pagina">
            <h1 class="pagina-titulo">
                <?php the_title(); ?>
            </h1>

            <?php //puxa as paginas do wordpress
            if( have_posts() ){
                while(have_posts() ){
                    the_post();

            ?>

            <div class="pagina-conteudo">   
                <?php the_content(); ?>
            </div>
            <?php
                }
            }
            ?>
            
            <?php // avisa que essa parte aparecera so na pagina contato
           if(is_page('contato')){ 
            ?>

                <form class="contato">
                    <div class="form-nome">

                        <br/><label for="form-nome">Nome:</label><br/>
                        <input id="form-nome" type="text" palceholder="Digite seu nome" name="form-nome"/>
                    </div>

                    <div class="form-email">
                    <label for="form-email">Email:</label><br/>
                        <input id="form-email" type="email" palceholder="email@exemplo.com" name="form-email"/>
                    </div>

                    <div class="form-mensagem">
                    <label for="form-mensagem">Mensagem:</label><br/>
                        <input id="form-mensagem" type="text" name="form-mensagem"/>
                    </div>
                    <button type="submit" class="contato">Enviar</button>
                </form>

           <?php // fim da pagina contato
            }; 
            ?>
        </article>
    </main>
<?php get_footer(); ?>
