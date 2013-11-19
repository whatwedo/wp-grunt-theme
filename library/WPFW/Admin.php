<?php
namespace WPFW;

class Admin
{
    public static $rssWidgets = array(
        'macprime.ch' => 'http://feeds.feedburner.com/macprime'
    );

    public static $loginLogo = "";

    public static $adminFooter = '<span id="footer-thankyou">Developed with &hearts; by <a href="http://whatwedo.ch" target="_blank">whatwedo.ch</a></span> in Bern.';

    public function __construct()
    {
        self::$loginLogo = get_bloginfo('template_directory') . '/images/wordpress/login-logo.png';

        // removes Dashboard Widgets 
        add_action('admin_menu', array(&$this, 'removeWidgets'));

        // adds RSS Widget(s)
        add_action('wp_dashboard_setup', array(&$this, 'addRssWidgets'));

        // changes the Logo-URL to Blog-URL
        add_filter('login_headerurl', array(&$this, 'changeLoginUrl'));

        // changes the Login-Title to Blog Name
        add_filter('login_headertitle', array(&$this, 'changeLoginTitle'));

        // changes the Login Logo
        add_action('login_enqueue_scripts', array(&$this, 'changeLoginLogo'));

        // changes the Admin footer
        add_filter('admin_footer_text', array(&$this, 'changeAdminFooter'));

        // set WP SEO by Yoast Plugin Metabox Position
        apply_filters( 'wpseo_metabox_prio', 'low' );

        // Hide Site Analysis of WP SEO because we're using Advanced Custom Fields
        add_filter('wpseo_use_page_analysis', '__return_false');
    }

    public function removeWidgets()
    {
        // WordPress Core Widgets
        remove_meta_box('dashboard_right_now', 'dashboard', 'core');       // Right Now Widget
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
        remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

        remove_meta_box('dashboard_quick_press', 'dashboard', 'core');      // Quick Press Widget
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');    // Recent Drafts Widget
        remove_meta_box('dashboard_primary', 'dashboard', 'core');          //
        remove_meta_box('dashboard_secondary', 'dashboard', 'core');        //

        // WordPress Plugin Widgets
        remove_meta_box('yoast_db_widget', 'dashboard', 'normal');          // Yoast's SEO Plugin Widget

        // WordPress Welcome Screen
        remove_action( 'welcome_panel', 'wp_welcome_panel' );
    }

    public function addRssWidgets()
    {
        if (function_exists('fetch_feed')) {
            $i = 0;
            foreach (self::$rssWidgets as $title => $feed) {
                $i++;
                wp_add_dashboard_widget('wpfw_custom_rss_widget_' . $i, $title, array(&$this, 'createRssWidget'));
            }
        }
    }

    public function createRssWidget()
    {
        require_once(ABSPATH . WPINC . '/feed.php');

        $url = array_shift(self::$rssWidgets);
        $feed = fetch_feed($url);
        $limit = $feed->get_item_quantity(8);
        $items = $feed->get_items(0, $limit);

        if ($limit == 0) {
            echo '<div>The RSS Feed is either empty or unavailable.</div>';
            return;
        }

        foreach ($items as $item) {
            ?>
            <h4 style="margin-bottom: 0;">
                <a href="<?php echo $item->get_permalink(); ?>" title="<?php echo mysql2date('d.m.Y H:i:s', $item->get_date( 'Y-m-d H:i:s' ) ); ?>" target="_blank">
                    <?php echo $item->get_title(); ?>
                </a>
            </h4>
            <p style="margin-top: 0.5em;">
                <?php echo substr($item->get_description(), 0, 200); ?>
            </p>
            <?php
        }
    }

    public function changeLoginUrl()
    {
        return home_url();
    }

    public function changeLoginTitle()
    {
        return get_option('blogname');
    }

    public function changeLoginLogo()
    {
?>
        <style type="text/css">
            body.login div#login h1 a {
                background-image: url(<?php echo self::$loginLogo; ?>);
                padding-bottom: 0;
                height: 150px;
                background-size: contain;
                background-position: center center;
                margin-bottom: 15px;
            }
        </style>
<?php
    }

    public function changeAdminFooter()
    {
        return self::$adminFooter;
    }

}