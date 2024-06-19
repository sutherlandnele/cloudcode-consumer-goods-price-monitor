<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Get Joomla session
define( '_JEXEC', 1 );
define( 'DS', '/' );
define( 'JPATH_BASE', $_SERVER['DOCUMENT_ROOT']);

class Common {

        var $CI;
        var $jusername;
        var $user_profile = array();
        var $juser_token;

        public function __construct()
        {
            $this->CI = & get_instance();
            $this->CI->load->model('User_Model', 'user_model');
			//$this->juser_init();     
			
			$this->jusername = 'suthzy';
    
			if($this->jusername){
					$this->user_profile = $this->CI->user_model->get_by_username($this->jusername);
			}
        }

        // public function jinit(){

        //         require_once (JPATH_BASE .DS. 'includes' .DS. 'defines.php');
        //         require_once (JPATH_BASE .DS.'includes'.DS.'framework.php');
        //         require_once(JPATH_BASE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');

        //         $mainframe = JFactory::getApplication('site');
        //         $mainframe->initialise();
        //         jimport('joomla.user.user');
        //         jimport('joomla.session.session');
        //         jimport('joomla.user.authentication');  
        //         jimport('joomla.html.html'); 
        // }

        // public function get_joomla_article_route($article_id_slug, $cat_id_slug)
        // {
        //         $article_route = JRoute::_(ContentHelperRoute::getArticleRoute($article_id_slug, $cat_id_slug));
        //         return $article_route;
        // }

        // private function juser_init(){

        //         require_once ( JPATH_BASE .DS. 'includes' .DS. 'defines.php' );
        //         require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
        //         $mainframe = JFactory::getApplication('site');
        //         $mainframe->initialise();
        //         jimport( 'joomla.user.user');
        //         jimport( 'joomla.session.session');
        //         jimport( 'joomla.user.authentication');  
        //          $this->jinit();          
        //          $user = JFactory::getUser();  
        //          $this->jusername = $user->username;
        //          $this->juser_token = JSession::getFormToken();
    
                 
        //         // $this->jusername = 'suthzy';
    
        //         if($this->jusername){
        //              $this->user_profile = $this->CI->user_model->get_by_username($this->jusername);
        //         }
        //     }

		// public function cleanIntrotext($introtext)
		// {
		// 	$introtext = str_replace('<p>', ' ', $introtext);
		// 	$introtext = str_replace('</p>', ' ', $introtext);
		// 	$introtext = strip_tags($introtext, '<a><em><strong>');

		// 	$introtext = trim($introtext);

		// 	return $introtext;
		// 	}
			
		// public function truncate($html, $maxLength = 0)
		// {
		// 			$this->jinit();

		// 	$baseLength = strlen($html);
		// 	$diffLength = 0;

		// 	// First get the plain text string. This is the rendered text we want to end up with.
		// 	$ptString = JHtml::_('string.truncate', $html, $maxLength, $noSplit = true, $allowHtml = false);

		// 	for ($maxLength; $maxLength < $baseLength;)
		// 	{
		// 		// Now get the string if we allow html.
		// 		$htmlString = JHtml::_('string.truncate', $html, $maxLength, $noSplit = true, $allowHtml = true);

		// 		// Now get the plain text from the html string.
		// 		$htmlStringToPtString = JHtml::_('string.truncate', $htmlString, $maxLength, $noSplit = true, $allowHtml = false);

		// 		// If the new plain text string matches the original plain text string we are done.
		// 		if ($ptString == $htmlStringToPtString)
		// 		{
		// 			return $htmlString;
		// 		}
		// 		// Get the number of html tag characters in the first $maxlength characters
		// 		$diffLength = strlen($ptString) - strlen($htmlStringToPtString);

		// 		// Set new $maxlength that adjusts for the html tags
		// 		$maxLength += $diffLength;
		// 		if ($baseLength <= $maxLength || $diffLength <= 0)
		// 		{
		// 			return $htmlString;
		// 		}
		// 	}
		// 	return $html;
		// }

		// public function lnd_limittext($text,$allowed_tags,$limit)
		// {
		// 	$strip = strip_tags($text);
		// 	$endText = (strlen($strip) > $limit) ? "&nbsp;[&nbsp;...&nbsp;]" : "";
		// 	if ($limit == 0) $endText = "";
		// 	$strip = substr($strip, 0, $limit);
		// 	$striptag = strip_tags($text, $allowed_tags);
		// 	$lentag = strlen($striptag);

		// 	$display = "";

		// 	$x = 0;
		// 	$ignore = true;
		// 	for($n = 0; $n < $limit; $n++) {
		// 		for($m = $x; $m < $lentag; $m++) {
		// 			$x++;
		// 			$striptag_m = (!empty($striptag[$m])) ? $striptag[$m] : null;
		// 			if($striptag[$m] == "<") {
		// 				$ignore = false;
		// 			} else if($striptag[$m] == ">") {
		// 				$ignore = true;
		// 			}
		// 			if($ignore == true) {
		// 				$strip_n = (!empty($strip[$n])) ? $strip[$n] : null;
		// 				if($strip[$n] != $striptag[$m]) {
		// 					$display .= $striptag[$m];
		// 				} else {
		// 					$display .= $strip[$n];
		// 					break;
		// 				}
		// 			} else {
		// 				$display .= $striptag[$m];
		// 			}
		// 			}
		// 	}
		// 			if ($limit == 0)  
		// 					return $this->fix_tags ('');
		// 			else 
		// 					return $this->fix_tags('<p>'.$display.$endText.'</p>');
		// }

		// public function unhtmlentities($string)
		// {
		// 	// replace numeric entities
		// 	$string = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $string);
		// 	$string = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $string);
		// 	// replace literal entities
		// 	$trans_tbl = get_html_translation_table(HTML_ENTITIES);
		// 	$trans_tbl = array_flip($trans_tbl);
		// 	return strtr($string, $trans_tbl);
		// }

		// private function fix_tags($html) {
		//   $result = "";
		//   $tag_stack = array();

		//   // these corrections can simplify the regexp used to parse tags
		//   // remove whitespaces before '/' and between '/' and '>' in autoclosing tags
		//   $html = preg_replace("#\s*/\s*>#is","/>",$html);
		//   // remove whitespaces between '<', '/' and first tag letter in closing tags
		//   $html = preg_replace("#<\s*/\s*#is","</",$html);
		//   // remove whitespaces between '<' and first tag letter
		//   $html = preg_replace("#<\s+#is","<",$html);

		//   while (preg_match("#(.*?)(<([a-z\d]+)[^>]*/>|<([a-z\d]+)[^>]*(?<!/)>|</([a-z\d]+)[^>]*>)#is",$html,$matches)) {
		// 	$result .= $matches[1];
		// 	$html = substr($html, strlen($matches[0]));

		// 	// Closing tag
		// 	if (isset($matches[5])) {
		// 	  $tag = $matches[5];

		// 	  if ($tag == $tag_stack[0]) {
		// 		// Matched the last opening tag (normal state)
		// 		// Just pop opening tag from the stack
		// 		array_shift($tag_stack);
		// 		$result .= $matches[2];
		// 	  } elseif (array_search($tag, $tag_stack)) {
		// 		// We'll never should close 'table' tag such way, so let's check if any 'tables' found on the stack
		// 		$no_critical_tags = !array_search('table',$tag_stack);
		// 		if (!$no_critical_tags) {
		// 		  $no_critical_tags = (array_search('table',$tag_stack) >= array_search($tag, $tag_stack));
		// 		};

		// 		if ($no_critical_tags) {
		// 		  // Corresponding opening tag exist on the stack (somewhere deep)
		// 		  // Note that we can forget about 0 value returned by array_search, becaus it is handled by previous 'if'

		// 		  // Insert a set of closing tags for all non-matching tags
		// 		  $i = 0;
		// 		  while ($tag_stack[$i] != $tag) {
		// 			$result .= "</{$tag_stack[$i]}> ";
		// 			$i++;
		// 		  };

		// 		  // close current tag
		// 		  $result .= "</{$tag_stack[$i]}> ";
		// 		  // remove it from the stack
		// 		  array_splice($tag_stack, $i, 1);
		// 		  // if this tag is not "critical", reopen "run-off" tags
		// 		  $no_reopen_tags = array("tr","td","table","marquee","body","html");
		// 		  if (array_search($tag, $no_reopen_tags) === false) {
		// 			while ($i > 0) {
		// 			  $i--;
		// 			  $result .= "<{$tag_stack[$i]}> ";
		// 			};
		// 		  } else {
		// 			array_splice($tag_stack, 0, $i);
		// 		  };
		// 		};
		// 	  } else {
		// 		// No such tag found on the stack, just remove it (do nothing in out case, as we have to explicitly
		// 		// add things to result
		// 	  };
		// 	} elseif (isset($matches[4])) {
		// 	  // Opening tag
		// 	  $tag = $matches[4];
		// 	  array_unshift($tag_stack, $tag);
		// 	  $result .= $matches[2];
		// 	} else {
		// 	  // Autoclosing tag; do nothing specific
		// 	  $result .= $matches[2];
		// 	};
		//   };

		//   // Close all tags left
		//   while (count($tag_stack) > 0) {
		// 	$tag = array_shift($tag_stack);
		// 	$result .= "</".$tag.">";
		//   }

		//   return $result;
		// }
   
}