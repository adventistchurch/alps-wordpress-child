@php
  global $post;
  $page_sections = carbon_get_post_meta($post->ID, 'page_sections');
@endphp
@extends('layouts.app')
@section('content')
  @while(have_posts())
    {!! the_post() !!}
    @include('patterns.02-organisms.content.content-page')
    @foreach ($page_sections as $section)
      @if ($section['_type'] == 'highlight_blocks')
        <section class="c-section c-section__highlight-blocks c-highlight-blocks u-theme--background-color--base u-color--white u-spacing">
          @if ($section['highlight_block'])
            <div class="c-highlight-blocks__content">
              @foreach ($section['highlight_block'] as $block)
                <div class="c-highlight-blocks__content-item">
                  <div class="o-number u-font--secondary--xxl">{{ $loop->iteration }}</div>
                  <p class="u-font--secondary--m">{{ $block['highlight_block_description'] }}</p>
                </div>
              @endforeach
            </div>
          @endif
          @if ($section['highlight_blocks_cta_url'])
            <a href="{{ $section['highlight_blocks_cta_url'] }}" class="o-button o-button--white">
              <span class="u-icon u-icon--xs u-space--half--right">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                  <title>o-arrow__short--right</title>
                  <path d="M5,.09,3.62,1.5,6.12,4H.05V6H6.12L3.62,8.5,5,9.91,10,5Z" fill="#9b9b9b"></path>
                </svg>
              </span>
              @if ($section['highlight_blocks_cta_text'])
                {{ $section['highlight_blocks_cta_text'] }}
              @else
                Learn More
              @endif
            </a>
          @endif
        </section>
      @endif

      @if ($section['_type'] == 'content_read_more')
        <section id="top" class="l-main__content l-grid l-grid--7-col u-shift--left--1-col--at-xxlarge l-grid-wrap--6-of-7 u-spacing--double--until-xxlarge u-padding--zero--sides">
          <article class="c-article l-grid-item l-grid-item--l--4-col l-grid-item--xl--3-col">
            <div class="c-article__body u-spacing--double">
              <div class="c-content-read-more u-spacing u-theme--border-color--base text">
                {!! $section['content_read_more_body'] !!}
                <button class="o-button o-button--outline js-toggle-parent">
                  <span class="u-icon u-icon--xs u-space--half--right">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.01 10">
                      <title>o-cion</title>
                      <path d="M10,2.31H0V0H10ZM6.36,3.85H0v2.3H6.36ZM8.22,7.7H0V10H8.22Z" fill="#231f20"></path>
                    </svg>
                  </span>
                  <font>Read</font>
                </button>
              </div>
            </div>
          </article>
        </section>
      @endif

      @if ($section['_type'] == 'split_content')
        <section id="top" class="l-main__content l-grid l-grid--7-col u-shift--left--1-col--at-xxlarge l-grid-wrap--6-of-7 u-spacing--double--until-xxlarge u-padding--zero--sides">
          <article class="c-article l-grid-item l-grid-item--l--4-col l-grid-item--xl--3-col">
            <div class="c-article__body u-spacing--double">
              <div class="c-split-highlight-content">
                @if ($section['split_content_left'])
                  @foreach ($section['split_content_left'] as $content)
                    <div class="c-split-highlight-content--left u-theme--background-color--base u-color--white u-padding">
                      <span class="u-font--primary--l">{{ $content['split_content_left_body'] }}</span>
                    </div>
                  @endforeach
                @endif
                @if ($section['split_content_right'])
                  @foreach ($section['split_content_right'] as $content)
                    <div class="c-split-highlight-content--right u-background-color--gray--light u-padding text">
                      {!! $content['split_content_right_body'] !!}
                      @if ($content['split_content_right_cta_url'])
                        <a href="{{ $content['split_content_right_cta_url'] }}" class="o-button o-button--primary">
                          <span class="u-icon u-icon--xs u-space--half--right">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                              <title>o-arrow__short--right</title>
                              <path d="M5,.09,3.62,1.5,6.12,4H.05V6H6.12L3.62,8.5,5,9.91,10,5Z" fill="#9b9b9b"></path>
                            </svg>
                          </span>
                          @if ($content['split_content_right_cta_text'])
                            {{ $content['split_content_right_cta_text'] }}
                          @else
                            Learn More
                          @endif
                        </a>
                      @endif
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
          </article>
        </section>
      @endif

      @if ($section['_type'] == 'media_testimonies')
        <section class="c-testimonies-media u-spacing u-posititon--relative u-theme--background-color--darker u-color--white">
          <div class="c-testimonies-media--inner u-spacing--double">
            <div class="c-testimonies-media__heading">
              <div class="c-block__heading u-theme--border-color--base">
                @if ($section['media_testimonies_title'])
                  <h3 class="c-block__heading-title">{{ $section['media_testimonies_title'] }}</h3>
                @endif
                @if ($section['media_testimonies_url'])
                  <a href="{{ $section['media_testimonies_url'] }}" class="c-block__heading-link u-theme--color--light u-theme--link-hover--lighter">See All</a>
                @endif
              </div>
              <div class="o-dots"></div>
            </div>
            @if ($section['media_testimony'])
              <div class="c-testimonies-media__blocks js-carousel__testimonies-media u-theme--gradient--right u-theme--gradient--left">
                @foreach ($section['media_testimony'] as $media_testimony)
                  <div class="c-testimonies-media__block">
                    <div class="c-media-block c-block c-block c-media-block u-color--white">
                      @if ($media_testimony['media_testimony_video_thumbnail'])
                        @php
                          $thumb_id = $media_testimony['media_testimony_video_thumbnail'];
                          $thumb_size = 'horiz__16x9';
                          $image_s = wp_get_attachment_image_src($thumb_id, $thumb_size . '--s')[0];
                          $image_m = wp_get_attachment_image_src($thumb_id, $thumb_size . '--m')[0];
                          $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                        @endphp
                        <div class="c-media-block__image c-block__image">
                          <div class="c-block__image-wrap">
                            <picture class="picture">
                              <!--[if IE 9]><video style="display: none;"><![endif]-->
                              <source srcset="{{ $image_m }}" media="(min-width: 800px)">
                              <!--[if IE 9]></video><![endif]-->
                              <img itemprop="image" srcset="{{ $image_s }}" alt="{{ $alt }}">
                            </picture>
                            <div class="c-media-block__image-video c-block__image-video u-spacing--half u-padding u-color--white u-gradient--bottom">
                              @if ($media_testimony['media_testimony_video_title'])
                                <strong>{{ $media_testimony['media_testimony_video_title'] }}</strong>
                              @endif
                              @if ($media_testimony['media_testimony_url'])
                                <a href="{{ $media_testimony['media_testimony_url'] }}" class="o-button o-button--outline o-button--outline--white"><span class="u-icon u-icon--xs u-space--half--right"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.56 15"><title>icon-play</title><path d="M10.56,7.5,0,15V0Z" fill="#231f20"></path></svg></span>Watch Video</a>
                              @endif
                            </div>
                          </div>
                        </div>
                      @endif
                      <div class="c-media-block__content c-block__content u-spacing u-border--left u-theme--border-color--base">
                        <div class="u-spacing c-block__group c-media-block__group u-flex--justify-start">
                          @if ($media_testimony['media_testimony_quote'])
                            <div class="u-width--100p u-spacing">
                              <p class="c-media-block__description c-block__description">{{ $media_testimony['media_testimony_quote'] }}</p>
                            </div>
                          @endif
                          @if ($media_testimony['media_testimony_url'])
                            <a href="{{ $media_testimony['media_testimony_url'] }}" class="c-block__button o-button o-button--outline--white" tabindex="0">
                              <span class="u-icon u-icon--xs u-path-fill--base u-space--half--right">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.01 10">
                                  <title>o-cion</title>
                                  <path d="M10,2.31H0V0H10ZM6.36,3.85H0v2.3H6.36ZM8.22,7.7H0V10H8.22Z" fill="#231f20"></path>
                                </svg>
                              </span>
                              Read more
                            </a>
                          @endif
                        </div>
                      </div> <!-- c-media-block__content -->
                    </div> <!-- c-media-block -->
                  </div>
                @endforeach
              </div>
            @endif
            <div class="c-testimonies-media__buttons u-spacing--left--half">
              <button class="o-button o-button--outline--white o-arrow o-arrow--prev">
                <span class="u-icon u-icon--s u-path-fill--white">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                    <title>Arrow Previous</title>
                    <path d="M3.25,6.41l3.5,3.5L8.16,8.5,4.66,5l3.5-3.5L6.75.09l-3.5,3.5L1.84,5Z" fill="#9b9b9b"></path>
                  </svg>
                </span>
              </button>
              <button class="o-button o-button--outline--white o-arrow o-arrow--next">
                <span class="u-icon u-icon--s u-path-fill--white">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                    <title>Arrow Next</title>
                    <path d="M6.75,3.59,3.25.09,1.84,1.5,5.34,5,1.84,8.5,3.25,9.91l3.5-3.5L8.16,5Z" fill="#9b9b9b"></path>
                  </svg>
                </span>
              </button>
              @if ($section['media_testimonies_url'])
                <a href="{{ $section['media_testimonies_url'] }}" class="o-button o-button--outline--white">
                  See all Stories
                  <span class="u-icon u-icon--m u-space--half--left">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <title>Arrow Long</title>
                      <path d="M18.29,8.59l-3.5-3.5L13.38,6.5,15.88,9H.29v2H15.88l-2.5,2.5,1.41,1.41,3.5-3.5L19.71,10Z" fill="#9b9b9b"></path>
                    </svg>
                  </span>
                </a>
              @endif
            </div>
          </div>
        </section>
      @endif

      @if ($section['_type'] == 'content_step_blocks')
        <section class="l-main__content l-grid l-grid--7-col u-shift--left--1-col--at-xxlarge l-grid-wrap--6-of-7 u-spacing--double--until-xxlarge u-padding--zero--sides">
          <article class="c-article l-grid-item l-grid-item--l--4-col l-grid-item--xl--3-col">
            <div class="c-article__body u-spacing--double">
              <div class="c-home-body-content u-spacing u-theme--border-color--base text">
                @if ($section['content_step_blocks_content'])
                  @foreach ($section['content_step_blocks_content'] as $content_block)
                    {!! $content_block['content_step_blocks_body'] !!}
                    @if ($content_block['step_blocks'])
                      <div class="c-step-blocks">
                        @foreach ($content_block['step_blocks'] as $step_block)
                          <div class="c-step-blocks__item u-theme--background-color--base u-color--white u-padding">
                            <span class="o-kicker">{{ $step_block['step_blocks_kicker'] }}</span>
                            <p><strong>{{ $step_block['step_blocks_text'] }}</strong></p>
                          </div>
                        @endforeach
                      </div>
                    @endif
                  @endforeach
                @endif
                @if ($section['content_step_blocks_cta_url'])
                  <a href="{{ $section['content_step_blocks_cta_url'] }}" class="o-button o-button--primary">
                    <span class="u-icon u-icon--xs u-space--half--right">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                        <title>o-arrow__short--right</title>
                        <path d="M5,.09,3.62,1.5,6.12,4H.05V6H6.12L3.62,8.5,5,9.91,10,5Z" fill="#9b9b9b"></path>
                      </svg>
                    </span>
                    @if ($section['content_step_blocks_cta_text'])
                      {{ $section['content_step_blocks_cta_text'] }}
                    @else
                      Learn More
                    @endif
                  </a>
                @endif
              </div>
            </div>
          </article>
        </section>
      @endif
    @endforeach
  @endwhile
@endsection
