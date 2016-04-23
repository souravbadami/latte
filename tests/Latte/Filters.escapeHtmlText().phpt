<?php

/**
 * Test: Latte\Runtime\Filters::escapeHtmlText
 */

use Latte\Runtime\Filters;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';


class Test implements Latte\Runtime\IHtmlString
{
	function __toString()
	{
		return '<br>';
	}
}

Assert::same('', Filters::escapeHtmlText(NULL));
Assert::same('1', Filters::escapeHtmlText(1));
Assert::same('&lt;br&gt;', Filters::escapeHtmlText('<br>'));
Assert::same('&lt; &amp; \' " &gt;', Filters::escapeHtmlText('< & \' " >'));
Assert::same('<br>', Filters::escapeHtmlText(new Test));
Assert::same('<br>', Filters::escapeHtmlText(new Latte\Runtime\Html('<br>')));
Assert::same('`hello', Filters::escapeHtmlText('`hello'));
