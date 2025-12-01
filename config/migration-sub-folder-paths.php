<?php
 
$tenantPath = database_path('migrations');
$directories = glob("$tenantPath/*", GLOB_ONLYDIR);

array_unshift($directories, $tenantPath);

return $directories;
