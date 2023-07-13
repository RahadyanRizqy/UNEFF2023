<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Berita</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item active">Berikut adalah berita dan update yang dapat dibaca</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="news section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="block">
					<div class="row">
						@foreach($post as $p)
						<div class="m-auto">
							<div class="blog-post">
								<div class="post-thumb">
									<a href="{{ route('news.specific', $p->id )}}">
										<img src="{{$p->image}}" alt="post-image" class="post-fluid">
									</a>
								</div>
								<div class="post-content">
									<div class="date">
										<h4>{{ $carbon->parse($p->posted_at)->format('d') }}<span>{{ $carbon->parse($p->posted_at)->format('M') }}</span></h4>
									</div>
									<div class="post-title">
										<h2><a href="{{ route('news.specific', $p->id )}}">{{$p->title}}</a></h2>
									</div>
									<div class="post-meta">
										<ul class="list-inline">
											<li class="list-inline-item">
												<i class="fa fa-user-o"></i>
												<a href="#">Admin {{$p->author->username}}</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar">
					<div class="widget latest-post">
						<h5 class="widget-header">Berita terakhir</h5>
						@foreach($latest as $l)
						<div class="media">
							<div class="media-body">
								<h6><a href="{{ route('news.specific', $l->id )}}">{{$l->title}}</a></h6>
								<p href="#"><span class="fa fa-calendar"></span>{{ $carbon->parse($l->posted_at)->format('d M, Y') }}</p>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>