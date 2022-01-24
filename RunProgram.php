<?php
//This way I can include the Program.php without running it.
//It is a separation of concern.

require 'Program.php';

Program::getInstance()->run();

