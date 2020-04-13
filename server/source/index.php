<?php
require_once('./Server.php');

use \Server\Server as App;

App::SetupCors();
App::Run();