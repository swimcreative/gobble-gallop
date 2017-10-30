<button class="menu-toggle animated" aria-expanded="false" >
	<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'gobble' ); ?></span>
	<span class="genericon genericon-menu"></span>
</button>

<nav id="primary" class="site-navigation" role="navigation">
		<ul class="main-menu menu">
		<?php
				wp_nav_menu( array(
						'menu'           => 'Primary Left',
						'container_class'		=> 'main-menu',
						'depth'             => 2,
						'container'         => false,
						'items_wrap' 				=> '%3$s'
				) ); ?>
			</ul>
			<ul class="main-menu menu">

				<?php

				wp_nav_menu( array(
						'menu'           => 'Primary Right',
						'container_class'				=> 'main-menu',
						'depth'             => 2,
						'container'         => false,
						'items_wrap' 				=> '%3$s'
				) ); ?>

			</ul> <?php

				//add search form search-toggle
				//echo '<li id="site-search" class="search-toggle">' . get_search_form( false ) . '</li>';
		?>
	</ul>
</nav><!-- #site-navigation -->
