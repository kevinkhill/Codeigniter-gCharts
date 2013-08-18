<?php //netteCache[01]000368a:2:{s:4:"time";s:21:"0.21024000 1373787955";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:48:"R:\bin\PHP\apigen\templates\default\source.latte";i:2;i:1347168410;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: R:\bin\PHP\apigen\templates\default\source.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '1v9xvjca1o')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb74f7258c42_title')) { function _lb74f7258c42_title($_l, $_args) { extract($_args)
?>File <?php echo Nette\Templating\Helpers::escapeHtml($fileName, ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb36d49271d0_content')) { function _lb36d49271d0_content($_l, $_args) { extract($_args)
?><pre><code><?php echo $template->replaceRE($template->sourceAnchors($source), '~<span class="line">(\\s*(\\d+):\\s*)</span>([^\\n]*\\n)?~', '<span id="$2" class="l"><a class="l" href="#$2">$1</a>$3</span>') ?></code></pre>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = '@layout.latte'; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
 $robots = false ?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 