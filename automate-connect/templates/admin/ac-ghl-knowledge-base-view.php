<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}
?>
<style>

    .tab {
        overflow: hidden;
        background-color: #f1f1f1;
    }
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }
    .tab button:hover {
        background-color: #ddd;
    }
    .tab button.active {
        background-color: #0073e6;
        color: white;
    }
    .navigation-links {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        width: calc(100% + 30px);
    }
    .prev-post:hover, .next-post:hover {
        color: #fff;
    }
    #wpbody-content {
        width: calc(100% - 50px);
        max-width: 1200px;
    }
    .prev-post, .next-post {
        padding: 10px;
        background-color: #0073e6;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .prev-post:hover,
    .next-post:hover {
        background-color: #005bb5;
    }
    .current-post-index {
        margin: 0 10px;
        font-weight: bold;
    }
    .wdotabcontent .single-post {
        width: 100%;
        overflow-y: auto;
        background-color: #fff;
        padding: 0px 15px 15px;
    }
    .wdotabcontent .single-post::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }
    .wdotabcontent .single-post::-webkit-scrollbar {
        width: 6px;
        background-color: #F5F5F5;
    }
    .wdotabcontent .single-post::-webkit-scrollbar-thumb {
        background-color: #000000;
        border: 1px solid #555555;
    }
    .wdotabcontent {
        position: relative;
        margin-top: 70px;
    }
    .nav_upper_tab {
        position: absolute;
        top: 0;
        width: 100%;
        transform: translate(0px,-75px);
        left: 0;
        max-width: 1580px;
    }
</style>
<div class="knowledge-heading">
    <h1>Knowledge Base</h1>
</div>
<div class="tab">
    <?php
    $terms = get_terms(array(
        'taxonomy'   => 'knowledge_category',
        'hide_empty' => false,
    ));
    if (!empty($terms)) {
        foreach ($terms as $index => $term) {
            $activeClass = ($index == 0) ? ' active' : '';
            ?>
            <button class="tablinks<?php echo esc_attr($activeClass); ?>" data-tab="<?php echo esc_attr($term->term_id); ?>"><?php echo esc_html($term->name); ?></button>
            <?php
        }
    }
    ?>
</div>

<?php
$a = 1;
if (!empty($terms)) {
    foreach ($terms as $term) {
        $post_args = array(
            'posts_per_page' => -1,
            'post_type'      => 'knowledge_base',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'knowledge_category',
                    'terms'    => $term->term_id,
                ),
            ),
        );
        $myposts = get_posts($post_args);
        $totalPosts = count($myposts);

        $currentIndex = 0;

        ?>

        <div id="tab-<?php echo esc_attr($term->term_id); ?>" class="wdotabcontent">
            <?php
            if (!empty($myposts)) {
                $totalPosts = count($myposts);
                foreach ($myposts as $index => $post) {
                    $postClass = ($index === $currentIndex) ? 'block' : 'none';
                    ?>
                    <div class="single-post" style="display: <?php echo esc_attr($postClass); ?>">
                        <h3><?php echo esc_html($post->post_title); ?></h3>
                        <p><?php echo esc_html($post->post_content); ?></p>
                    </div>
                    <?php
                }
            } else {
                echo "No posts found.";
            }
            ?>

            <!-- Add navigation links for next and previous posts if there is more than one post -->
            <?php if ($totalPosts > 1): ?>
                <div class="nav_upper_tab">
                    <div class="navigation-links">
                        <a href="#" class="prev-post" data-tab="<?php echo esc_attr($term->term_id); ?>">Previous article</a>
                        <span class="current-post-index"></span>
                        <a href="#" class="next-post" data-tab="<?php echo esc_attr($term->term_id); ?>">Next article</a>
                    </div>
                </div>
            <?php endif;
            ?>
            <?php if ($totalPosts > 1): ?>
                <div class="navigation-links">
                    <a href="#" class="prev-post" data-tab="<?php echo esc_attr($term->term_id); ?>">Previous article</a>
                    <span class="current-post-index"></span>
                    <a href="#" class="next-post" data-tab="<?php echo esc_attr($term->term_id); ?>">Next article</a>
                </div>
            <?php endif;
            ?>
        </div>
        <?php
        $a++;
    }
}
?>

<script>
    jQuery(document).ready(function ($) {
        /** Set default tab and show first post */
        var defaultTab = $('.tablinks:first').data('tab');
        openCity(null, defaultTab);
        changePost(0, defaultTab);

        /**  Add active class to default tab */
        $('.tablinks[data-tab="' + defaultTab + '"]').addClass('active');

        /** Tab click event */
        $('.tablinks').on('click', function (event) {
            event.preventDefault();
            var tabId = $(this).data('tab');
            openCity(event, tabId);
            changePost(0, tabId);

            /** Remove active class from all tabs and add it to the clicked tab */
            $('.tablinks').removeClass('active');
            $(this).addClass('active');
        });

        /** Next and Previous post click events */
        $('.next-post, .prev-post').on('click', function (event) {
            event.preventDefault();
            var direction = ($(this).hasClass('next-post')) ? 1 : -1;
            var tabId = $(this).data('tab');
            changePost(direction, tabId);
        });
    });

    function openCity(evt, tabId) {
        jQuery('.wdotabcontent').hide();
        jQuery('.tablinks').removeClass('active');
        jQuery('#tab-' + tabId).show();
        if (evt) {
            jQuery(evt.currentTarget).addClass('active');
        }
    }

    function changePost(direction, tabId) {
        var tabContent = jQuery('#tab-' + tabId);
        var posts = tabContent.find('.single-post');
        var currentIndex = posts.filter(':visible').index();
        var newIndex = currentIndex + direction;

        if (newIndex >= 0 && newIndex < posts.length) {
            posts.hide().eq(newIndex).show();
            /** Update current post index and total posts */
            tabContent.find('.current-post-index').text((newIndex + 1) + '/' + posts.length + ' articles');
        }
    }
</script>
