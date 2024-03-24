<?php

const APP_PATH = "/indy-lab";
const PAGE_PATH = __ROOT__ . "/pages";
const INC_PATH = __ROOT__ . "/inc";
const CONTROLLER_PATH = __ROOT__ . "/controllers";
const SERVICE_PATH = __ROOT__ . "/services";
const CONSTANT_PATH = __ROOT__ . "/constants";

require_once("db.php");

require_once(SERVICE_PATH . "/index.php");
require_once(CONTROLLER_PATH . "/index.php");
require_once(INC_PATH . "/Router.php");
require_once("route.php");