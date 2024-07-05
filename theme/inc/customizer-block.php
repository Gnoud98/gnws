<?php
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'intro',
            'title'             => __('Khối mô tả mở đầu'),
            'description'       => __('Khối mô tả mở đầu'),
            'render_template'   => 'blocks/intro.php',
            'keywords'          => array('intro', 'quote'),
        ));
        acf_register_block_type(array(
            'name'              => 'block-img',
            'title'             => __('Khối ảnh'),
            'description'       => __('Khối ảnh'),
            'render_template'   => 'blocks/block-img.php',
            'keywords'          => array('block-img', 'quote'),
        ));
        acf_register_block_type(array(
            'name'              => 'block-img-content',
            'title'             => __('Khối ảnh nội dung'),
            'description'       => __('Khối ảnh nội dung'),
            'render_template'   => 'blocks/block-img-content.php',
            'keywords'          => array('block-img-content', 'quote'),
        ));
        acf_register_block_type(array(
            'name'              => 'block-title-content',
            'title'             => __('Khối tiêu đề nội dung'),
            'description'       => __('Khối tiêu đề nội dung'),
            'render_template'   => 'blocks/block-title-content.php',
            'keywords'          => array('block-title-content', 'quote'),
        ));


    }
}
