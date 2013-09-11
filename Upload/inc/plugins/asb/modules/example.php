<?php
/*
 * Plug-in Name: Advanced Sidebox for MyBB 1.6.x
 * Copyright 2013 WildcardSearch
 * http://www.wildcardsworld.com
 *
 * this is an example of the simplest version of an ASB add-on
 */

// Include a check for Advanced Sidebox
if(!defined("IN_MYBB") || !defined("IN_ASB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

function asb_example_info()
{
	global $lang;

	if(!$lang->asb_addon)
	{
		$lang->load('asb_addon');
	}

	return array
	(
		"title"				=>	$lang->asb_example1_title,
		"description"		=>	$lang->asb_example1_desc,
		"wrap_content"	=>	true,
		"version"			=>	"1"
	);
}

// this function is called when it is time to display your box
function asb_example_build_template($args)
{
	foreach(array('settings', 'template_var') as $key)
	{
		$$key = $args[$key];
	}

	/*
	 * using variable variables (thanks Euan T.) we declare the template variable as global here and eval() its contents.
	 */
	global $$template_var; //<-- this is necessary

	/*
	 * set any variables in your template (or string as in this case) here just before the eval()
	 *
	 * note the structure, this content should appropriate (and validate) as the contents of an HTML <tbody> element in structure and content.
	 */
	$hello_world = <<<EOF
		<tr>
					<td class=\"trow1\">Same from either side.</td>
				</tr>
EOF;

	// then we will set the modules template variable by eval()ing its contents to the variable we declared global above
	eval("\$" . $template_var . " = \"" . $hello_world . "\";");

	// return true if your box has something to show, or false if it doesn't.
	return true;
}

?>
