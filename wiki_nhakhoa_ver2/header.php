<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wiki_nhakhoa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Google Tag Manager quynv-->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PDJDP3H');</script>
	<!-- End Google Tag Manager -->
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Dentist",
			"name": "Wiki Nha Khoa - Nền Tảng Kết Nối Cơ Sở, Bác Sĩ Nha Khoa Toàn Diện",
			"image": "https://wikinhakhoa.com/wp-content/themes/vhea-heath/images/logo.svg",
			"@id": "",
			"url": "https://wikinhakhoa.com/",
			"telephone": "028.38382699",
			"priceRange": "500000-1000000",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "179 Nguyễn Văn Thương, phường 25, Bình Thạnh",
				"addressLocality": "Thành Phố Hồ Chí Minh",
				"postalCode": "700000",
				"addressCountry": "VN"
			},
			"geo": {
				"@type": "GeoCoordinates",
				"latitude": 10.8036801,
				"longitude": 106.721264
			},
			"openingHoursSpecification": {
				"@type": "OpeningHoursSpecification",
				"dayOfWeek": [
				"Monday",
				"Tuesday",
				"Wednesday",
				"Thursday",
				"Friday",
				"Saturday",
				"Sunday"
				],
				"opens": "08:00",
				"closes": "17:00"
			},
			"sameAs": [
			"https://www.gamesbids.com/forums/profile/103960-wiki-nha-khoa/",
			"https://tapas.io/wikinhakhoa2020",
			"https://www.zippyshare.com/wikinhakhoa"
			] 
		}
	</script>
	
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7070587444088541"
	crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDJDP3H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<?php 
	$options = get_option('wiki-theme-options');
	$id_logo_desk = isset($options['logo-wiki-desk']) ? $options['logo-wiki-desk'][0] : '';
	$number_phone = isset($options['numberphone']) ? $options['numberphone'] : '#';
	$url = wp_get_attachment_url( $id_logo_desk );
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wiki_nhakhoa' ); ?></a>
	 <header class="page-header">
        <div class="container">
            <div class="row header-content">
                <div class="col-6 col-md-4 logo">
                    <a href="<?php echo get_home_url(); ?>"><img src="<?php echo $url;?>" alt=""></a>
                </div>
                <div class="col-6 col-md-8">
					<div class="inner-header">
						<form action="<?php echo home_url(); ?>" class="form-inline search-form search-form-desk d-none d-md-block">
							<input name="s" class="search-header form-control" type="text" placeholder="Tìm kiếm...">
							<button class="btn btn-search" type="submit">
								<img src="<?php echo THEME_URI; ?>/images/icons/searching.svg" alt="">
							</button>
						</form>
						<div class="number-phone">
							<a href="tel:<?php echo $number_phone; ?>" class="link-header">
								<img src="<?php echo THEME_URI; ?>/images/icons/phone.svg" alt="" class="img">
								<div class="info d-none d-md-block">
									<span class="item">Hotline</span>
									<span class="item"><?php echo $number_phone; ?></span>
								</div>
							</a>
						</div>
						<div class="connect">
							<a href="#" class="link-header">
								<img src="<?php echo THEME_URI; ?>/images/icons/connect.svg" alt="" class="img">
								<div class="info d-none d-md-block">
									<span class="item">Kết nối</span>
									<span class="item">với Wiki Nha Khoa</span>
								</div>
							</a>
						</div>
						<div class="connect d-block d-md-none menu-mb">
							<a href="#" class="link">
								<img src="<?php echo THEME_URI; ?>/images/icons/icon_menu.svg" alt="" class="img">
							</a>
						</div>
					</div>
                </div>
            </div>
            <nav class="navbar navbar-expand-md primary-nav">
                <div class="collapse navbar-collapse collapse-primary" id="primary-nav-collapse">
                    <form action="" class="form-inline search-form search-form-desk d-flex d-md-none">
                        <input name="s" class="search-header form-control" type="text" placeholder="Tìm kiếm...">
                        <button class="btn btn-search" type="submit">
                            <img src="<?php echo THEME_URI; ?>/images/icons/searching.svg" alt="">
                        </button>
                    </form>
					<?php 
					if(has_nav_menu('primary-menu')){
						wp_nav_menu(
							array(
								'theme_location'  => 'primary-menu',
								'container'       => '',
								'container_id'    => '',
								'container_class' => '',
								'menu_id'         => false,
								'menu_class'      => 'navbar-nav main-menu',
								'depth'           => 2,
								'fallback_cb'     => 'BootstrapNavMenuWalker::fallback',
								'walker'          => new BootstrapNavMenuWalker()
							)
						);
					}
					?>
                </div>
            </nav>
        </div>
    </header>
