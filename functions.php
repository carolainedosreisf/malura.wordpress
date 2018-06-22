<?php
  add_theme_support('post-thumbnails');//ele adiciona opção para imagem destacada 


/*Adicionar nova item no menu do painel do wordpres, com o nome de imoveis (para facilitar para o cliente) */
function cadastrando_post_type(){
  $nomeSingular = 'Imóvel';
  $nomePlural = 'Imóveis';
  $description = 'Imóveis da imobiliária Malura';
  
    $labels = array(
      'name' => $nomePlural,
      'name_singular' => $nomeSingular,
      'add_new_item' => 'Adicinar novo '. $nomeSingular,
      'edit_item' => 'Editar '. $nomeSingular
    );
  
  $supports = array(
      'title',
      'editor',
      'thumbnail'
  );

    $args = array(
      'labels' => $labels,
      'public' => true,
      'description' => $description,
      'menu_icon' => 'dashicons-admin-home',
      'supports' => $supports
    );
  
    register_post_type($nomeSingular, $args);
}

add_action('init', 'cadastrando_post_type');

//menu
function registrar_menu_navegacao(){
    register_nav_menu('menu','main-menu');
}
add_action('init', 'registrar_menu_navegacao');


/*function geraTitulo(){
  bloginfo('name');
  if( !is_home() ) echo ' | ';
  the_title(); 
}*/

//adicionar localização
 function registra_taxonomia_localizacao(){
    $nomeSingular = 'Localização';
    $nomePlural = 'Localizações';

    $labels = array(
        'name' => $nomePlural,
        'singular_name' => $nomeSingular,
        'edit_item' => 'Editar ' .$nomeSingular,
        'add_new_item' => 'Adicionar nova ' .$nomeSingular
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true
    );

    register_taxonomy('localizacao', 'imvel', $args);
}

add_action('init', 'registra_taxonomia_localizacao');

function preenche_conteudo_informacoes_imovel(){?>
<style>
  .malura-metabox{
    display:flex;
    justify-content: space-between;
  }
  .maluras-metabox-item{
    flex-basis:30%;
  }
  .maluras-metabox-item label{
    font-weight:700;
    display:block;
    margin: .5rem 0;
  }
  .input-addon-wrapper{
    height: 30px;
    display:flex;
    align-items: center;
  }
  .input-addon{
    display: block;
    border: 1px solid #CCC;
    border-bottom-left-radius: 5px;
    border-top-left-radius: 5px;
    height:100%;
    width: 30px;
    text-align: center;
    line-height: 30px;
    box-sizing:border-box;
    background-color: #888;
    color: #FFF;
   }


</style>
<div class="maluras-metabox">
  <div class="maluras-metabox-item">
      <label for="maluras-precos-input">Preços:</label>
      <div class="input-addon-wrapper">
        <span class="input-addon">R$</span>
        <input id="maluras-precos-input" class="maluras-metabox-input" type="text" name="preco_id">
  </div>
  </div>

  <div class="maluras-metabox-item">
      <label for="maluras-vagas-input">Vagas:</label>
      <input id="maluras-vagas-input" class="maluras-metabox-input" type="number" name="vagas_id">
  </div>

  <div class="maluras-metabox-item">
      <label for="maluras-banheiros-input">Banheiros:</label>
      <input id="maluras-banheiros-input" class="maluras-metabox-input" type="number" name="banheiros_id">
  </div>
</div>
<?php
}

function registra_meta_boxes() {

  add_meta_box(
      'Informacoes-imoveis',
      'Informações do Imóvel',
      'preenche_conteudo_informacoes_imovel',
      'imovel',
      'normal',
      'high'
  );
}

add_action('add_meta_boxes', 'registra_meta_boxes');
?>