<?php

/**
 * Carbon fields
 */
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_frontpage_fields');
function crb_attach_frontpage_fields()
{
  Container::make('post_meta', __('ALPS: Page Sections', 'crb' ) )
    ->where('post_id', '=', get_option('page_on_front'))
    ->add_fields( array(
      Field::make('complex', 'page_sections', 'Page Sections')
        ->setup_labels( array(
          'plural_name' => 'Page Sections',
          'singular_name' => 'Page Section',
        ) )

        // Highlight Blocks
        ->add_fields('highlight_blocks', 'Highlight Blocks', array(
          Field::make('complex', 'highlight_block', 'Blocks')
            ->setup_labels( array(
              'plural_name' => 'Blocks',
              'singular_name' => 'Block',
            ) )
            ->set_layout('tabbed-horizontal')
            ->set_min('3')
            ->set_max('3')
            ->add_fields( array(
              Field::make('text', 'highlight_block_description', 'Description'),
            ) ),
          Field::make('text', 'highlight_blocks_cta_text', __('Button Text'))->set_width(50)->set_attribute('placeholder', 'Learn More'),
          Field::make('text', 'highlight_blocks_cta_url', __('Button URL'))->set_width(50)->set_attribute('placeholder', 'http://')
        ) )

        // Content Read More
        ->add_fields('content_read_more', 'Content Read More', array(
          Field::make('rich_text', 'content_read_more_body', 'Body')
        ) )

        // Split Content
        ->add_fields('split_content', 'Split Content', array(
          Field::make('complex', 'split_content_left', 'Left')
            ->setup_labels( array(
              'plural_name' => 'Content',
              'singular_name' => 'Content',
            ) )
            ->set_width(50)
            ->set_max('1')
            ->add_fields( array(
              Field::make('textarea', 'split_content_left_body', 'Body')
                ->set_help_text('*Displays as large text')
            ) ),
          Field::make('complex', 'split_content_right', 'Right')
            ->setup_labels( array(
              'plural_name' => 'Content',
              'singular_name' => 'Content',
            ) )
            ->set_width(50)
            ->set_max('1')
            ->add_fields( array(
              Field::make('rich_text', 'split_content_right_body', 'Body'),
              Field::make('text', 'split_content_right_cta_text', __('Button Text'))->set_width(50)->set_attribute('placeholder', 'Learn More'),
              Field::make('text', 'split_content_right_cta_url', __('Button URL'))->set_width(50)->set_attribute('placeholder', 'http://')
            ) ),
        ) )

        // Media Testimonies
        ->add_fields('media_testimonies', 'Media Testimonies', array(
          Field::make('text', 'media_testimonies_title', 'Title')->set_width(50),
          Field::make('text', 'media_testimonies_url', 'See All Url')->set_width(50)->set_attribute('placeholder', 'http://'),
          Field::make('complex', 'media_testimony', 'Testimonies')
            ->setup_labels( array(
              'plural_name' => 'Testimonies',
              'singular_name' => 'Testimony',
            ) )
            ->set_width(50)
            ->set_layout('tabbed-horizontal')
            ->set_min('2')
            ->add_fields( array(
              Field::make('textarea', 'media_testimony_quote', 'Quote')->set_width(50),
              Field::make('image', 'media_testimony_video_thumbnail', 'Video Thumbail' )->set_width(50),
              Field::make('text', 'media_testimony_url', 'Read More Url')->set_attribute('placeholder', 'http://')->set_width(50),
              Field::make('text', 'media_testimony_video_title', 'Video Title' )->set_width(50),
            ) ),
        ) )

        // Home Body Content
        ->add_fields('content_step_blocks', 'Content with Step Blocks', array(
          Field::make('complex', 'content_step_blocks_content', 'Content')
            ->setup_labels( array(
              'plural_name' => 'Content',
              'singular_name' => 'Content',
            ) )
            ->add_fields( array(
              Field::make('rich_text', 'content_step_blocks_body', 'Body'),
              Field::make('complex', 'step_blocks', 'Step Blocks')
                ->setup_labels( array(
                  'plural_name' => 'Blocks',
                  'singular_name' => 'Block',
                ) )
                ->set_layout('tabbed-horizontal')
                ->set_min('3')
                ->set_max('3')
                ->add_fields( array(
                  Field::make('text', 'step_blocks_kicker', 'Kicker'),
                  Field::make('text', 'step_blocks_text', 'Text'),
                ) ),
            ) ),
            Field::make('text', 'content_step_blocks_cta_text', __('Button Text'))->set_width(50)->set_attribute('placeholder', 'Learn More'),
            Field::make('text', 'content_step_blocks_cta_url', __('Button URL'))->set_width(50)->set_attribute('placeholder', 'http://')
          ) )
    ) );
}