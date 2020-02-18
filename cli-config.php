<?php

require_once "bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($containerBuilder->get("entity_manager"));
