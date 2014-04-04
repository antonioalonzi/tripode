<?php
	session_start();

	require_once("services/DispatcherService.php");
	
	DispatcherService::dispatch();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= Context::getInstance()->configurationService->getConfiguration()->websiteLang ?>" dir="ltr" lang="<?= Context::getInstance()->configurationService->getConfiguration()->websiteLang ?>">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="author" content="<?= Context::getInstance()->configurationService->getConfiguration()->websiteAuthor ?>">
		<meta name="description" content="<?= Context::getInstance()->configurationService->getConfiguration()->websiteDescription ?>">
		<title><?= Context::getInstance()->configurationService->getConfiguration()->websiteName ?></title>
		
		<link rel="shortcut icon" href="img/favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="css/template.css" />
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		
		<script type="text/javascript" src="js/tripode.js"></script>
		
		<!-- gallery -->
		<link rel="stylesheet" type="text/css" href="css/gallery.css" />
		<script type="text/javascript" src="js/slimbox2.js"></script>
		<link rel="stylesheet" type="text/css" href="css/slimbox2.css" />
	</head>

	<body class="site">

		<div class="body">
			<div class="container">
				
				<header class="header" role="banner">
					<div class="clearfix">
						<a class="brand pull-left" href="index.php">
							<span class="site-title" title="<?= Context::getInstance()->configurationService->getConfiguration()->name ?>"><?= Context::getInstance()->configurationService->getConfiguration()->websiteName ?></span>
						</a>
						
						<?php Context::getInstance()->pageService->sectionEditable("websiteEdit") ?>
						
						<div class="header-search pull-right"></div>
					</div>
				</header>
				
				<nav class="navigation" role="navigation">
					<ul class="nav menu nav-pills">
						<li class="<?= Context::getInstance()->topMenuService->isActive("home") ?>">
							<a href="index.php"><?= Context::getInstance()->translationService->translate("menu.home") ?></a>
						</li>
						<li class="<?= Context::getInstance()->topMenuService->isActive("login") ?>">
							<a href="index.php?action=login"><?= Context::getInstance()->translationService->translate("menu.login") ?></a>
						</li>
						<?php if (Context::getInstance()->authenticationService->isAdminUserLoggedIn()) { ?>
							<li class="<?= Context::getInstance()->topMenuService->isActive("logout") ?>">
								<a href="index.php?action=logout"><?= Context::getInstance()->translationService->translate("menu.logout") ?></a>
							</li>
						<?php } ?>
						<li class="<?= Context::getInstance()->topMenuService->isActive("contacts") ?>">
							<a href="index.php?page=contacts"><?= Context::getInstance()->translationService->translate("menu.contacts") ?></a>
						</li>
					</ul>
				</nav>
				
				<?php if (Context::getInstance()->topMenuService->hasCurrentPage()) { ?>
					<div class="moduletable">
						<div class="custom">
							<p><img src="img/banners/blue-flower.jpg" alt="" width="100%"></p>
						</div>
					</div>
				<?php } ?>

				<div class="row-fluid">
					<main id="content" role="main" class="span9">
						<?php if ( isset($_REQUEST['ERROR']) ) { ?>
							<div class="alert alert-error"><?= Context::getInstance()->translationService->translate($_REQUEST['ERROR']) ?></div>
						<?php } ?>
						
						<?php if ( isset($_REQUEST['MESSAGE']) ) { ?>
							<div class="alert alert-success"><?= Context::getInstance()->translationService->translate($_REQUEST['MESSAGE']) ?></div>
						<?php } ?>
						
						<?php include $_REQUEST['PAGE_FILE'] ?>
					</main>
					
					<div id="aside" class="span3">
						<div class="well _menu">
							<h3 class="page-header">
								<?= Context::getInstance()->translationService->translate("gallery") ?>
								<?php Context::getInstance()->pageService->sectionEditable("galleryCategoriesEdit") ?>
							</h3>
							<ul class="nav menu">
							<?php foreach (Context::getInstance()->galleryService->getGalleryCategories() as $categoryItem) { ?>
								<li><a href="index.php?page=gallery&category=<?= $categoryItem->getName() ?>"><?= $categoryItem->getName() ?></a></li>
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php Context::getInstance()->pageService->includePopup("websiteEdit"); ?>
		<?php Context::getInstance()->pageService->includePopup("galleryCategoriesEdit"); ?>
		
		<?php if (isset($_REQUEST['OPEN_DEFAULT_POPUP'])) { ?>
			<a id="openDefaultPopup" style="display:none" href="#popup-<?= $_REQUEST['OPEN_DEFAULT_POPUP'] ?>"></a>
		<?php } ?>
		
		<footer class="footer" role="contentinfo">
			<div class="container">
				<hr>
				<p class="pull-right"><a href="#top" id="back-top"><?= Context::getInstance()->translationService->translate("back_top") ?></a></p>
				<p>© <?= Context::getInstance()->configurationService->getConfiguration()->websiteName ?> <?= date("Y") ?></p>
			</div>
		</footer>

	</body>
</html>

