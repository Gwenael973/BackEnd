<?php
/**
 * Blog Options Customizer
 *
 * @package wpkites
 */

function wpkites_blog_customizer ( $wp_customize )
{

$wp_customize->add_section('wpkites_blog_section', 
	array(
	'title' => esc_html__('Blog Page' , 'wpkites' ),
	'panel' => 'wpkites_theme_panel',
	'priority' => 4,
));



/******************** Blog Content *******************************/
$wp_customize->add_setting('wpkites_blog_content', 
	array(
		'default' 			=> esc_html__('excerpt','wpkites' ),
		'sanitize_callback' => 'wpkites_sanitize_radio'
		)
	);

$wp_customize->add_control('wpkites_blog_content', 
	array(		
		'label' 	=> esc_html__('Choose Options', 'wpkites' ),		
		'section' 	=> 'wpkites_blog_section',
		'type' 		=> 'radio',
		'priority' => 2,
		'choices' 	=>  array(
			'excerpt' 	=> esc_html__('Excerpt', 'wpkites' ),
			'content' 	=> esc_html__('Full Content', 'wpkites' ),
			)
		)
	);

/******************** Blog Length *******************************/
$wp_customize->add_setting( 'wpkites_blog_content_length',
	array(
		'default'           => 30,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpkites_sanitize_number_range',
		)
);
$wp_customize->add_control( 'wpkites_blog_content_length',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'wpkites'  ),
		'section'     => 'wpkites_blog_section',
		'type'        => 'number',
		'priority' => 2,
		'input_attrs' => array( 'min' => 10, 'max' => 200, 'step' => 1, 'style' => 'width: 200px;' ),
	)
);

/************************* Blog Meta Rearrange*********************************/
$default = array( 'blog_author', 'blog_category','blog_comnt');

$choices = array(
        'blog_author' => esc_html__( 'Author', 'wpkites'  ),
        'blog_category' => esc_html__( 'Category', 'wpkites'  ),
        'blog_comnt' => esc_html__( 'Comment', 'wpkites'  ),
    );
    
$wp_customize->add_setting( 'wpkites_blog_meta_sort', 
    array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback' => 'wpkites_sanitize_array',
        'default'     => $default
    ) );

$wp_customize->add_control( new WPKites_Control_Sortable( $wp_customize, 'wpkites_blog_meta_sort', 
    array(
        'label' => esc_html__( 'Drag And Drop To Rearrange', 'wpkites'  ),
        'section' => 'wpkites_blog_section',
        'settings' => 'wpkites_blog_meta_sort',
        'type'=> 'sortable',
        'choices'     => $choices
    ) ) );
}
add_action( 'customize_register', 'wpkites_blog_customizer' );