<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blogs extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_blogs');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }


    function _get_list($limit, $offset)
    {
        $query = $this->mdl_blogs->_get_list($limit, $offset);
        return $query;
    }


    function _get_random_blogs($limit, $offset)
    {
        $query = $this->mdl_blogs->_get_random_blogs($limit, $offset);
        return $query;
    }


    function delete_blog($update_id)
    {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $data = $this->fetch_data_from_db($update_id);
        $fileName = $data['blog_file'];

        if (!$fileName == '') {
            $img_path_1 = './assets/images/blogs/' . $fileName;

            if (file_exists($img_path_1)) {
                unlink($img_path_1);
            }
        }

        $this->_delete($update_id);
        $flash_msg = "The Blog was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('blogs/manage');
    }


    function _generate_socialimg($file_name)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/blogs/main/' . $file_name;
        $config['new_image'] = './assets/images/blogs/large/' . $file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 1170;
        //$config['height'] = 810;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
        $this->_generate_thumbnail($file_name);
    }


    function _generate_thumbnail($file_name)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/blogs/main/' . $file_name;
        $config['new_image'] = './assets/images/blogs/small/' . $file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 250;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
    }


    function _generate_main($file_name)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/blogs/main/' . $file_name;
        $config['new_image'] = './assets/images/blogs/main/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 650;
        $config['height'] = 450;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
        //$this->_generate_thumbnail($file_name);
        $this->_generate_socialimg($file_name);
        
    }


    function do_upload($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Cancel') {
            redirect('blogs/create/' . $update_id);
        }

        $config['upload_path'] = './assets/images/blogs/main/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 5000;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));

            $data['headline'] = "Upload Error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_file";
            $this->load->module('templates');
            $this->templates->admin($data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $this->_generate_main($file_name);
            //$this->_generate_socialimg($file_name);

            $update_data['blog_file'] = $file_name;
            $this->_update($update_id, $update_data);

            $data['headline'] = "Upload Successfully";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }


    function delete_file($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $fileName = $data['blog_file'];
        $img_path_1 = './assets/images/blogs/main/' . $fileName;
        $img_path_2 = './assets/images/blogs/small/' . $fileName;
        $img_path_3 = './assets/images/blogs/large/' . $fileName;


        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }

        if (file_exists($img_path_2)) {
            unlink($img_path_2);
        }

        if (file_exists($img_path_3)) {
            unlink($img_path_3);
        }


        unset($data);
        $data['blog_file'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The File was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('blogs/create/' . $update_id);
    }



    function upload_file($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['headline'] = "Upload Paper";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "upload_file";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function listing()
    {

        $data['query'] = $this->mdl_blogs->_get_bloges_list($limit = NULL, $offset = NULL);

        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 3;
        $data['view_module'] = "blogs";
        $data['view_file'] = "category";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function index()
    {
        redirect('blogs/listing', 'refresh');
    }



    function _get_bloges_by_string($string)
    {
        $query = $this->mdl_blogs->_get_bloges_by_string($string);
        return $query;
    }


    function _get_related_bloges($cat_id)
    {
        $query = $this->mdl_blogs->_get_related_bloges($cat_id);
        return $query;
    }


    function _get_blog_id_from_blog_url($blog_url)
    {
        $query = $this->get_where_custom('blog_url', $blog_url);
        foreach ($query->result() as $row) {
            $blog_id = $row->id;
        }

        if (!isset($blog_id)) {
            $blog_id = 0;
        }

        return $blog_id;
    }

    function view()
    {

        $this->load->module('site_settings');
        $blog_url = $this->uri->segment(3);
        $blog_id = $this->_get_blog_id_from_blog_url($blog_url);

        if ($blog_id > 0) {
            $update_id = $blog_id;

            $data = $this->fetch_data_from_db($update_id);

            $data['update_id'] = $update_id;

            $data['page_title'] = $data['blog_title'];
            $data['page_keywords'] = $data['blog_keywords'];
            $data['page_description'] = character_limiter($data['blog_desc'], 220);

            $data['flash'] = $this->session->flashdata('blog');
            $data['navactive'] = 3;
            $data['view_module'] = "blogs";
            $data['view_file'] = "view";
            $this->load->module('templates');
            $this->templates->public_bootstrap($data);
        } else {
            redirect('site_security/not_allowed');
        }
    }


    function vieww($update_id)
    {

        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);

        $data['update_id'] = $update_id;

        $data['page_title'] = $data['blog_title'];
        $data['page_keywords'] = $data['blog_keywords'];
        $data['page_description'] = character_limiter($data['blog_desc'], 220);

        $data['flash'] = $this->session->flashdata('blog');
        $data['navactive'] = 3;
        $data['view_module'] = "blogs";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function get_best_array_key($target_array)
    {
        foreach ($target_array as $key => $value) {
            if (!isset($key_with_highest_value)) {
                $key_with_highest_value = $key;
            } elseif ($value > $target_array[$key_with_highest_value]) {
                $key_with_highest_value = $key;
            }
        }
        return $key_with_highest_value;
    }



    function create()
    {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        $update_id = $this->uri->segment(3);

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('blog_title', 'Blog Title', 'Trim|required|max_length[260]');
            $this->form_validation->set_rules('blog_desc', 'Blog Description', 'trim|required');
            $this->form_validation->set_rules('blog_keywords', 'Blog Keywords', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                $data['blog_desc'] = $this->_get_string_replaced($data['blog_desc']);
                $enc_text = $this->site_security->generate_random_string(6) . $update_id;

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Blog details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('flashtxt', $value);
                    redirect('blogs/create/' . $update_id);
                } else {
                    $data['blog_url'] = url_title($data['blog_title']) . '-' . $enc_text;
                    $data['blog_date'] = time();
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Blog was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('flashtxt', $value);
                    redirect('blogs/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Blog";
        } else {
            $data['headline'] = "Update Blog details";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('flashtxt');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function _get_string_replaced($blog_desc)
    {

        //$replace_str = array('div1' => '<div xss="removed">', 'span1' => '<span xss=removed>', 'span2' => '<span xss="removed">', 'div_open' => '<div>', 'div_close' => '</div>', 'blockq_open' => '<blockquote>', 'blockq_close' => '</blockquote>', 'span_open' => '<span>', 'span_close' => '</span>');
        //$blog_desc = str_replace($replace_str, '', $blog_desc);
        $blog_desc = str_replace('img src', 'span', $blog_desc);
        $blog_desc = str_replace('&lt;', '<', $blog_desc);
        $blog_desc = str_replace('&gt;', '>', $blog_desc);
        $blog_desc = str_replace('&gt;', '>', $blog_desc);
        $blog_desc = str_replace('width="560"', 'width="100%"', $blog_desc);
        $blog_desc = str_replace('iframe', 'div', $blog_desc);
        return $blog_desc;
    }

    function manage()
    {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('blog_date');

        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post()
    {
        $data['blog_title'] = strip_tags($this->input->post('blog_title', TRUE));
        $data['blog_desc'] = $this->input->post('blog_desc', TRUE);
        $data['blog_keywords'] = strip_tags($this->input->post('blog_keywords', TRUE));
        $data['blog_author'] = $this->input->post('blog_author', TRUE);
        $data['blog_authordesc'] = $this->input->post('blog_authordesc', TRUE);
        $data['blog_status'] = $this->input->post('blog_status', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['blog_title'] = $row->blog_title;
            $data['blog_url'] = $row->blog_url;
            $data['blog_desc'] = $row->blog_desc;
            $data['blog_keywords'] = $row->blog_keywords;
            $data['blog_authordesc'] = $row->blog_authordesc;
            $data['blog_status'] = $row->blog_status;
            $data['blog_author'] = $row->blog_author;
            $data['blog_file'] = $row->blog_file;
            $data['blog_date'] = $row->blog_date;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by)
    {
        $query = $this->mdl_blogs->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_blogs->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_blogs->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_blogs->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_blogs->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_blogs->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_blogs->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_blogs->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->mdl_blogs->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_blogs->_custom_query($mysql_query);
        return $query;
    }

    function blog_check($str)
    {
        $blog_url = url_title($str);
        $mysql_query = "Select * from blogs where blog_title='$str' and blog_url='$blog_url'";
        $update_id = $this->uri->segment(3);
        if (is_numeric($update_id)) {
            $mysql_query .= " and id!=$update_id";
        }

        $query = $this->_custom_query($mysql_query);
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            $this->form_validation->set_message('blog_check', 'The Blog title that you submitted is not available');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
