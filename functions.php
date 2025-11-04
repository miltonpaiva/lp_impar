<?php
/*
* Importar custom functions
*/

require_once locate_template('/_lib/config.php'); //Funções do Tema


class LP
{
    /**
     * define os post types disponiveis
     *
     * @var array
     */
    const post_types = [ 'home' ];

    /**
     * define as taxonomias disponiveis para os post types
     *
     * @var array
     */
    const taxonomies = ['section_home' => 'Seções Home'];

    /**
     * define as taxonomias disponiveis para criação das sessões
     *
     * @var array
     */
    const tax_sections =
    [
        'nossa_visao'        => 'Nossa Visão',
        'nossos_produtos'    => 'Nossos Produtos',
        'por_que_escolher'   => 'Por nos escolher',
        'inovamos'           => 'Inovamos para conectar o futuro',
        'conectando_pessoas' => 'Conectando pessoas',
        'presenca_brasil'    => 'Presença em todo o Brasil',
    ];

    /**
     * define os campos disponiveis para cada sessão de categoria
     *
     * @var array
     */
    const tax_sections_fields =
    [
        'nossa_visao'        => [ 'titulo', 'descricao', 'imagem', 'texto_botao', 'link_botao' ],
        'nossos_produtos'    => [ 'titulo', 'descricao', 'imagem', 'texto_botao', 'link_botao' ],
        'por_que_escolher'   => [ 'titulo', 'subtitulo', 'descricao', 'imagem'],
        'inovamos'           => [ 'titulo', 'descricao', 'imagem'],
        'conectando_pessoas' => [ 'titulo', 'descricao', 'imagem'],
        'presenca_brasil'    => [ 'titulo', 'descricao', 'imagem'],
    ];

    public function __construct()
    {
        add_action( 'init', [ $this, 'registerPostTypes' ] );
        add_action( 'init', [ $this, 'registerTaxonomies' ] );
        add_action( 'init', [ $this, 'registerDefaultTerms' ] );
        add_action( "edit_post", array(&$this, 'setCustomFieldsByTax'));
        add_action( "save_post", array(&$this, 'setCustomFieldsByTax'));
        add_action( "wp_insert_post", array(&$this, 'setCustomFieldsByTax'));
    }

    /**
     * cria o post type com base nos parametros informados
     * [https://developer.wordpress.org/reference/functions/register_post_type/]
     *
     * @param      string       $slug
     * @param      string       $title
     * @param      array        $suports
     * @param      bool|null    $is_blog
     * @param      string|null  $icon
     * @param      int|null     $position_menu
     * @return     void
     */
    public static function registerPostTypes() : void
    {
        foreach ( self::post_types as $post_type )
            self::createPostType( 'home', 'Conteudos Home',
                    [ 'title', 'thumbnail', 'custom-fields' ],
                    false,
                    'dashicons-admin-home',
                    2 );

    }

    /**
     * registerTaxonomies - Registra as taxonomias definidas na constante taxonomies
     *
     * @return void
     */
    public function registerTaxonomies() : void
    {
        foreach ( self::taxonomies as $slug => $title )
            self::createTaxonomy( $slug, $title, self::post_types );
    }

    /**
     * registra a categoria(taxonomy) no wordpress e vincula ao post type informado
     *
     * @param      string  $slug                 The slug
     * @param      string  $title                The title
     * @param      array   $post_type_slug_list  The post type slug list
     */
    public function createTaxonomy(string $slug, string $title, array $post_type_slug_list): void
    {
        $args =
        [
            'labels' =>
            [
                'name'          => $title,
                'menu_name'     => $title,
                'singular_name' => $title,
            ],
            'hierarchical'      => true,
            'show_admin_column' => true,
            'show_in_menu'      => true,
            'query_var'         => true,
            'has_archive'       => true,

        ];

        register_taxonomy($slug, $post_type_slug_list, $args);
    }

    /**
     * define os termos(term) nas categorias(taxonomy) dos post types
     * @param string $slug
     * @param string $title
     * @param string $taxonomy
     * @return void
     */
    public function setDefaultTermsInTaxonomy(string $slug, string $title, string $taxonomy): void
    {
        wp_insert_term(
            $title,            // the term
            $taxonomy,         // the taxonomy
            [
                'description' => '0',
                'slug'        => $slug, //term slug
            ]
        );
    }

    /**
     * Registra os post types definidos na constante post_types
     *
     * @return void
     */
    public static function createPostType( string $slug, string $title, array $suports,
                                    ?bool $is_blog = true, ?string $icon = 'dashicons-admin-post',
                                    ?int $position_menu = 10 ): void
    {
        $args =
        [
            'labels'             =>
            [
                'name'            => __( $title ),                // nome principal do post type
                'singular_name'   => $title,
                'add_new'         => "Adicionar {$title}",
                'add_new_item'    => "Adicionar {$title}",
                'edit_item'       => "Editar {$title}",
                'search_items'    => "Pesquisar {$title}",
                'featured_image'  => "Imagem do conteúdo",
            ],
            'supports'           => $suports,                    // array de conteudos suportados
            'public'             => true,
            'has_archive'        => $is_blog,                    // informa se contem listagem
            'publicly_queryable' => $is_blog,                    // informa se tem single/interna
            'menu_icon'          => $icon,                       // icone, nome[developer.wordpress.org/resource/dashicons/] ou url do arquivo
            'menu_position'      => $position_menu,              // posição no menu
        ];

        register_post_type($slug, $args);
    }

    /**
     * registra os termos padrões nas taxonomias definidas na constante tax_sections
     *
     * @return void
     */
    public function registerDefaultTerms() : void
    {
        foreach ( self::taxonomies as $tax_slug => $tax_title )
            foreach ( self::tax_sections as $slug => $title )
                $this->setDefaultTermsInTaxonomy( $slug, $title, $tax_slug );
    }

    /**
     * retorna uma lista com os posts cadastrados nos temos de alguma categoria,
     *
     * @param      string      $post_type  The post type
     * @param      int         $qtd        The qtd
     * @param      string      $taxonomy   The taxonomy
     * @param      string      $tax_terms  The tax terms
     * @param      string      $order      The order
     *
     * @return     array|null  The posts by tax.
     */
    public static function getPostsByTax(string $post_type, int $qtd = -1, string $taxonomy = '',
                                         string $tax_terms = '', string $order = 'DESC'): ?array
    {
        $args = [
            'post_type'   => $post_type, 'posts_per_page' => $qtd,
            'post_status' => 'publish',
            'orderby'     => 'id', 'order' => $order,
        ];

        // validando se tem a categoria(taxonomia) e o termo
        if (!empty($taxonomy) && !empty($tax_terms)) {
            $args['tax_query'] =
            [[
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => [$tax_terms],
            ]];
        }

        $loop = new \WP_Query( $args );

        // se não houver posts
        if ($loop->found_posts == 0) return null;

        // atualizando os dados do post
        foreach ($loop->posts as $key => $post)
            $loop->posts[$key] = self::getPostMoreData($post);

        return ['total_posts' => $loop->found_posts, 'posts' => $loop->posts];
    }

    /**
     * getPostMoreData - Adiciona os campos personalizados ao objeto post
     *
     * @param  object $post
     * @return object
     */
    public static function getPostMoreData(object $post): object
    {
        foreach ( self::tax_sections as $slug => $title ) {
            // add default custom fields for the term
            foreach ( self::tax_sections_fields[$slug] as $field ) {
                $post->$field = get_post_meta($post->ID, $field, true);
            }
        }

        $post->img = get_the_post_thumbnail_url( $post->ID ) ?: '';

        return $post;
    }

    /*
     * define os campos personalizados padrão ao criar um novo post
     *
     * @param  string $post_id
     * @return void
     */
    public function setCustomFieldsByTax(string $post_id): void
    {
        foreach ( self::tax_sections as $slug => $title ) {
            // check if the post has the term assigned
            if ( has_term( $slug, 'section_home', $post_id ) ) {
                // add default custom fields for the term
                foreach ( self::tax_sections_fields[$slug] as $field ) {
                    add_post_meta($post_id, $field, '', true);
                }
            }
        }
    }

}

new LP();