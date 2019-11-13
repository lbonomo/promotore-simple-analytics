<?php

require_once 'SimpleAnalyticsAdmin.php';
require_once 'SimpleAnalyticsHead.php';

class SimpleAnalytics {

    public function __construct() {
        $admin_page = new SimpleAnalyticsAdmin();
        $head = new SimpleAnalyticsHead();
    }
}
