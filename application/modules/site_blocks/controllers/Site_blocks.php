<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class site_blocks extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function _block_vdo_hp()
    {
        $this->load->module('ourevents');
        $this->load->module('site_settings');

        $mysql_query_for_next = $this->ourevents->_generate_mysql_query_for_upcomming(1, $limit = 1, $offset = NULL);
        $mysql_query_for_upcoming = $this->ourevents->_generate_mysql_query_for_upcomming(1, $limit = 2, $offset = 1);


        $data['query_for_next'] = $this->ourevents->_custom_query($mysql_query_for_next);
        $data['query_for_upcoming'] = $this->ourevents->_custom_query($mysql_query_for_upcoming);
        $this->load->view('video_hp', $data);
    }



    function _next_event_block_hp()
    {
        $this->load->module('ourevents');
        $this->load->module('site_settings');

        $mysql_query_for_next = $this->ourevents->_generate_mysql_query_for_upcomming(1, $limit = 1, $offset = NULL);
        $mysql_query_for_upcoming = $this->ourevents->_generate_mysql_query_for_upcomming(1, $limit = 2, $offset = 1);


        $data['query_for_next'] = $this->ourevents->_custom_query($mysql_query_for_next);
        $data['query_for_upcoming'] = $this->ourevents->_custom_query($mysql_query_for_upcoming);
        $this->load->view('next_event_block_hp', $data);
    }


    function _dist_members_hp()
    {
        $this->load->module('teams');

        $teamType = 1;
        $teamSubType = 1;
        $data['query'] = $this->teams->get_team_by_type_hp($teamType, $teamSubType);

        $this->load->view('dist_member_hp', $data);
    }



    function _latest_blogs_hp()
    {
        $this->load->module('blogs');
        $this->load->module('site_settings');

        $data['query'] = $this->blogs->_get_list($limit = 3, $offset = 0);

        $this->load->view('latest_blogs_hp', $data);
    }

    function _testimonials_hp()
    {
        $this->load->module('testimonials');
        $this->load->module('site_settings');

        $data['query'] = $this->testimonials->_get_list($limit = 8, $offset = 0);

        $this->load->view('testimonials_hp', $data);
    }

    function _notifications_hp()
    {
        $this->load->module('notifications');
        $this->load->module('site_settings');

        $data['query'] = $this->notifications->_get_notifications_list($limit = 10, $offset = 0);

        $this->load->view('notifications_hp', $data);
    }


    function _inner_blog_hp()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');

        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();
        $data['query'] = $this->posts->get_with_limit(3, $offset = NULL, 'post_date DESC');
        $this->load->view('inner_blog_hp', $data);
    }



    function _next_event_block()
    {
        $this->load->module('ourevents');
        $this->load->module('site_settings');

        $mysql_query_for_next = $this->ourevents->_generate_mysql_query_for_upcomming(1, $limit = 1, $offset = NULL);
        $mysql_query_for_upcoming = $this->ourevents->_generate_mysql_query_for_upcomming(1, $limit = 2, $offset = 1);


        $data['query_for_next'] = $this->ourevents->_custom_query($mysql_query_for_next);
        $data['query_for_upcoming'] = $this->ourevents->_custom_query($mysql_query_for_upcoming);
        $this->load->view('next_event_block', $data);
    }


    function _footer_cat_block()
    {
        $this->load->module('post_categories');
        $this->load->module('site_settings');

        $data['query_cat_post'] = $this->post_categories->_get_hp_cat_post_qnty();

        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('footer_cat_block', $data);
    }


    function _footer_map_block()
    {

        $this->load->view('footer_map_block');
    }


    function _hot_posts()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');

        $data['query_hot_posts'] = $this->posts->_get_hp_latest_posts(6, 0);

        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('top_hot_posts_hp', $data);
    }

    function _footer_posts()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');

        $data['query_footer_posts'] = $this->posts->_get_hp_latest_posts(3, 0);

        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('footer_posts', $data);
    }



    function _draw_top_banner()
    {
        $this->load->module('adsbanners');
        $data['query_top_banner'] = $this->adsbanners->_get_banners(1, 1, 0);
        $this->load->view('top_banner', $data);
    }

    function _draw_mid_banner()
    {
        $this->load->module('adsbanners');
        $data['query_mid_banner'] = $this->adsbanners->_get_banners(2, 1, 0);
        $this->load->view('middle_banner', $data);
    }


    function _related_post_block($cat_url)
    {
        $this->load->module('posts');
        $this->load->module('site_settings');
        $this->load->module('post_categories');


        $cat_id = $this->post_categories->_get_cat_id_from_cat_url($cat_url);

        $data['query_related_random_post'] = $this->posts->_get_related_posts($cat_id);

        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('related_post_block', $data);
    }


    function _sidebar_block()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');
        $this->load->module('webgallery');
        $this->load->module('whatsapp');

        $data['query_sidebar_random_post_1'] = $this->posts->_get_hp_latest_posts(1, 0);
        $data['query_sidebar_random_post_4'] = $this->posts->_get_hp_latest_posts(4, 1);
        $data['query_sidebar_latest_posts_1'] = $this->posts->_get_hp_latest_posts(2, 0);
        $data['query_sidebar_latest_posts_2'] = $this->posts->_get_hp_latest_posts(2, 2);
        $data['whatsappLink'] = $this->whatsapp->_get_whatsappLink();


        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('sidebar_block', $data);
    }

    function _sidebar_block_for_blogs()
    {
        $this->load->module('blogs');

        $data['query_random_blogsx10'] = $this->blogs->_get_random_blogs(10, 0);

        $this->load->view('sidebar_block_for_blogs', $data);
    }


    function _sidebar_block_for_volumes()
    {
        $this->load->module('rvolumes');

        $data['query_volume'] = $this->rvolumes->get_where_custom('volumeStatus', 1);

        $this->load->view('sidebar_block_for_volumes', $data);
    }

    function _random_posts_hp()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');

        $data['query_random_post_1'] = $this->posts->_get_hp_latest_posts(1, 0);
        $data['query_random_post_2'] = $this->posts->_get_hp_latest_posts(3, 1);
        $data['query_random_post_3'] = $this->posts->_get_hp_latest_posts(1, 4);
        $data['query_random_post_4'] = $this->posts->_get_hp_latest_posts(3, 5);
        $data['query_random_post_5'] = $this->posts->_get_hp_latest_posts(1, 9);
        $data['query_random_post_6'] = $this->posts->_get_hp_latest_posts(3, 10);
        $data['query_random_post_7'] = $this->posts->_get_hp_latest_posts(1, 12);
        $data['query_random_post_8'] = $this->posts->_get_hp_latest_posts(3, 16);
        $data['post_segments'] = $this->site_settings->_get_post_segments();

        $this->load->view('popular_posts_hp', $data);
    }


    function _slider_hp()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');

        $data['query_slide_1'] = $this->posts->_get_hp_latest_posts(6, 0);
        $data['query_slide_2'] = $this->posts->_get_hp_latest_posts(1, 3);
        $data['query_slide_3'] = $this->posts->_get_hp_latest_posts(1, 4);
        $data['query_slide_4'] = $this->posts->_get_hp_latest_posts(1, 5);
        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('slider_hp', $data);
    }


    function _latest_posts_hp()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');

        $data['query_latest_posts1'] = $this->posts->_get_hp_latest_posts(1, 0);
        $data['query_latest_posts2'] = $this->posts->_get_hp_latest_posts(1, 4);
        $data['query_latest_posts3'] = $this->posts->_get_hp_latest_posts(1, 1);
        $data['query_latest_posts4'] = $this->posts->_get_hp_latest_posts(1, 5);
        $data['query_latest_posts5'] = $this->posts->_get_hp_latest_posts(1, 2);
        $data['query_latest_posts6'] = $this->posts->_get_hp_latest_posts(1, 6);
        $data['query_latest_posts7'] = $this->posts->_get_hp_latest_posts(1, 3);
        $data['query_latest_posts8'] = $this->posts->_get_hp_latest_posts(1, 7);
        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('latest_posts_hp', $data);
    }

    function _block_2_hp()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');
        $cat_id = 6;
        $data['query_latest_posts_cat6x1'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(1, 0, $cat_id);
        $data['query_latest_posts_cat6x4'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(4, 1, $cat_id);

        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('block2_hp', $data);
    }


    function _block_3_hp()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');
        $cat_id = 3;
        $data['query_latest_posts_cat3x1'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(1, 0, $cat_id);
        $data['query_latest_posts_cat3x4'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(4, 2, $cat_id);
        $data['query_latest_posts_cat3x1_1'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(1, 1, $cat_id);
        $data['query_latest_posts_cat3x4_1'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(4, 6, $cat_id);

        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('block3_hp', $data);
    }

    function _block_4_hp()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');
        $cat_id1 = 13;
        $cat_id2 = 4;
        $cat_id3 = 5;
        $data['query_block_4_hp_cat3x1_1'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(1, 0, $cat_id1);
        $data['query_block_4_hp_cat3x3_1'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(3, 1, $cat_id1);
        $data['query_block_4_hp_cat3x1_2'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(1, 0, $cat_id2);
        $data['query_block_4_hp_cat3x3_2'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(3, 1, $cat_id2);
        $data['query_block_4_hp_cat3x1_3'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(1, 0, $cat_id3);
        $data['query_block_4_hp_cat3x3_3'] = $this->posts->_get_posts_by_cat_id_n_limit_offset(3, 1, $cat_id3);


        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('block4_hp', $data);
    }


    function _block_5_hp()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');

        $data['query_random_block5_hp'] = $this->posts->_get_hp_random_posts(4, $offset = NULL);

        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('block5_hp', $data);
    }

    function _block_6_hp()
    {
        $this->load->module('posts');
        $this->load->module('site_settings');

        $data['query_random_block6_hp'] = $this->posts->_get_hp_random_posts(4, $offset = NULL);

        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();

        $this->load->view('block6_hp', $data);
    }

    function _block_contact()
    {

        $this->load->module('videogallery');

        $data['query_block7_hp'] = $this->videogallery->_get_hp_latest_vdo(3, 0);

        $this->load->view('block7_hp', $data);
    }
}
