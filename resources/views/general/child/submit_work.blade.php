<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>{{$rules->title}}</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item active">Sebelum mensubmit karya, baca terlebih dahulu persyaratannya</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--==== FAQ ====-->
<section class="section faq">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="accordion-block">
					<div id="accordion">
						<!-- Collapse -->
                        @php
                            $ordinal = ["One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
                            $i = 0;
                        @endphp
                        @foreach ($rules->section as $s)
						<div class="card">
							<!-- Collapse Header -->
							<div class="card-header" id="headingOne">
							  <h5 class="mb-0">
							    <a data-toggle="collapse" href="#collapse{{$ordinal[$i]}}">
							      <span class="fa fa-plus-circle"></span>{{$s->title}}
							    </a>
							  </h5>
							</div>
							<!-- Collapse Body -->
							<div id="collapse{{$ordinal[$i]}}" class="collapse show" data-parent="#accordion">
							  <div class="card-body">
                                <ol class="ml-3">
                                    @foreach ($s->list as $l)
                                    <li>{{$l}}</li>
                                    @endforeach
                                </ol>
							  </div>
							</div>
                            <input type="hidden" name="iterable" value="{{$i++}}">
						</div>
                        @endforeach
                        <div class="card">
							<!-- Collapse Header -->
							<div class="card-header" id="headingOne">
							  <h5 class="mb-0">
							    <a data-toggle="collapse" href="#collapse{{$ordinal[$i]}}">
							      <span class="fa fa-plus-circle"></span>Form penerimaan karya
							    </a>
							  </h5>
							</div>
							<!-- Collapse Body -->
							<div id="collapse{{$ordinal[$i]}}" class="collapse show" data-parent="#accordion">
							  <div class="card-body">
                                <iframe id="google-form" src="{{ str_replace('usp=sf_link', 'embedded=true', $rules->externalFormLink) }}" width="100%" frameborder="0" marginheight="0" marginwidth="0" scrolling="yes" style="height: 75vh">Loading…</iframe>
							  </div>
							</div>
						</div>
						<!-- Collapse -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>