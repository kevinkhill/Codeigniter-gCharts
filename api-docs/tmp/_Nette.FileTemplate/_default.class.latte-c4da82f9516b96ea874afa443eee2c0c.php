<?php //netteCache[01]000367a:2:{s:4:"time";s:21:"0.41387800 1371269664";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:47:"R:\bin\PHP\apigen\templates\default\class.latte";i:2;i:1347168410;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: R:\bin\PHP\apigen\templates\default\class.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '4b1d43p616')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb10d311723a_title')) { function _lb10d311723a_title($_l, $_args) { extract($_args)
;if ($class->deprecated): ?>Deprecated <?php endif ;if ($class->interface): ?>Interface<?php elseif ($class->trait): ?>
Trait<?php else: ?>Class<?php endif ?> <?php echo Nette\Templating\Helpers::escapeHtml($class->name, ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb5927fc4d9f_content')) { function _lb5927fc4d9f_content($_l, $_args) { extract($_args)
?><div id="content" class="class">
	<h1<?php if ($_l->tmp = array_filter(array($class->deprecated ? 'deprecated':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><?php if ($class->interface): ?>Interface<?php elseif ($class->trait): ?>Trait<?php else: ?>
Class<?php endif ?> <?php echo Nette\Templating\Helpers::escapeHtml($class->shortName, ENT_NOQUOTES) ?></h1>

<?php if ($class->valid): ?>

<?php if ($template->longDescription($class)): ?>	<div class="description">
	<?php echo $template->longDescription($class) ?>

	</div>
<?php endif ?>

<?php if ($class->parentClass || $class->ownInterfaces || $class->ownTraits): ?>	<dl class="tree">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($tree) as $item): ?>
		<dd style="padding-left:<?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeCss(($iterator->counter - 1) * 30)) ?>px">
<?php if ($iterator->counter > 1): ?>			<img src="resources/inherit.png" alt="Extended by" />
<?php endif ;if ($item->documented): if ($_l->ifs[] = (!$iterator->last)): ?>			<a href="<?php echo htmlSpecialChars($template->classUrl($item)) ?>
"><?php endif ;if ($iterator->isLast()): ?><b><?php endif ?><span<?php if ($_l->tmp = array_filter(array($item->deprecated ? 'deprecated':null, !$item->valid ? 'invalid':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><?php echo Nette\Templating\Helpers::escapeHtml($item->name, ENT_NOQUOTES) ?></span><?php if ($iterator->isLast()): ?>
</b><?php endif ;if (array_pop($_l->ifs)): ?></a>
<?php endif ?>
			<?php else: echo Nette\Templating\Helpers::escapeHtml($item->name, ENT_NOQUOTES) ;endif ?>

<?php $itemOwnInterfaces = $item->ownInterfaces ?>
			<?php if ($itemOwnInterfaces): ?> implements <?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($itemOwnInterfaces) as $interface): ?>

<?php if ($_l->ifs[] = ($interface->documented)): ?>				<a href="<?php echo htmlSpecialChars($template->classUrl($interface)) ?>
"><?php endif ?>
<span<?php if ($_l->tmp = array_filter(array($interface->deprecated ? 'deprecated':null, !$interface->valid ? 'invalid':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><?php echo Nette\Templating\Helpers::escapeHtml($interface->name, ENT_NOQUOTES) ?>
</span><?php if (array_pop($_l->ifs)): ?></a><?php endif ;if (!$iterator->isLast()): ?>
, <?php endif ?>

			<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;endif ?>

<?php $itemOwnTraits = $item->ownTraits ?>
			<?php if ($itemOwnTraits): ?> uses <?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($itemOwnTraits) as $trait): ?>

<?php if ($_l->ifs[] = ($trait->documented)): ?>				<a href="<?php echo htmlSpecialChars($template->classUrl($trait)) ?>
"><?php endif ?>
<span<?php if ($_l->tmp = array_filter(array($trait->deprecated ? 'deprecated':null, !$trait->valid ? 'invalid':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><?php echo Nette\Templating\Helpers::escapeHtml($trait->name, ENT_NOQUOTES) ?></span><?php if (array_pop($_l->ifs)): ?>
</a><?php endif ;if (!$iterator->isLast()): ?>, <?php endif ?>

			<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;endif ?>

		</dd>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</dl>
<?php endif ?>


<?php if ($directSubClasses): ?>	<div>
		<h4>Direct known subclasses</h4>
<?php call_user_func(reset($_l->blocks['children']), $_l, array('children' => $directSubClasses) + get_defined_vars()) ?>
	</div>
<?php endif ?>

<?php if ($indirectSubClasses): ?>	<div>
		<h4>Indirect known subclasses</h4>
<?php call_user_func(reset($_l->blocks['children']), $_l, array('children' => $indirectSubClasses) + get_defined_vars()) ?>
	</div>
<?php endif ?>

<?php if ($directImplementers): ?>	<div>
		<h4>Direct known implementers</h4>
<?php call_user_func(reset($_l->blocks['children']), $_l, array('children' => $directImplementers) + get_defined_vars()) ?>
	</div>
<?php endif ?>

<?php if ($indirectImplementers): ?>	<div>
		<h4>Indirect known implementers</h4>
<?php call_user_func(reset($_l->blocks['children']), $_l, array('children' => $indirectImplementers) + get_defined_vars()) ?>
	</div>
<?php endif ?>

<?php if ($directUsers): ?>	<div>
		<h4>Direct Known Users</h4>
<?php call_user_func(reset($_l->blocks['children']), $_l, array('children' => $directUsers) + get_defined_vars()) ?>
	</div>
<?php endif ?>

<?php if ($indirectUsers): ?>	<div>
		<h4>Indirect Known Users</h4>
<?php call_user_func(reset($_l->blocks['children']), $_l, array('children' => $indirectUsers) + get_defined_vars()) ?>
	</div>
<?php endif ?>

	<div class="info">
		<?php if (!$class->interface && !$class->trait && ($class->abstract || $class->final)): ?>
<b><?php if ($class->abstract): ?>Abstract<?php else: ?>Final<?php endif ?></b><br /><?php endif ?>

		<?php if ($class->internal): ?><b>PHP Extension:</b> <a href="<?php echo htmlSpecialChars($template->manualUrl($class->extension)) ?>
" title="Go to PHP documentation"><?php echo Nette\Templating\Helpers::escapeHtml($template->firstUpper($class->extension->name), ENT_NOQUOTES) ?>
</a><br /><?php endif ?>

		<?php if ($class->inNamespace()): ?><b>Namespace:</b> <?php echo $template->namespaceLinks($class->namespaceName) ?>
<br /><?php endif ?>

		<?php if ($class->inPackage()): ?><b>Package:</b> <?php echo $template->packageLinks($class->packageName) ?>
<br /><?php endif ?>


<?php $iterations = 0; foreach ($template->annotationSort($template->annotationFilter($class->annotations)) as $annotation => $values): $iterations = 0; foreach ($values as $value): ?>
				<b><?php echo Nette\Templating\Helpers::escapeHtml($template->annotationBeautify($annotation), ENT_NOQUOTES) ;if ($value): ?>
:<?php endif ?></b>
				<?php echo $template->annotation($value, $annotation, $class) ?><br />
<?php $iterations++; endforeach ;$iterations++; endforeach ?>
		<?php if ($class->internal): ?><b>Documented at</b> <a href="<?php echo htmlSpecialChars($template->manualUrl($class)) ?>
" title="Go to PHP documentation">php.net</a><?php else: ?><b>Located at</b> <?php if ($_l->ifs[] = ($config->sourceCode)): ?>
<a href="<?php echo htmlSpecialChars($template->sourceUrl($class)) ?>" title="Go to source code"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($template->relativePath($class->fileName), ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ;endif ?><br />
	</div>

<?php $ownMethods = $class->ownMethods ;$ownMagicMethods = $class->ownMagicMethods ?>


<?php if ($ownMethods): ?>	<table class="summary" id="methods">
	<caption>Methods summary</caption>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($ownMethods) as $method): call_user_func(reset($_l->blocks['method']), $_l, array('method' => $method) + get_defined_vars()) ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</table>
<?php endif ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($class->inheritedMethods) as $parentName => $methods): ?>	<table class="summary inherited">
	<caption>Methods inherited from <?php if ($_l->ifs[] = ($template->getClass($parentName))): ?>
<a href="<?php echo htmlSpecialChars($template->classUrl($parentName)) ?>#methods"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($parentName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</caption>
	<tr>
		<td><code>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($methods) as $method): if ($_l->ifs[] = ($template->getClass($parentName))): ?>
			<a href="<?php echo htmlSpecialChars($template->methodUrl($method)) ?>"><?php endif ;if ($_l->ifs[] = ($method->deprecated)): ?>
<span class="deprecated"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($method->name, ENT_NOQUOTES) ?>
()<?php if (array_pop($_l->ifs)): ?></span><?php endif ;if (array_pop($_l->ifs)): ?>
</a><?php endif ;if (!$iterator->isLast()): ?>, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</code></td>
	</tr>
	</table>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($class->usedMethods) as $traitName => $methods): ?>	<table class="summary used">
	<caption>Methods used from <?php if ($_l->ifs[] = ($template->getClass($traitName))): ?>
<a href="<?php echo htmlSpecialChars($template->classUrl($traitName)) ?>#methods"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($traitName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</caption>
	<tr>
		<td><code>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($methods) as $data): if ($_l->ifs[] = ($template->getClass($traitName))): ?>
			<a href="<?php echo htmlSpecialChars($template->methodUrl($data['method'], $data['method']->declaringTrait)) ?>
"><?php endif ;if ($_l->ifs[] = ($data['method']->deprecated)): ?><span class="deprecated"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($data['method']->originalName, ENT_NOQUOTES) ?>
()<?php if (array_pop($_l->ifs)): ?></span><?php endif ;if (array_pop($_l->ifs)): ?>
</a><?php endif ;if ($data['aliases']): ?>(as <?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($data['aliases']) as $alias): if ($_l->ifs[] = ($data['method']->deprecated)): ?>
<span class="deprecated"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($alias->name, ENT_NOQUOTES) ?>
()<?php if (array_pop($_l->ifs)): ?></span><?php endif ;if (!$iterator->isLast()): ?>
, <?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
)<?php endif ;if (!$iterator->isLast()): ?>, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</code></td>
	</tr>
	</table>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php if ($ownMagicMethods): ?>	<table class="summary" id="methods">
	<caption>Magic methods summary</caption>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($ownMagicMethods) as $method): call_user_func(reset($_l->blocks['method']), $_l, array('method' => $method) + get_defined_vars()) ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</table>
<?php endif ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($class->inheritedMagicMethods) as $parentName => $methods): ?>	<table class="summary inherited">
	<caption>Magic methods inherited from <?php if ($_l->ifs[] = ($template->getClass($parentName))): ?>
<a href="<?php echo htmlSpecialChars($template->classUrl($parentName)) ?>#methods"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($parentName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</caption>
	<tr>
		<td><code>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($methods) as $method): if ($_l->ifs[] = ($template->getClass($parentName))): ?>
			<a href="<?php echo htmlSpecialChars($template->methodUrl($method)) ?>"><?php endif ;if ($_l->ifs[] = ($method->deprecated)): ?>
<span class="deprecated"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($method->name, ENT_NOQUOTES) ?>
()<?php if (array_pop($_l->ifs)): ?></span><?php endif ;if (array_pop($_l->ifs)): ?>
</a><?php endif ;if (!$iterator->isLast()): ?>, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</code></td>
	</tr>
	</table>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($class->usedMagicMethods) as $traitName => $methods): ?>	<table class="summary used">
	<caption>Magic methods used from <?php if ($_l->ifs[] = ($template->getClass($traitName))): ?>
<a href="<?php echo htmlSpecialChars($template->classUrl($traitName)) ?>#methods"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($traitName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</caption>
	<tr>
		<td><code>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($methods) as $data): if ($_l->ifs[] = ($template->getClass($traitName))): ?>
			<a href="<?php echo htmlSpecialChars($template->methodUrl($data['method'], $data['method']->declaringTrait)) ?>
"><?php endif ;if ($_l->ifs[] = ($data['method']->deprecated)): ?><span class="deprecated"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($data['method']->originalName, ENT_NOQUOTES) ?>
()<?php if (array_pop($_l->ifs)): ?></span><?php endif ;if (array_pop($_l->ifs)): ?>
</a><?php endif ;if ($data['aliases']): ?>(as <?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($data['aliases']) as $alias): if ($_l->ifs[] = ($data['method']->deprecated)): ?>
<span class="deprecated"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($alias->name, ENT_NOQUOTES) ?>
()<?php if (array_pop($_l->ifs)): ?></span><?php endif ;if (!$iterator->isLast()): ?>
, <?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
)<?php endif ;if (!$iterator->isLast()): ?>, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</code></td>
	</tr>
	</table>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>


<?php $ownConstants = $class->ownConstants ?>

<?php if ($ownConstants): ?>	<table class="summary" id="constants">
	<caption>Constants summary</caption>
<?php $iterations = 0; foreach ($ownConstants as $constant): ?>	<tr data-order="<?php echo htmlSpecialChars($constant->name) ?>
" id="<?php echo htmlSpecialChars($constant->name) ?>">
<?php $annotations = $constant->annotations ?>

		<td class="attributes"><code><?php echo $template->typeLinks($constant->typeHint, $constant) ?></code></td>
		<td class="name"><code>
<?php if ($class->internal): ?>
				<a href="<?php echo htmlSpecialChars($template->manualUrl($constant)) ?>" title="Go to PHP documentation"><b><?php echo Nette\Templating\Helpers::escapeHtml($constant->name, ENT_NOQUOTES) ?></b></a>
<?php else: if ($_l->ifs[] = ($config->sourceCode)): ?>				<a href="<?php echo htmlSpecialChars($template->sourceUrl($constant)) ?>
" title="Go to source code"><?php endif ?>
<b><?php echo Nette\Templating\Helpers::escapeHtml($constant->name, ENT_NOQUOTES) ?>
</b><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ;endif ?>
		</code></td>
		<td class="value"><code><?php echo $template->highlightValue($constant->valueDefinition, $class) ?></code></td>
		<td class="description"><div>
			<a href="#<?php echo htmlSpecialChars($constant->name) ?>" class="anchor">#</a>

<?php if ($config->template['options']['elementDetailsCollapsed']): ?>
			<div class="description short">
				<?php echo $template->shortDescription($constant, true) ?>

			</div>
<?php endif ?>

			<div<?php if ($_l->tmp = array_filter(array('description', 'detailed', $config->template['options']['elementDetailsCollapsed'] ? 'hidden':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
				<?php echo $template->longDescription($constant) ?>


<?php $iterations = 0; foreach ($template->annotationSort($template->annotationFilter($annotations, array('var'))) as $annotation => $descriptions): ?>
					<h4><?php echo Nette\Templating\Helpers::escapeHtml($template->annotationBeautify($annotation), ENT_NOQUOTES) ?></h4>
					<div class="list">
<?php $iterations = 0; foreach ($descriptions as $description): if ($description): ?>
							<?php echo $template->annotation($description, $annotation, $constant) ?><br />
<?php endif ;$iterations++; endforeach ?>
					</div>
<?php $iterations++; endforeach ?>
			</div>
		</div></td>
	</tr>
<?php $iterations++; endforeach ?>
	</table>
<?php endif ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($class->inheritedConstants) as $parentName => $constants): ?>	<table class="summary inherited">
	<caption>Constants inherited from <?php if ($_l->ifs[] = ($template->getClass($parentName))): ?>
<a href="<?php echo htmlSpecialChars($template->classUrl($parentName)) ?>#constants"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($parentName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</caption>
	<tr>
		<td><code>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($constants) as $constant): if ($_l->ifs[] = ($template->getClass($parentName))): ?>
			<a href="<?php echo htmlSpecialChars($template->constantUrl($constant)) ?>"><?php endif ?>
<b><?php if ($_l->ifs[] = ($constant->deprecated)): ?><span class"deprecated"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($constant->name, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</span><?php endif ?>
</b><?php if (array_pop($_l->ifs)): ?></a><?php endif ;if (!$iterator->isLast()): ?>
, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</code></td>
	</tr>
	</table>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>


<?php $ownProperties = $class->ownProperties ;$ownMagicProperties = $class->ownMagicProperties ?>

<?php if ($ownProperties): ?>	<table class="summary" id="properties">
	<caption>Properties summary</caption>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($ownProperties) as $property): call_user_func(reset($_l->blocks['property']), $_l, array('property' => $property) + get_defined_vars()) ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</table>
<?php endif ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($class->inheritedProperties) as $parentName => $properties): ?>	<table class="summary inherited">
	<caption>Properties inherited from <?php if ($_l->ifs[] = ($template->getClass($parentName))): ?>
<a href="<?php echo htmlSpecialChars($template->classUrl($parentName)) ?>#properties"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($parentName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</caption>
	<tr>
		<td><code>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($properties) as $property): if ($_l->ifs[] = ($template->getClass($parentName))): ?>
			<a href="<?php echo htmlSpecialChars($template->propertyUrl($property)) ?>"><?php endif ?>
<var><?php if ($_l->ifs[] = ($property->deprecated)): ?><span class="deprecated"><?php endif ?>
$<?php echo Nette\Templating\Helpers::escapeHtml($property->name, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</span><?php endif ?>
</var><?php if (array_pop($_l->ifs)): ?></a><?php endif ;if (!$iterator->isLast()): ?>
, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</code></td>
	</tr>
	</table>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($class->usedProperties) as $traitName => $properties): ?>	<table class="summary used">
	<caption>Properties used from <?php if ($_l->ifs[] = ($template->getClass($traitName))): ?>
<a href="<?php echo htmlSpecialChars($template->classUrl($traitName)) ?>#properties"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($traitName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</caption>
	<tr>
		<td><code>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($properties) as $property): if ($_l->ifs[] = ($template->getClass($traitName))): ?>
			<a href="<?php echo htmlSpecialChars($template->propertyUrl($property, $property->declaringTrait)) ?>
"><?php endif ?>
<var><?php if ($_l->ifs[] = ($property->deprecated)): ?><span class="deprecated"><?php endif ?>
$<?php echo Nette\Templating\Helpers::escapeHtml($property->name, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</span><?php endif ?>
</var><?php if (array_pop($_l->ifs)): ?></a><?php endif ;if (!$iterator->isLast()): ?>
, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</code></td>
	</tr>
	</table>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php if ($ownMagicProperties): ?>	<table class="summary" id="magicProperties">
	<caption>Magic properties summary</caption>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($ownMagicProperties) as $property): call_user_func(reset($_l->blocks['property']), $_l, array('property' => $property) + get_defined_vars()) ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</table>
<?php endif ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($class->inheritedMagicProperties) as $parentName => $properties): ?>	<table class="summary inherited">
	<caption>Magic properties inherited from <?php if ($_l->ifs[] = ($template->getClass($parentName))): ?>
<a href="<?php echo htmlSpecialChars($template->classUrl($parentName)) ?>#properties"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($parentName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</caption>
	<tr>
		<td><code>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($properties) as $property): if ($_l->ifs[] = ($template->getClass($parentName))): ?>
			<a href="<?php echo htmlSpecialChars($template->propertyUrl($property)) ?>"><?php endif ?>
<var><?php if ($_l->ifs[] = ($property->deprecated)): ?><span class="deprecated"><?php endif ?>
$<?php echo Nette\Templating\Helpers::escapeHtml($property->name, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</span><?php endif ?>
</var><?php if (array_pop($_l->ifs)): ?></a><?php endif ;if (!$iterator->isLast()): ?>
, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</code></td>
	</tr>
	</table>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($class->usedMagicProperties) as $traitName => $properties): ?>	<table class="summary used">
	<caption>Magic properties used from <?php if ($_l->ifs[] = ($template->getClass($traitName))): ?>
<a href="<?php echo htmlSpecialChars($template->classUrl($traitName)) ?>#properties"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($traitName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</caption>
	<tr>
		<td><code>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($properties) as $property): if ($_l->ifs[] = ($template->getClass($traitName))): ?>
			<a href="<?php echo htmlSpecialChars($template->propertyUrl($property, $property->declaringTrait)) ?>
"><?php endif ?>
<var><?php if ($_l->ifs[] = ($property->deprecated)): ?><span class="deprecated"><?php endif ?>
$<?php echo Nette\Templating\Helpers::escapeHtml($property->name, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</span><?php endif ?>
</var><?php if (array_pop($_l->ifs)): ?></a><?php endif ;if (!$iterator->isLast()): ?>
, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		</code></td>
	</tr>
	</table>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php else: ?>
		<div class="invalid">
			<p>
				Documentation of this class could not be generated.
			</p>
			<p>
				Class was originally declared in <?php echo Nette\Templating\Helpers::escapeHtml($template->relativePath($class->fileName), ENT_NOQUOTES) ?> and is invalid because of:
			</p>
			<ul>
<?php $iterations = 0; foreach ($class->reasons as $reason): ?>				<li>Class was redeclared in <?php echo Nette\Templating\Helpers::escapeHtml($template->relativePath($reason->getSender()->getFileName()), ENT_NOQUOTES) ?>.</li>
<?php $iterations++; endforeach ?>
			</ul>
		</div>
<?php endif ?>
</div>
<?php
}}

//
// block children
//
if (!function_exists($_l->blocks['children'][] = '_lbe7401a218d_children')) { function _lbe7401a218d_children($_l, $_args) { extract($_args)
;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($children) as $child): if ($_l->ifs[] = ($child->documented)): ?>
			<a href="<?php echo htmlSpecialChars($template->classUrl($child)) ?>"><?php endif ;if ($_l->ifs[] = ($child->deprecated)): ?>
<span class="deprecated"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($child->name, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</span><?php endif ;if (array_pop($_l->ifs)): ?></a><?php endif ;if (!$iterator->isLast()): ?>
, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;
}}

//
// block method
//
if (!function_exists($_l->blocks['method'][] = '_lb2f0bb50c04_method')) { function _lb2f0bb50c04_method($_l, $_args) { extract($_args)
?>	<tr data-order="<?php echo htmlSpecialChars($method->name) ?>" id="<?php if ($method->magic): ?>
m<?php endif ?>_<?php echo htmlSpecialChars($method->name) ?>">
<?php $annotations = $method->annotations ?>

		<td class="attributes"><code>
			<?php if (!$class->interface && $method->abstract): ?>abstract<?php elseif ($method->final): ?>
final<?php endif ?> <?php if ($method->protected): ?>protected<?php elseif ($method->private): ?>
private<?php else: ?>public<?php endif ?> <?php if ($method->static): ?>static<?php endif ?>

			<?php if (isset($annotations['return'])): echo $template->typeLinks($annotations['return'][0], $method) ;endif ?>

			<?php if ($method->returnsReference()): ?>&amp;<?php endif ?>

			</code>
		</td>

		<td class="name"><div>
		<a class="anchor" href="#<?php if ($method->magic): ?>m<?php endif ?>_<?php echo htmlSpecialChars($method->name) ?>">#</a>
		<code><?php ob_start() ?>

<?php if ($class->internal): ?>
				<a href="<?php echo htmlSpecialChars($template->manualUrl($method)) ?>" title="Go to PHP documentation"><?php echo Nette\Templating\Helpers::escapeHtml($method->name, ENT_NOQUOTES) ?></a>(
<?php else: if ($_l->ifs[] = ($config->sourceCode)): ?>				<a href="<?php echo htmlSpecialChars($template->sourceUrl($method)) ?>
" title="Go to source code"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($method->name, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
(
<?php endif ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($method->parameters) as $parameter): ?>
				<span><?php echo $template->typeLinks($parameter->typeHint, $method) ?>

				<var><?php if ($parameter->passedByReference): ?>&amp; <?php endif ?>$<?php echo Nette\Templating\Helpers::escapeHtml($parameter->name, ENT_NOQUOTES) ?>
</var><?php if ($parameter->defaultValueAvailable): ?> = <?php echo $template->highlightPHP($parameter->defaultValueDefinition, $class) ;elseif ($parameter->unlimited): ?>
,…<?php endif ?></span><?php if (!$iterator->isLast()): ?>, <?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
		)<?php echo $template->strip(ob_get_clean()) ?></code>

<?php if ($config->template['options']['elementDetailsCollapsed']): ?>
		<div class="description short">
			<?php echo $template->shortDescription($method, true) ?>

		</div>
<?php endif ?>

		<div<?php if ($_l->tmp = array_filter(array('description', 'detailed', $config->template['options']['elementDetailsCollapsed'] ? 'hidden':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
			<?php echo $template->longDescription($method) ?>


<?php if (!$class->deprecated && $method->deprecated): ?>
				<h4>Deprecated</h4>
<?php if (isset($annotations['deprecated'])): ?>
				<div class="list">
<?php $iterations = 0; foreach ($annotations['deprecated'] as $description): if ($description): ?>
						<?php echo $template->annotation($description, 'deprecated', $method) ?><br />
<?php endif ;$iterations++; endforeach ?>
				</div>
<?php endif ;endif ?>

<?php if ($method->parameters && isset($annotations['param'])): ?>
				<h4>Parameters</h4>
				<div class="list"><dl>
<?php $iterations = 0; foreach ($method->parameters as $parameter): ?>
					<dt><var>$<?php echo Nette\Templating\Helpers::escapeHtml($parameter->name, ENT_NOQUOTES) ?>
</var><?php if ($parameter->unlimited): ?>,…<?php endif ?></dt>
					<dd><?php if (isset($annotations['param'][$parameter->position])): echo $template->annotation($annotations['param'][$parameter->position], 'param', $method) ;endif ?></dd>
<?php $iterations++; endforeach ?>
				</dl></div>
<?php endif ?>

<?php if (isset($annotations['return']) && 'void' !== $annotations['return'][0]): ?>
				<h4>Returns</h4>
				<div class="list">
<?php $iterations = 0; foreach ($annotations['return'] as $description): ?>
					<?php echo $template->annotation($description, 'return', $method) ?><br />
<?php $iterations++; endforeach ?>
				</div>
<?php endif ?>

<?php if (isset($annotations['throws'])): ?>
				<h4>Throws</h4>
				<div class="list">
<?php $iterations = 0; foreach ($annotations['throws'] as $description): ?>
					<?php echo $template->annotation($description, 'throws', $method) ?><br />
<?php $iterations++; endforeach ?>
				</div>
<?php endif ?>

<?php $iterations = 0; foreach ($template->annotationSort($template->annotationFilter($annotations, array('deprecated', 'param', 'return', 'throws'))) as $annotation => $descriptions): ?>
				<h4><?php echo Nette\Templating\Helpers::escapeHtml($template->annotationBeautify($annotation), ENT_NOQUOTES) ?></h4>
				<div class="list">
<?php $iterations = 0; foreach ($descriptions as $description): if ($description): ?>
						<?php echo $template->annotation($description, $annotation, $method) ?><br />
<?php endif ;$iterations++; endforeach ?>
				</div>
<?php $iterations++; endforeach ?>

<?php $overriddenMethod = $method->overriddenMethod ;if ($overriddenMethod): ?>
				<h4>Overrides</h4>
				<div class="list"><code><?php if ($_l->ifs[] = ($template->getClass($overriddenMethod->declaringClassName))): ?>
<a href="<?php echo htmlSpecialChars($template->methodUrl($overriddenMethod)) ?>
"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($overriddenMethod->prettyName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</code></div>
<?php endif ?>

<?php $implementedMethod = $method->implementedMethod ;if ($implementedMethod): ?>
				<h4>Implementation of</h4>
				<div class="list"><code><?php if ($_l->ifs[] = ($template->getClass($implementedMethod->declaringClassName))): ?>
<a href="<?php echo htmlSpecialChars($template->methodUrl($implementedMethod)) ?>
"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($implementedMethod->prettyName, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</code></div>
<?php endif ?>
		</div>
		</div></td>
	</tr>
<?php
}}

//
// block property
//
if (!function_exists($_l->blocks['property'][] = '_lbfe4385b82a_property')) { function _lbfe4385b82a_property($_l, $_args) { extract($_args)
?>	<tr data-order="<?php echo htmlSpecialChars($property->name) ?>" id="<?php if ($property->magic): ?>
m<?php endif ?>$<?php echo htmlSpecialChars($property->name) ?>">
		<td class="attributes"><code>
			<?php if ($property->protected): ?>protected<?php elseif ($property->private): ?>
private<?php else: ?>public<?php endif ?> <?php if ($property->static): ?>static<?php endif ?>
 <?php if ($property->readOnly): ?>read-only<?php elseif ($property->writeOnly): ?>
write-only<?php endif ?>

			<?php echo $template->typeLinks($property->typeHint, $property) ?>

		</code></td>

		<td class="name">
<?php if ($class->internal): ?>
				<a href="<?php echo htmlSpecialChars($template->manualUrl($property)) ?>" title="Go to PHP documentation"><var>$<?php echo Nette\Templating\Helpers::escapeHtml($property->name, ENT_NOQUOTES) ?></var></a>
<?php else: if ($_l->ifs[] = ($config->sourceCode)): ?>				<a href="<?php echo htmlSpecialChars($template->sourceUrl($property)) ?>
" title="Go to source code"><?php endif ?>
<var>$<?php echo Nette\Templating\Helpers::escapeHtml($property->name, ENT_NOQUOTES) ?>
</var><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ;endif ?>
		</td>
<?php if (!$property->magic): ?>		<td class="value"><code><?php echo $template->highlightValue($property->defaultValueDefinition, $class) ?></code></td>
<?php endif ?>
		<td class="description"><div>
			<a href="#<?php if ($property->magic): ?>m<?php endif ?>$<?php echo htmlSpecialChars($property->name) ?>" class="anchor">#</a>

<?php if ($config->template['options']['elementDetailsCollapsed']): ?>
			<div class="description short">
				<?php echo $template->shortDescription($property, true) ?>

			</div>
<?php endif ?>

			<div<?php if ($_l->tmp = array_filter(array('description', 'detailed', $config->template['options']['elementDetailsCollapsed'] ? 'hidden':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
				<?php echo $template->longDescription($property) ?>


<?php $iterations = 0; foreach ($template->annotationSort($template->annotationFilter($property->annotations, array('var'))) as $annotation => $descriptions): ?>
					<h4><?php echo Nette\Templating\Helpers::escapeHtml($template->annotationBeautify($annotation), ENT_NOQUOTES) ?></h4>
					<div class="list">
<?php $iterations = 0; foreach ($descriptions as $description): if ($description): ?>
							<?php echo $template->annotation($description, $annotation, $property) ?><br />
<?php endif ;$iterations++; endforeach ?>
					</div>
<?php $iterations++; endforeach ?>
			</div>
		</div></td>
	</tr>
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
 $active = 'class' ?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 