<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - policyManager-AuthApi
 * Last Updated - 8/11/2023
 */

use App\Controllers\MigrationController;
use App\Framework\Facades\CommandLine;

CommandLine::register("Migration make {class}","make", MigrationController::class);