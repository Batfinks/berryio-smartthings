<?
/*------------------------------------------------------------------------------
  BerryIO Upgrade Command
------------------------------------------------------------------------------*/

$title = 'Version Upgrade';

// Load the version control functions
require_once(FUNCTIONS.'version.php');

// Make sure we are in CLI mode
if($GLOBALS['EXEC_MODE'] != 'cli')
  $content = command('check_version');
else
  version_upgrade();
