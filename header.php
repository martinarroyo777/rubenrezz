<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Coach
 */
    /**
     * Doctype Hook
     *
     * @hooked blossom_coach_doctype
    */
    do_action( 'blossom_coach_doctype' );
?>
<head itemscope itemtype="http://schema.org/WebSite">
	<?php
    /**
     * Before wp_head
     *
     * @hooked blossom_coach_head
    */
    do_action( 'blossom_coach_before_wp_head' );

    wp_head(); ?>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/b5fdb8b55cd95ade402f985a9/168ac44ab55cb7fe2e1e250eb.js");</script>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php

    wp_body_open();

    do_action( 'blossom_coach_before_header' );
?>

    <div class="header-container">
      <header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
        <!-- Search bar logic -->
        <?php
          $ed_search = get_theme_mod( 'ed_header_search', false );
          if( $ed_search ){
              echo '<div class="header-search"><button aria-label="search form toggle"><i class="fa fa-search"></i></button><div class="header-search-form"><button aria-label="search form close" class="close"></button>';
              get_search_form();
              echo '</div></div><!-- .header-seearch -->';
          }
        ?>
        <div class="main-header">
			       <div class="wrapper">
                <?php
                  $site_title = get_bloginfo( 'name' );
                  $site_description = get_bloginfo( 'description', 'display' );
                  $header_text    = get_theme_mod( 'header_text', 1 );
                  if( has_custom_logo() || $site_title || $site_description || $header_text ) :
                      if( has_custom_logo() && ( $site_title || $site_description ) && $header_text ) {
                          $branding_class = ' icon-text';
                      }else{
                        $branding_class = '';
                      } ?>
    				<div class="site-branding<?php echo esc_attr( $branding_class ); ?>" itemscope itemtype="http://schema.org/Organization">
                <?php
                  if( has_custom_logo() ){
                      echo '<div class="site-logo">';
                      the_custom_logo();
                      echo '</div><!-- .site-logo -->';
                  }
                ?>
                <?php if( $site_title || $site_description ) :
    					    if( $branding_class ) echo '<div class="site-title-wrap">';
    						  if ( is_front_page() ) : ?>
                    <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                  <?php endif;
                      $description = get_bloginfo( 'description', 'display' );
                      if ( $description || is_customize_preview() ){ ?>
                          <p class="site-description"><?php echo esc_html( $description ); ?></p>
                      <?php
                      }
                        if( $branding_class ) echo '</div>';
                        endif; ?>
            </div><!-- .site-branding -->
                <?php endif; ?>
        <!-- Menu Items -->
				<div id="menu-social-wrap"class="menu-wrap">
					<nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <button type="button" class="toggle-button">
                            <span class="toggle-bar"></span>
                            <span class="toggle-bar"></span>
                            <span class="toggle-bar"></span>
                        </button>
                        <?php
            				wp_nav_menu( array(
            					'theme_location' => 'primary',
            					'menu_id'        => 'primary-menu',
                                'fallback_cb'    => 'blossom_coach_primary_menu_fallback',
            				) );
            			?>
          </nav><!-- #site-navigation -->
          <?php if( blossom_coach_is_woocommerce_activated() && $ed_cart ) blossom_coach_wc_cart_count(); ?>

          <!-- Social Media Icons -->
          <div class="social-media">
            <?php
              blossom_coach_social_links();
            ?>
          </div>
        </div><!-- .menu-wrap -->
			</div><!-- .wrapper -->
		</div><!-- .main-header -->
      </header>
    </div>
