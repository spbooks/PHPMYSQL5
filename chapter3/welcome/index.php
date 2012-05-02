<?php
if (!isset($_REQUEST['firstname']))
{
	include 'form.html.php';
}
else
{
	$firstName = $_REQUEST['firstname'];
	$lastName = $_REQUEST['lastname'];
	if ($firstName == 'Kevin' and $lastName == 'Yank')
	{
		$output = 'Welcome, oh glorious leader!';
	}
	else
	{
		$output = 'Welcome to our website, ' .
				htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8') . ' ' .
				htmlspecialchars($lastName, ENT_QUOTES, 'UTF-8') . '!';
	}

	include 'welcome.html.php';
}
