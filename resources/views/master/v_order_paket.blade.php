@extends('master.layouts.master')
<style>
		.modal-dialog {
		    flex: initial;
		}
		</style>
<section class="inner-intro bg-img light-color overlay-before parallax-background">
  <div class="container">
    <div class="row title">
      <div class="title_row">
        <h1 data-title="Service"><span>Order Paket</span></h1>
        <div class="page-breadcrumb">
          <a href="{{url('/home')}}">Home</a>/ <span>Order Paket</span>
        </div>

      </div>

    </div>
  </div>
</section>
@section('content')
<section class="padding ptb-xs-40">
				<div class="romana_chect_out_form_area sp">
					<div class="container">
						<form method="POST" action="{{url('/postorder')}}">
							{{csrf_field()}}
							<div class="romana_check_out_form">
								<div class="row">
									<div class="col-lg-8">
										<div class="check_form_left common_input">
											<div class="heading-box pb-30">
												<h2><span>Detail&nbsp;</span>Pesanan</h2>
												<span class="b-line l-left"></span>
											</div>
											<input name="master_id" value="{{$master->user_id}}" hidden="" class="form-control">
											<div class="row">
												<div class="col-sm-6">

													<span>Nama:</span>
													<input type="text" name="name" value="{{$master->name}}" readonly="" class="form-control">
												</div>
												<div class="col-sm-6">
													<span>Username:</span>
													<input type="text" name="username" value="{{auth()->user()->username}}" readonly="" class="form-control">
												</div>
											</div>
												  @if($master->kecamatan == null)
												<div class="row">
												<div class="col-sm-6">
													<span>kecamatan:</span>
													<input type="text" name="kecamatan" value="{{old('kecamatan')}}" placeholder="silahkan isi kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" style="margin-bottom: 0px">
													@if($errors->has('kecamatan'))
													<span class="help-block" style="color: #c80000">{{($errors->first('kecamatan'))}}</span>
													@endif
												</div>
												@else()
												<div class="row">
												<div class="col-sm-6">
													<span>kecamatan:</span>
													<input type="text" name="kecamatan" value="{{$master->kecamatan}}" placeholder="silahkan isi kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" style="margin-bottom: 0px">
													@if($errors->has('kecamatan'))
													<span class="help-block" style="color: #c80000">{{($errors->first('kecamatan'))}}</span>
													@endif
												</div>
												@endif
												@if($master->kodepos == null)
												<div class="col-sm-6">
													<span>Kodepos:</span>
													<input type="text" name="kodepos" value="{{old('kodepos')}}" placeholder="silahkan isi kodepos" class="form-control @error('kodepos') is-invalid @enderror" style="margin-bottom: 0px">
													@if($errors->has('kodepos'))
													<span class="help-block" style="color: #c80000">{{($errors->first('kodepos'))}}</span>
													@endif
												</div>
											</div>
											@else()
											<div class="col-sm-6">
													<span>Kodepos:</span>
													<input type="text" name="kodepos" value="{{$master->kodepos}}" placeholder="silahkan isi kodepos" class="form-control @error('kodepos') is-invalid @enderror" style="margin-bottom: 0px">
													@if($errors->has('kodepos'))
													<span class="help-block" style="color: #c80000">{{($errors->first('kodepos'))}}</span>
													@endif
												</div>
											</div>
											@endif
											@if($master->alamat == null)
											<div class="row">
												<div class="col-sm-12">
													<span>Alamat:</span>
													<textarea class="col-sm-12" name="alamat" placeholder="silahkan isi alamat" style="margin-bottom: 0px">{{old('kecamatan')}}</textarea>
													@if($errors->has('alamat'))
													<span class="help-block" style="color: #c80000">{{($errors->first('alamat'))}}</span>
													@endif
												</div>
											</div>
											@else()
											<div class="row">
												<div class="col-sm-12">
													<span>Alamat:</span>
													<textarea class="col-sm-12" name="alamat" placeholder="silahkan isi alamat" style="margin-bottom: 0px">{{$master->alamat}}</textarea>
													@if($errors->has('alamat'))
													<span class="help-block" style="color: #c80000">{{($errors->first('alamat'))}}</span>
													@endif
												</div>
											</div>
											@endif
										</div>
									</div>
									<div class="col-lg-4">
										<div class="check_form_right bg-color light-color">
											<div class="heading-box pb-15 ">
												<h2><span>Pesanan</span> Kamu</h2>
												<span class="b-line l-left secondary_bg"></span>

											</div>

											<div class="product_order">
												<ul>
													<li>
														Nama Paket<span>Harga</span>
													</li>
													<li>
														<input name="paket_id" value="{{$data_paket->id}}" hidden="">
														<input name="status_id" value="2" hidden="">
														{{$data_paket->nama_paket}}
														<span>
													Rp {{$data_paket->harga_paket}}</span>
													</li>
													
													<li>
														total:<span>Rp {{$data_paket->harga_paket}}</span>
													</li>
													<li>
														Pilih ART:<span>
															<select name="art_id" class="form-control mb-25" style="color: #000; background-color: #fff;margin-bottom: 0px" required=""> 
															<option value="">
																- pilih -
															</option class="form-control mb-25" style="color: #000">
															@foreach($art as $item)
															<option value="{{$item->id}}" class="form-control mb-25" style="color: #000;" >
																{{$item->name}}
															</option>
															@endforeach
															</select> 
														</span>
													</li>
													@if($errors->has('art'))
													<span class="help-block " style="color: #c80000">{{($errors->first('art'))}}</span>
													@endif
												</ul>
											</div>
											<div class="romana_select_method border pt-15">
												<ul style="padding: 10px">
													Pilih Bank:
													<li>
														@foreach($bank as $item)
														<input type="radio"  name="bank_id" value="{{($item->id)}}" required="">
														<label>{{$item->bank}}</label>
														@endforeach
													</li>
													@if($errors->has('bank'))
													<span class="help-block" style="color: #c80000">{{($errors->first('bank'))}}</span>
													@endif
												</ul>
												
											</div>
											<div class="text-center pt-15" >
											<button class="btn-text white-btn " type="submit">CheckOut</button> </div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<!-- column End -->
					</div>
					<!-- container End -->
				</div>
			</section>

			<!--End Contact-->
			
@endsection