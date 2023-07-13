<section class="news section">
	<div class="container">
		<div class="row mt-30">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="block">
					<article class="blog-post single">
						<div class="post-thumb">
							<img src="{{ $news_post->image }}" alt="post-image" class="" width="100%" height="auto">
						</div>
						<div class="post-content">
							<div class="date">
								<h4>{{ $carbon->parse($news_post->posted_at)->format('d') }}<span>{{ $carbon->parse($news_post->posted_at)->format('M') }}</span></h4>
							</div>
							<div class="post-title">
								<h3>{{ $news_post->title }}</h3>
							</div>
							<div class="post-meta">
								<ul class="list-inline">
									<li class="list-inline-item">
										<i class="fa fa-user-o"></i>
										<a href="#">Admin ({{$news_post->author->username}})</a>
									</li>
									{{-- <li class="list-inline-item">
										<i class="fa fa-heart-o"></i>
										<a href="#">350</a>
									</li>
									<li class="list-inline-item">
										<i class="fa fa-comments-o"></i>
										<a href="#">30</a>
									</li> --}}
								</ul>
							</div>
							<div class="post-details">
								<p align="justify">
									{{ $news_post->content }}
								</p>
								{{-- <div class="share-block">
									<div class="tag">
										<p>
											Tags: 
										</p>
										<ul class="list-inline">
											<li class="list-inline-item">
												<a href="#">Event,</a>
											</li>
											<li class="list-inline-item">
												<a href="#">Conference,</a>
											</li>
											<li class="list-inline-item">
												<a href="#">Business</a>
											</li>
										</ul>
									</div>
									<div class="share">
										<p>
											Share: 
										</p>
										<ul class="social-links-share list-inline">
							              <li class="list-inline-item">
							                <a href="#"><i class="fa fa-facebook"></i></a>
							              </li>
							              <li class="list-inline-item">
							                <a href="#"><i class="fa fa-twitter"></i></a>
							              </li>
							              <li class="list-inline-item">
							                <a href="#"><i class="fa fa-instagram"></i></a>
							              </li>
							              <li class="list-inline-item">
							                <a href="#"><i class="fa fa-rss"></i></a>
							              </li>
							              <li class="list-inline-item">
							                <a href="#"><i class="fa fa-vimeo"></i></a>
							              </li>
							            </ul>
									</div>
								</div> --}}
							</div>
						</div>
					</article>
					<!-- Comment Section -->
					{{-- <div class="comments">
						<h5>Comments (3)</h5>
						<!-- Comment -->
						<div class="media comment">
							<img src="images/speakers/speaker-thumb-four.jpg" alt="image">
							<div class="media-body">
								<h6>Jessica Brown</h6>
								<ul class="list-inline">
									<li class="list-inline-item"><span class="fa fa-calendar"></span>Mar 20, 2016</li>
									<li class="list-inline-item"><a href="#">Reply</a></li>
								</ul>
								<p>
									Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudant tota rem ape riamipsa eaque  quae nisi ut aliquip commodo consequat. 
								</p>
								<!-- Nested Comment -->
								<div class="media comment">
									<img src="images/speakers/speaker-thumb-three.jpg" alt="image">
									<div class="media-body">
										<h6>Jonathan Doe</h6>
										<ul class="list-inline">
											<li class="list-inline-item"><span class="fa fa-calendar"></span>Mar 20, 2016</li>
										</ul>
										<p>
											Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudant tota rem ape riamipsa eaque  quae nisi 
										</p>
									</div>
								</div>
							</div>
						</div>
						<!-- Comment -->
						<div class="media comment">
							<img src="images/speakers/speaker-thumb-two.jpg" alt="image">
							<div class="media-body">
								<h6>Adam Smith</h6>
								<ul class="list-inline">
									<li class="list-inline-item"><span class="fa fa-calendar"></span>Mar 20, 2016</li>
									<li class="list-inline-item"><a href="#">Reply</a></li>
								</ul>
								<p>
									Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudant tota rem ape riamipsa eaque  quae nisi ut aliquip commodo consequat. 
								</p>
							</div>
						</div>
					</div> --}}
					{{-- <div class="comment-form">
						<h5>Leave A Comment</h5>
						<form action="#" class="row">
							<div class="col-12">
								<textarea class="form-control main" name="comment" id="comment" rows="10" placeholder="Your Review"></textarea>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control main" name="text" id="name" placeholder="Your Name">
							</div>
							<div class="col-md-6">
								<input type="email" class="form-control main" name="email" id="email" placeholder="Your Email">
							</div>
							<div class="col-12">
								<button class="btn btn-main-md" type="submit">Submit Now</button>
							</div>
						</form>
					</div> --}}
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
