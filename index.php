<?php
    //variavel para nao dar erro no home por ausa da pesquisa de localização
   $QueryTaxonomy = array_key_exists('taxonomy', $_GET);
   //caso a opção todos os imoveis seja selecionado derecionara para o index
   if($QueryTaxonomy && $_GET['taxonomy'] === ''){
       wp_redirect(home_url());
   }
   //puxa o header.php
    require_once('header.php');
?>



<main class="home-main">
    <div class="container casas">
    <h1>Bem vindo ao Maluras!</h1>

    <?php // formulario para selecionar localização desejada ?>
    <?php $taxonomias = get_terms('localizacao'); ?>

    <form class="form-pesquisa" method="get" action="<?= bloginfo('url');
    ?>">
        <select name="taxonomy">
            <option value="">Todos os imóveis</option>
            <?php foreach($taxonomias as $taxonomia) { ?>
            <option value="<?=$taxonomia->slug;?>"><?= $taxonomia->name; ?></option>
            <?php } ?>
        </select>
        <button type="submit"class="pesquisar">Filtrar</button>
    </form>

        
<?php
//ele verifica se tem imoveis do item imoveis do menu
//ele pesquisa a localização que foi solicitado
if ($QueryTaxonomy){
$taxQuery = array(
    array(
        'taxonomy' => 'localizacao',
        'field' => 'slug',
        'terms' => $_GET['taxonomy']
    )
);
}

$args = array(
    'post_type' => 'Imóvel',
    'tax_query' => $taxQuery
);

$loop =  new WP_Query( $args );
if($loop->have_posts() ){ ?>
   <?php while($loop -> have_posts() ){
        $loop -> the_post();

/*ele verefica se tem posts
    if( have_posts() ){
        while( have_posts() ){
            the_post();*/
?>

       <ul class="">
        <li class="imoveis-listagem-item floating-box ">
            
            <a href="<?php the_permalink(); ?>">
            
            <?php the_post_thumbnail();//ele adiciona imagem destacada ?>
          <h2> <?php the_title();//organização dos posts ?></h2>
          <div><?php the_content(); //organização dos posts?></div>
          
            </a>
            </li>

<?php
        }
    }
?>

        </ul>
    </div>
</main>
<?php
    include('footer.php');
?>
