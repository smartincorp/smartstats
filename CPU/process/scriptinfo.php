<?php

    $info_url = file_get_contents("https://smartclashcoc.com/api.php?action=CheckUpdateSmartStats");
    $info = json_decode($info_url);
    
    /* Getting information for api
    ______________________________________*/
    
    $developer_name = $info->developername;
    $script_type = $info->versionType;
    $script_version = $info->version;
    $script_github = $info->github;
    $script_name = $info->Appname;
    $script_download = $info->download;
    $script_support = $info->support;

    /* Local information
    ______________________________________*/
    
    $version = "3.0";
?>