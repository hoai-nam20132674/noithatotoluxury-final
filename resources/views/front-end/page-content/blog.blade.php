@extends('front-end.layout-final.default')
@section('content')
<main id="main" class="">
<div id="content" class="content-area page-wrapper" role="main">
	<div class="row row-main">
		<div class="large-12 col">
			<div class="col-inner">
				<header class="entry-header">
					<div class="entry-header-text entry-header-text-top text-center">
					
						<h1 class="entry-title plus_view" blog-id="{{$blog->id}}">{{$blog->title}}</h1>
						<div class="entry-divider is-divider small"></div>

						<div class="entry-meta uppercase is-xsmall">
							<span class="posted-on">Ngày đăng <a href="{{$blog->url}}" rel="bookmark"><time class="entry-date published" datetime="2018-12-20T15:32:22+07:00">{{ \Carbon\Carbon::createFromTimestamp(strtotime($blog->created_at))->diffForHumans()}}</time><time class="updated" datetime="2018-12-20T15:32:53+07:00">20/12/2018</time></a></span><span class="byline"> by <span class="meta-author vcard"><a class="url fn n" href="#">Admin</a></span></span>	
						</div><!-- .entry-meta -->
					</div>
				</header>
				
				
				{!!$blog->content!!}

						
			</div><!-- .col-inner -->
		</div><!-- .large-12 -->
	</div><!-- .row -->
</div>


</main><!-- #main -->

@endsection
@section('script')
  <script type="text/javascript">
    jQuery(document).ready(function () {
      var blog_id = jQuery(".plus_view").attr('blog-id');
      url = '/plus-view-blog/'+blog_id;
      jQuery.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        success: function(data) {
          console.log(data);
        }
        
      });
    });
  </script>
@endsection