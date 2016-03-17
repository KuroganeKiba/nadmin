<?php

	shell_exec('sudo systemctl restart kimbo.service');
	sleep(1);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;

?>