<?php //netteCache[01]000370a:2:{s:4:"time";s:21:"0.75141900 1373787960";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:50:"R:\bin\PHP\apigen\templates\default\function.latte";i:2;i:1347168410;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: R:\bin\PHP\apigen\templates\default\function.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'nhvsumno64')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbf56bb16cda_title')) { function _lbf56bb16cda_title($_l, $_args) { extract($_args)
;if ($function->deprecated): ?>Deprecated <?php endif ?>Function <?php echo Nette\Templating\Helpers::escapeHtml($function->name, ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbfcc27627e7_content')) { function _lbfcc27627e7_content($_l, $_args) { extract($_args)
?><div id="content" class="function">
	<h1<?php if ($_l->tmp = array_filter(array($function->deprecated ? 'deprecated':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
>Function <?php echo Nette\Templating\Helpers::escapeHtml($function->shortName, ENT_NOQUOTES) ?></h1>

<?php if ($function->valid): ?>

<?php if ($template->longDescription($function)): ?>	<div class="description">
	<?php echo $template->longDescription($function) ?>

	</div>
<?php endif ?>

	<div class="info">
		<?php if ($function->inNamespace()): ?><b>Namespace:</b> <?php echo $template->namespaceLinks($function->namespaceName) ?>
<br /><?php endif ?>

		<?php if ($function->inPackage()): ?><b>Package:</b> <?php echo $template->packageLinks($function->packageName) ?>
<br /><?php endif ?>

<?php $iterations = 0; foreach ($template->annotationSort($template->annotationFilter($function->annotations, array('param', 'return', 'throws'))) as $annotation => $values): $iterations = 0; foreach ($values as $value): ?>
				<b><?php echo Nette\Templating\Helpers::escapeHtml($template->annotationBeautify($annotation), ENT_NOQUOTES) ;if ($value): ?>
:<?php endif ?></b>
				<?php echo $template->annotation($value, $annotation, $function) ?><br />
<?php $iterations++; endforeach ;$iterations++; endforeach ?>
		<b>Located at</b> <?php if ($_l->ifs[] = ($config->sourceCode)): ?><a href="<?php echo htmlSpecialChars($template->sourceUrl($function)) ?>
" title="Go to source code"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($template->relativePath($function->fileName), ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
<br />
	</div>

<?php $annotations = $function->annotations ?>

<?php if ($function->numberOfParameters): ?>	<table class="summary" id="parameters">
	<caption>Parameters summary</caption>
<?php $iterations = 0; foreach ($function->parameters as $parameter): ?>	<tr id="$<?php echo htmlSpecialChars($parameter->name) ?>">
		<td class="name"><code><?php echo $template->typeLinks($parameter->typeHint, $function) ?></code></td>
		<td class="value"><code><?php ob_start() ?>

			<var><?php if ($parameter->passedByReference): ?>&amp; <?php endif ?>$<?php echo Nette\Templating\Helpers::escapeHtml($parameter->name, ENT_NOQUOTES) ?>
</var><?php if ($parameter->defaultValueAvailable): ?> = <?php echo $template->highlightPHP($parameter->defaultValueDefinition, $function) ;elseif ($parameter->unlimited): ?>
,…<?php endif ?>

		<?php echo $template->strip(ob_get_clean()) ?></code></td>
		<td>
			<?php if (isset($annotations['param'][$parameter->position])): echo $template->description($annotations['param'][$parameter->position], $parameter) ;endif ?>

		</td>
	</tr>
<?php $iterations++; endforeach ?>
	</table>
<?php endif ?>

<?php if (isset($annotations['return']) && 'void' !== $annotations['return'][0]): ?>	<table class="summary" id="returns">
	<caption>Return value summary</caption>
	<tr>
		<td class="name"><code>
			<?php echo $template->typeLinks($annotations['return'][0], $function) ?>

		</code></td>
		<td>
			<?php echo $template->description($annotations['return'][0], $function) ?>

		</td>
	</tr>
	</table>
<?php endif ?>

<?php if (isset($annotations['throws'])): ?>	<table class="summary" id="throws">
	<caption>Thrown exceptions summary</caption>
<?php $iterations = 0; foreach ($annotations['throws'] as $throws): ?>	<tr>
		<td class="name"><code>
			<?php echo $template->typeLinks($throws, $function) ?>

		</code></td>
		<td>
			<?php echo $template->description($throws, $function) ?>

		</td>
	</tr>
<?php $iterations++; endforeach ?>
	</table>
<?php endif ?>

<?php else: ?>
		<div class="invalid">
			<p>
				Documentation of this function could not be generated.
			</p>
			<p>
				Function was originally declared in <?php echo Nette\Templating\Helpers::escapeHtml($template->relativePath($function->fileName), ENT_NOQUOTES) ?> and is invalid because of:
			</p>
			<ul>
<?php $iterations = 0; foreach ($function->reasons as $reason): ?>				<li>Function was redeclared in <?php echo Nette\Templating\Helpers::escapeHtml($template->relativePath($reason->getSender()->getFileName()), ENT_NOQUOTES) ?>.</li>
<?php $iterations++; endforeach ?>
			</ul>
		</div>
<?php endif ?>
</div>
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
 $active = 'function' ?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 