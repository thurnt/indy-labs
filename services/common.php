<?php

function home_url($path): string
{
    return APP_PATH . '/' . $path;
}

function isCurrentUrl($path): bool
{
    return $_SERVER['REQUEST_URI'] == home_url($path);
}

function assets_url($path): string
{
    return APP_PATH . '/assets/' . $path;
}

function get_template_part($filePath, $variables = null)
{
    if (file_exists(PAGE_PATH . '/' . $filePath)) {
        // Extract the variables to a local namespace
        if ($variables) {
            extract($variables);
        }

        // Include the template file
        include PAGE_PATH . '/' . $filePath;
    } else {
        include PAGE_PATH . '/' . "auth-404-alt.php";
    }
}

function renderTimeAgo($updatedTime)
{
    $now = time();
    $updated = strtotime($updatedTime);
    $timeDiff = $now - $updated;
    $minutesDiff = floor($timeDiff / 60);
    $hoursDiff = floor($minutesDiff / 60);

    if ($hoursDiff < 1) {
        return $minutesDiff . ($minutesDiff === 1 ? ' minute ago' : ' minutes ago');
    } elseif ($hoursDiff < 24) {
        return $hoursDiff . ($hoursDiff === 1 ? ' hour ago' : ' hours ago');
    } else {
        // Format the date if it's greater than a day
        return date('M j, Y', $updated);
    }
}
