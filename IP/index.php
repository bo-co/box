<?
if (empty($_PAGE['TITLE'])):
	if (intval($_PAGE['ID']) !== 1):
		$_PAGE['TITLE'] = $_PAGE['NAME'].' — первая сетевая компания (ПСК)';
	else:
		$_PAGE['TITLE'] = 'первая сетевая компания (ПСК)';
	endif;
endif;
$_SCHEME = isset($_SERVER['HTTP_SCHEME']) ? $_SERVER['HTTP_SCHEME'] : (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || 443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://');
$_arCSS = array();
$_arJS = array();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0" />
  <? if (!empty($_PAGE['KEYWORDS'])): ?>
  <meta name="keywords" content="<?=$_PAGE['KEYWORDS']?>" />
  <? endif; ?>
  <? if (!empty($_PAGE['DESCRIPTION'])): ?>
  <meta name="description" content="<?=$_PAGE['DESCRIPTION']?>" />
  <meta property="og:description" content="<?=$_PAGE['DESCRIPTION']?>" />
  <? endif; ?>
  <meta property="og:url" content="<?=$_SCHEME.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?=$_PAGE['TITLE']?>" />
  <? if (!empty($_PAGE['IMAGE']) && file_exists($_SERVER['DOCUMENT_ROOT'].$_PAGE['IMAGE'])): ?>
  <meta property="og:image" content="<?=$_SCHEME.$_SERVER['HTTP_HOST'].$_PAGE['IMAGE']?>" />
  <? endif; ?>
  <meta name="apple-mobile-web-app-title" content="1CK">
  <meta name="application-name" content="1CK">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-config" content="/favicon/browserconfig.xml?v=5ABja0P2xP">
  <meta name="theme-color" content="#ffffff">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=5ABja0P2xP">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png?v=5ABja0P2xP">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png?v=5ABja0P2xP">
  <link rel="manifest" href="/favicon/site.webmanifest?v=5ABja0P2xP">
  <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?v=5ABja0P2xP" color="#c83834">
  <?
  $_arCSS = array(
    /* '/fonts/icomoon/style.css',
    '/fonts/Roboto/style.css',
    '/resources/css/default.css',
    '/resources/css/style.css',
    '/resources/css/header.css',
    '/resources/css/burger.css',
    '/resources/css/workspace.css',
    '/resources/css/baron.css',
    '/resources/css/nav.css',
    '/resources/css/article.css',
    '/resources/css/form.css',
    '/resources/css/footer.copyright.css',
    '/resources/css/developer.css',
    '/resources/css/custom.css',
    '/resources/map/map.css' */
    '/css/template.min.css'
    );
  if (isset($arCompress['CSS']) && $arCompress['CSS'] === 'Y' && method_exists('CCompress', 'compressCSS')):
    echo '<style>';
      for ($_i=0; $_i<count($_arCSS); $_i++):
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$_arCSS[$_i])):
          $_css[$i] = str_replace('.css', '.'.filemtime($_SERVER["DOCUMENT_ROOT"].$_arCSS[$_i]).'.css', $_arCSS[$_i]);
          if (!file_exists($_SERVER['DOCUMENT_ROOT'].$_css[$i])):
            $_data = file_get_contents($_SERVER['DOCUMENT_ROOT'].$_arCSS[$_i]);
            $_data = CCompress::compressCSS($_data);
            file_put_contents($_SERVER['DOCUMENT_ROOT'].$_css[$i], $_data, LOCK_EX);
          endif;
          echo file_get_contents($_SERVER['DOCUMENT_ROOT'].$_css[$i]);
        endif;
      endfor;
    echo '</style>';
  else:
    for ($_i=0; $_i<count($_arCSS); $_i++):
      if (file_exists($_SERVER['DOCUMENT_ROOT'].$_arCSS[$_i])):
        echo '<link rel="stylesheet" href="'.$_arCSS[$_i].'?'.filemtime($_SERVER['DOCUMENT_ROOT'].$_arCSS[$_i]).'" />';
      endif;
    endfor;
  endif;
  unset($_arCSS);
  $_arJS = array(
    '/resources/js/jquery.js',
    '/resources/js/jquery.baron.js',
    '/resources/js/jquery.throttle-debounce.js',
    '/resources/js/jquery.scrollTo.js',
    '/resources/js/jquery.template.js',
    '/resources/js/jquery.form.js'
    );
  if (isset($arCompress['JS']) && $arCompress['JS'] === 'Y' && method_exists('CCompress', 'compressJS')):
    for ($_i=0; $_i<count($_arJS); $_i++):
      if (file_exists($_SERVER['DOCUMENT_ROOT'].$_arJS[$_i])):
        $_js[$i] = str_replace('.js', '.'.filemtime($_SERVER["DOCUMENT_ROOT"].$_arJS[$_i]).'.js', $_arJS[$_i]);
        if (!file_exists($_SERVER["DOCUMENT_ROOT"].$_js[$i])):
          $_data = file_get_contents($_SERVER['DOCUMENT_ROOT'].$_arJS[$_i]);
          $_data = CCompress::compressJS($_data);
          file_put_contents($_SERVER['DOCUMENT_ROOT'].$_js[$i], $_data, LOCK_EX);
        endif;
        echo '<script defer src="'.$_js[$i].'?'.filemtime($_SERVER['DOCUMENT_ROOT'].$_js[$i]).'"></script>';
      endif;
    endfor;
  else:
    for ($_i=0; $_i<count($_arJS); $_i++):
      if (file_exists($_SERVER['DOCUMENT_ROOT'].$_arJS[$_i])):
        echo '<script defer src="'.$_arJS[$_i].'?'.filemtime($_SERVER['DOCUMENT_ROOT'].$_arJS[$_i]).'"></script>';
      endif;
    endfor;
  endif;
  unset($_arJS);
  ?>
  <title><?=$_PAGE['TITLE']?></title>
</head>

<body onresize="isResize();" onload="isResize();">
  <div class="container">
    <!-- header -->
    <div class="header">
      <?
      if ($_SERVER['REQUEST_URI'] !== '/'):
        echo '<a class="logo logo-header" href="/" title="первая сетевая компания (ПСК)">
        <span class="header-logo-span logo-span"></span>
        </a>';
      else:
        echo '<span class="logo logo-header">
        <span class="header-logo-span logo-span"></span>
        </span>';
      endif;
      ?>
      <ul class="header-ul centering">
        <li class="header-ul-li header-ul-li-burger">
          <ul class="burger">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </li>
        <li class="header-ul-li header-ul-li-logo">
          <?
		  if ($_SERVER['REQUEST_URI'] !== '/'):
		    echo '<a class="logo header-logo" href="/" title="первая сетевая компания (ПСК)">
		    <span class="header-logo-span logo-span"></span>
		    </a>';
          else:
		    echo '<span class="logo header-logo">
		    <span class="header-logo-span logo-span"></span>
		    </span>';
          endif;
          ?>
        </li>
        <li class="header-ul-li header-ul-li-nav">
          <nav class="header-nav">
            <ul class="header-nav-ul">
              <?
              $_arItems = array();
              $_arItems = CPage::getElements(array('ID', 'NAME'), array('MENU_ID' => 1, 'ACTIVE' => 'Y', 'PARENT_ID' => 1), array('ORDER' => array('NUMBER'), 'SORT' => 'ASC'), false);
              if (count($_arItems)!==0):
                foreach ($_arItems as $_item):
                  echo '<li class="header-nav-ul-li">';
                  if (intval($_item['ID']) !== intval($_PAGE['ID'])):
                    echo '<a class="header-nav-ul-li-element header-nav-ul-li-a" href="'.CPage::getPageURL(intval($_item['ID'])).'" title="'.$_item['NAME'].'">
                    <span class="header-nav-ul-li-element-span">'.$_item['NAME'].'</span>
                    </a>';
                  else:
                    echo '<span class="header-nav-ul-li-element header-nav-ul-li-span">
                    <span class="header-nav-ul-li-element-span">'.$_item['NAME'].'</span>
                    </span>';                 
                  endif;
		          $_arSub = array();
		          $_arSub = CPage::getElements(array('ID', 'NAME'), array('MENU_ID' => 1, 'ACTIVE' => 'Y', 'PARENT_ID' => intval($_item['ID'])), array('ORDER' => array('NUMBER'), 'SORT' => 'ASC'), false);
                  if (count($_arSub)!==0):
                    echo '<ol class="header-submenu">';
                    foreach ($_arSub as $_sub):
                      echo '<li class="header-submenu-li">';
                        if (intval($_sub['ID']) !== intval($_PAGE['ID'])):
                          echo '<a class="header-submenu-li-element header-submenu-li-a" href="'.CPage::getPageURL(intval($_sub['ID'])).'" title="'.$_sub['NAME'].'">
                          <span class="header-submenu-li-element-span">'.$_sub['NAME'].'</span>
                          </a>';
                        else:
                          echo '<span class="header-submenu-li-element header-submenu-li-span">
                          <span class="header-submenu-li-element-span">'.$_sub['NAME'].'</span>
                          </span>';                       
                        endif;
                      echo '</li>';
                    endforeach;
                    echo '</ol>';
                  endif;
                  unset($_arSub);
                echo '</li>';
                endforeach;
              endif;
              unset($_arItems);
              ?>
              <li class="header-nav-ul-li">
                <a class="header-nav-ul-li-element header-nav-ul-li-a move" href="#" title="Контакты" data-move="feedback">
                  <span class="header-nav-ul-li-element-span">Контакты</span>
                </a>
              </li>
            </ul>
          </nav>
        </li>
        <li class="header-ul-li">
          <a class="phone header-phone" href="tel:+74742435117" title="+7 (4742) 43-51-17">
            <span class="accent header-phone-span phone-span">+7 (4742) 43-51-17</span>
            <span class="header-phone-span-comment phone-span-comment">Бесплатная консультация</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- /header -->
    <!-- workspace -->
    <div class="workspace">
      <div>
        <div class="box">
          <div>
            <span class="logo aside-logo"><span class="aside-logo-span logo-span"></span></span> <a class="phone aside-phone" href="tel:+74742435117" title="+7 (4742) 43-51-17">
              <span class="accent aside-phone-span phone-span">+7 (4742) 43-51-17</span>
              <span class="aside-phone-span-comment phone-span-comment">Бесплатная консультация</span>
            </a>
          </div>
          <div class="baron baron-nav">
            <div class="baron-scroller">
              <ul>
                <?
                $_arItems = array();
		        $_arItems = CPage::getElements(array('ID', 'NAME', 'ALIAS'), array('MENU_ID' => 2, 'ACTIVE' => 'Y', 'PARENT_ID' => 1), array('ORDER' => array('NUMBER'), 'SORT' => 'ASC'), false);
		        if (count($_arItems)!==0):
                  echo '<li>
                  <nav>
                  <ul>';
                    foreach ($_arItems as $_item):
                      $_arSub = array();
                      $_arSub = CPage::getElements(array('ID', 'NAME'), array('MENU_ID' => 2, 'ACTIVE' => 'Y', 'PARENT_ID' => intval($_item['ID'])), array('ORDER' => array('NUMBER'), 'SORT' => 'ASC'), false);
                      if (count($_arSub) > 0):
                        if (strpos($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], $_SERVER['HTTP_HOST'].'/'.$_item['ALIAS'].'/') !== false):
                          echo '<li class="more selected">';
                        else:
                          echo '<li class="more">';                           
                        endif;
                      else:
                        echo '<li>';
                      endif;
                      if (intval($_item['ID']) !== intval($_PAGE['ID'])):
                        echo '<a href="'.CPage::getPageURL(intval($_item['ID'])).'" title="'.$_item['NAME'].'">
                        <span>
                        <span>'.$_item['NAME'].'</span>
                        </span>
                        </a>';
                      else:
                        echo '<div>
                        <span>
                        <span>'.$_item['NAME'].'</span>
                        </span>
                        </div>';
                      endif;
                      if (count($_arSub) > 0):
                        echo '<span></span>';
                      endif;
                      if (count($_arSub) > 0):
                        echo '<ul>';
                        foreach ($_arSub as $_sub):
                          echo '<li>';
                          if (intval($_sub['ID']) !== intval($_PAGE['ID'])):
                            echo '<a href="'.CPage::getPageURL(intval($_sub['ID'])).'" title="'.$_sub['NAME'].'">
                            <span>
                            <span>'.$_sub['NAME'].'</span>
                            </span>
                            </a>';
                          else:
                            echo '<div>
                            <span>
                            <span>'.$_sub['NAME'].'</span>
                            </span>
                            </div>';                 
                          endif;
                          echo '</li>';
                        endforeach;
                        echo '</ul>';
                      endif;
                      unset($_arSub);
                      echo '</li>';
                    endforeach;            
                    echo '</ul>
                    </nav>
                    </li>';
                endif;
		        unset($_arItems);
		        ?>
                <li>
                  <nav>
                    <ul>
                      <?
                      $_arItems = array();
                      $_arItems = CPage::getElements(array('ID', 'NAME', 'ALIAS'), array('MENU_ID' => 1, 'ACTIVE' => 'Y', 'PARENT_ID' => 1), array('ORDER' => array('NUMBER'), 'SORT' => 'ASC'), false);
                      if (count($_arItems)!==0):
                        foreach ($_arItems as $_item):
		                  $_arSub = array();
		                  $_arSub = CPage::getElements(array('ID', 'NAME'), array('MENU_ID' => 1, 'ACTIVE' => 'Y', 'PARENT_ID' => intval($_item['ID'])), array('ORDER' => array('NUMBER'), 'SORT' => 'ASC'), false);
		                  if (count($_arSub) > 0):
                            if (strpos($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], $_SERVER['HTTP_HOST'].'/'.$_item['ALIAS'].'/') !== false):
                             echo '<li class="more selected">';
                            else:
                             echo '<li class="more">';                           
                            endif;
		                  else:
                            echo '<li>';
		                  endif;
		                  if (intval($_item['ID']) !== intval($_PAGE['ID'])):
                            echo '<a href="'.CPage::getPageURL(intval($_item['ID'])).'" title="'.$_item['NAME'].'">
                            <span>
                            <span>'.$_item['NAME'].'</span>
                            </span>
                            </a>';
		                  else:
                            echo '<div>
                            <span>
                            <span>'.$_item['NAME'].'</span>
                            </span>
                            </div>';
		                  endif;
		                  if (count($_arSub) > 0):
                            echo '<span></span>';
		                  endif;
		                  if (count($_arSub) > 0):
                            echo '<ul>';
                            foreach ($_arSub as $_sub):
                              echo '<li>';
                              if (intval($_sub['ID']) !== intval($_PAGE['ID'])):
                                echo '<a href="'.CPage::getPageURL(intval($_sub['ID'])).'" title="'.$_sub['NAME'].'">
                                <span>
                                <span>'.$_sub['NAME'].'</span>
                                </span>
                                </a>';
                              else:
                                echo '<div>
                                <span>
                                <span>'.$_sub['NAME'].'</span>
                                </span>
                                </div>';                 
                              endif;
                              echo '</li>';
                            endforeach;
                            echo '</ul>';
		                  endif;
		                  unset($_arSub);
                          echo '</li>';
                        endforeach;
                      endif;
                      unset($_arItems);
                      ?>
                      <li>
                        <a class="move" href="#" title="Контакты" data-move="feedback">
                          <span>
                            <span>Контакты</span>
                          </span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </li>
              </ul>
            </div>
            <div class="baron-track">
              <div class="baron-bar"></div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="box">
          <span></span>
          <div></div>
          <div class="baron baron-article">
            <div class="baron-scroller">
              <ul>
                <!-- article -->
                <li>
                  <article>
                  </article>
                </li>
                <!-- /article -->
                <!-- footer -->
                <li class="footer-li">
                  <footer class="alignment">
                    <div id="feedback" class="form feedback">
                      <div>
                        <span>Оставьте заявку</span>
                        <span>Спасибо!</span>
                        <blockquote>Оставьте контактные данные и кратко опишите суть вопроса, который необходимо обсудить</blockquote>
                        <blockquote>Ваше сообщение успешно отправлено. В ближайшее время с Вами свяжется наш специалист и ответит на все, интересующие Вас, вопросы.</blockquote>
                      </div>
                      <form name="feedback" method="post" action="#">
                        <input type="hidden" name="QUEST[PAGE]" value="<?=$_PAGE['NAME']?>" data-form="feedback" />
                        <ul>
                          <li>
                            <div class="accent">
                              <span>Свяжитесь с нами</span>
                            </div>
                          </li>
                          <li>
                            <div class="choose utheme">
                              <label>
                                <input class="field" type="text" name="QUEST[THEME]" value="" readonly="readonly" data-form="feedback" data-list="utheme" />
                                <span>Тема обращения</span>
                              </label>
                            </div>
                          </li>
                        </ul>
                        <ul class="hide utheme">
                          <li>
                            <div class="required">
                              <label class="required">
                                <input class="field" type="text" name="QUEST[NAME]" value="" data-form="feedback" data-check="name" />
                                <span>Имя</span>
                              </label>
                            </div>
                            <div class="required">
                              <label class="required">
                                <input class="field" type="tel" name="QUEST[PHONE]" value="" data-form="feedback" data-check="phone" />
                                <span>Телефон</span>
                              </label>
                            </div>
                            <div>
                              <label>
                                <input class="field" type="email" name="QUEST[EMAIL]" value="" data-form="feedback" data-check="email" />
                                <span>E-mail</span>
                              </label>
                            </div>
                          </li>
                          <li>
                            <div class="textarea">
                              <label>
                                <textarea class="field" name="QUEST[MESSAGE]" data-form="feedback"></textarea>
                                <span>Сопроводительное письмо</span>
                              </label>
                            </div>
                          </li>
                        </ul>
                        <ol class="hide utheme">
                          <li>
                            <div class="consent">
                              <span>
                                <span>Нажимая на кнопку «<strong>ОТПРАВИТЬ</strong>»,<br />я соглашаюсь с</span>
                                <a href="/policy/" title="политикой конфиденциальности">политикой конфиденциальности</a> </span>
                            </div>
                          </li>
                          <li>
                            <div>
                              <button class="accent" type="button" data-form="feedback">ОТПРАВИТЬ</button>
                            </div>
                          </li>
                        </ol>
                      </form>
                    </div>
                    <div class="map-footer">
                      <div class="map-footer-div">
                        <div id="map" class="map"></div>
                        <div class="map-footer-wave"></div>
                      </div>
                    </div>
                    <div class="footer centering copyright">
                      <span><?=date('Y')?> © Первая сетевая компания</span><br />
                      <a href="maito:1ck@urbexgroup.ru" title="1ck@urbexgroup.ru">1ck@urbexgroup.ru</a>
                      <a class="developer" href="https://www.tarantul.zone/" title="разработка сайта" target="_blank" rel="noopener"></a>
                    </div>
                  </footer>
                </li>
                <!-- /footer -->
              </ul>
            </div>
            <div class="baron-track">
              <div class="baron-bar"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /workspace -->
  </div>
</body>

</html>
