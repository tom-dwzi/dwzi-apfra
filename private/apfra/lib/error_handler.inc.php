<?php

/******************************************************************************/
/* file: error_handler.inc.php                                                */
/******************************************************************************/
/* description: error handler                                                 */
/* version: 0.23                                                              */
/* last update: 23.10.2004                                                    */
/******************************************************************************/
/* functions:                                                                 */
/* - own_error_handler($errno, $errstr, $errfile, $errline)                   */
/*   own error handler, output error message and info                         */
/******************************************************************************/

error_reporting(E_ALL);

$own_error_handler = set_error_handler("own_error_handler");

/******************************************************************************/
/* function: own_error_handler($errno, $errstr, $errfile, $errline)           */
/******************************************************************************/
/* info:                                                                      */
/*   own error handler, output error message and info                         */
/******************************************************************************/

function own_error_handler($errno, $errstr, $errfile, $errline) {

	$errmsg = "";

	switch ($errno) {

	/* E_ERROR */
	case 1:
		$errmsg = "Fatal run-time errors. These indicate errors that can not be recovered from, such as a memory allocation problem. Execution of the script is halted.";
		break;

	/* E_WARNING */
	case 2:
		$errmsg = "Run-time warnings (non-fatal errors). Execution of the script is not halted.";
		break;

	/* E_PARSE */
	case 4:
		$errmsg = "Compile-time parse errors. Parse errors should only be generated by the parser.";
		break;

	/* E_NOTICE */
	case 8:
		$errmsg = "Run-time notices. Indicate that the script encountered something that could indicate an error, but could also happen in the normal course of running a script.";
		break;

	/* E_CORE_ERROR */
	case 16:
		$errmsg = "Fatal errors that occur during PHP's initial startup. This is like an E_ERROR, except it is generated by the core of PHP.";
		break;

	/* E_CORE_WARNING */
	case 32:
		$errmsg = "Warnings (non-fatal errors) that occur during PHP's initial startup. This is like an E_WARNING, except it is generated by the core of PHP.";
		break;

	/* E_COMPILE_ERROR */
	case 64:
		$errmsg = "Fatal compile-time errors. This is like an E_ERROR, except it is generated by the Zend Scripting Engine.";
		break;

	/* E_COMPILE_WARNING */
	case 128:
		$errmsg = "Compile-time warnings (non-fatal errors). This is like an E_WARNING, except it is generated by the Zend Scripting Engine.";
		break;

	/* E_USER_ERROR */
	case 256:
		$errmsg = "User-generated error message. This is like an E_ERROR, except it is generated in PHP code by using the PHP function trigger_error().";
		break;

	/* E_USER_WARNING */
	case 512:
		$errmsg = "User-generated warning message. This is like an E_WARNING, except it is generated in PHP code by using the PHP function trigger_error().";
		break;

	/* E_USER_NOTICE */
	case 1024:
		$errmsg = "User-generated notice message. This is like an E_NOTICE, except it is generated in PHP code by using the PHP function trigger_error().";
		break;

	/* E_ALL */
	case 2047:
		$errmsg = "All errors and warnings, as supported, except of level E_STRICT.";
		break;

	/* E_STRICT */
	case 2048:
		$errmsg = "Run-time notices. Enable to have PHP suggest changes to your code which will ensure the best interoperability and forward compatibility of your code.";
		break;

	default:
		$errmsg = "Unkown error type";
		break;
	}

	if (DEF_DEBUG) {

		echo "<div class=\"alert alert-error\">";
		echo "<table class=\"table table-condensed\">";
		echo "<tbody>";
		echo "<tr>";
		echo "<td><a class=\"btn btn-danger\" href=\"#\">Danger</a> Error Number</td>";
		echo "<td>".$errno."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Error</td>";
		echo "<td>".$errstr."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Error File</td>";
		echo "<td>".$errfile."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Error Line</td>";
		echo "<td>".$errline."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Error Description</td>";
		echo "<td>".$errmsg."</td>";
		echo "</tr>";
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
	}
}

?>