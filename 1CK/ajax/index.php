<?
mb_regex_encoding('UTF-8');
/* определяем что идет Ajax-запрос */
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'):
	switch ($_GET['action']):		
		/* действие по умолчанию */
		default:
   		break;
		
		/* ВЕБ-форма «Обратная связь» */
		case 'feedback':
		  /* пустой массив для отправляемых данных */
		  $_arResult = array();
          if (isset($_REQUEST['QUEST']) && is_array($_REQUEST['QUEST']) && count($_REQUEST['QUEST']) > 0):
            /* текущий статус -- корректно */
			$_arResult['status'] = 'success';
            /* тема обращения */
			$_USER['THEME'] = htmlspecialchars(strip_tags($_REQUEST['QUEST']['THEME']));
            /* имя пользователя */
			$_USER['NAME'] = htmlspecialchars(strip_tags($_REQUEST['QUEST']['NAME']));
			/* пользователь представился и корректно заполнил поле */
			if (isset($_USER['NAME']) && !empty($_USER['NAME']) && mb_eregi('^[-\ а-яА-Яa-zA-Z]+$', $_USER['NAME'])):
		      /* контактный телефон пользователя */
		      $_USER['PHONE'] = preg_replace('/[^0-9]/', '', htmlspecialchars(strip_tags($_REQUEST['QUEST']['PHONE'])));
		      /* пользователь оставил контактный телефон и корректно заполнил поле */
		      if (isset($_USER['PHONE']) && !empty($_USER['PHONE']) && mb_eregi('^[+0-9]{10,20}$', $_USER['PHONE'])):
                /* пользователь оставил контактный E-mail */
                if (isset($_REQUEST['QUEST']['EMAIL']) && !empty($_REQUEST['QUEST']['EMAIL'])):
                  /* контактный E-mail пользователя */
                  $_USER['EMAIL'] = htmlspecialchars(strip_tags($_REQUEST['QUEST']['EMAIL']));
                  /* пользователь корректно заполнил поле E-mail */
                  if (isset($_USER['EMAIL']) && !empty($_USER['EMAIL']) && mb_eregi("^[a-z0-9\._-]+@[a-z0-9\._-]+\.[a-z]{2,10}\$", $_USER['EMAIL'])):
                    /* сопроводительное письмо пользователя */
                    $_USER['MESSAGE'] = htmlspecialchars(strip_tags($_REQUEST['QUEST']['MESSAGE']), ENT_QUOTES);
                    $headers = "Content-type: text/plain; charset=utf-8" . "\r\n";
                    $headers .= "From: 1CK <info@tarantul.zone>" . "\r\n";
                    $message = PHP_EOL.'Сообщение от пользователя '.$_USER['NAME'].PHP_EOL;
                    $message .= PHP_EOL.'_________________________________________________________________________'.PHP_EOL;
                    $message .= PHP_EOL.'IP-адрес: '.$_SERVER['REMOTE_ADDR'].PHP_EOL;
                    $message .= 'Браузер и операционная система: '.$_SERVER["HTTP_USER_AGENT"].PHP_EOL;
                    $message .= 'Страница сайта: '.htmlspecialchars(strip_tags($_REQUEST['QUEST']['PAGE']), ENT_QUOTES).' ('.$_SERVER['HTTP_REFERER'].')'.PHP_EOL;
                    $message .= 'Тема обращения: '.$_USER['THEME'].PHP_EOL;
                    if (isset($_USER['EMAIL']) && !empty($_USER['EMAIL'])):
                      $message .= PHP_EOL.'E-mail: '.$_USER['EMAIL'].PHP_EOL;
                    endif;
                    $message .= 'Телефон: '.$_USER['PHONE'].PHP_EOL;
                    if (isset($_USER['MESSAGE']) && !empty($_USER['MESSAGE'])):
                      $message .= PHP_EOL.'Сопроводительное письмо: '.$_USER['MESSAGE'].PHP_EOL;
                    endif;
                    $message .= PHP_EOL.'_________________________________________________________________________'.PHP_EOL;
                    $message .= PHP_EOL.'Это сообщение составлено и отправлено роботом, отвечать на него не нужно';
                    @mail('bo-co@ya.ru', "[ ! ][ 1CK ][ MESSAGE ]", $message, $headers);
                  else:
		            /* текущий статус -- ошибка */
		            $_arResult['status'] = 'error';
		            /* поле в котором ошибка */
		            $_arResult['field'] = 'QUEST[EMAIL]';
		            /* сообщение об ошибке */
		            $_arResult['error'] = 'некорректно заполнено поле «E-mail»';	
                  endif;
                endif;
		      /* пользователь НЕ оставил контактный телефон или некорректно заполнил поле */
		      else:
		        /* текущий статус -- ошибка */
		        $_arResult['status'] = 'error';
		        /* поле в котором ошибка */
		        $_arResult['field'] = 'QUEST[PHONE]';
		        /* сообщение об ошибке */
		        $_arResult['error'] = 'некорректно заполнено поле «Телефон»';			
		      endif;
			/* пользователь НЕ представился или некорректно заполнил поле */	
			else:
              /* текущий статус -- ошибка */
              $_arResult['status'] = 'error';
              /* поле в котором ошибка */
              $_arResult['field'] = 'QUEST[NAME]';
              /* сообщение об ошибке */
              $_arResult['error'] = 'некорректно заполнено поле «Имя пользователя»';
			endif;
          else:
            /* текущий статус -- ошибка */
			$_arResult['status'] = 'error';
			/* сообщение об ошибке */
            $_arResult['error'] = 'некорректный формат переданных данных';
          endif;
		  /* отправляем JSON-массив с данными */
   	      echo json_encode($_arResult);
		break;

	endswitch;
else:
	echo 'Not permited';
	die();
endif;
?>
