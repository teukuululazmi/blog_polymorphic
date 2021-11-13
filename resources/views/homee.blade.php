@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Basic form inputs</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                	</div>
	                	</div>
					</div>
						<div class="success" data-success="{{Session::get('success')}}"></div>
					<div class="card-body">
						<p class="mb-4">Examples of standard form controls supported in an example form layout. Individual form controls automatically receive some global styling. All textual <code>&lt;input></code>, <code>&lt;textarea></code>, and <code>&lt;select></code> elements with <code>.form-control</code> are set to <code>width: 100%;</code> by default. Wrap labels and controls in <code>.form-group</code> for optimum spacing. Labels in horizontal form require <code>.col-form-label</code> class.</p>

						<form action="{{ route('uploadPost') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold">Basic file inputs</legend>

								<div class="form-group row">
									<label class="col-form-label col-lg-2">Foto</label>
									<div class="col-lg-10">
										<input type="file" name="foto" class="form-control h-auto">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-lg-2">Judul</label>
									<div class="col-lg-10">
										<input type="text" name="judul" class="form-control">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-lg-2">Keterangan</label>
									<div class="col-lg-10">
										<textarea rows="3" cols="3" name="keterangan" class="form-control" placeholder="Default textarea"></textarea>
									</div>
								</div>
							</fieldset>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
					</div>
				</div>

				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">List Data</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
						<p class="mb-4">example form layout. Individual form controls automatically receive some global styling. All textual <code>&lt;input></code>, <code>&lt;textarea></code>, and <code>&lt;select></code> elements with <code>.form-control</code> are set to <code>width: 100%;</code> by default. Wrap labels and controls in <code>.form-group</code> for optimum spacing. Labels in horizontal form require <code>.col-form-label</code> class.</p>

						<div class="row">
							@foreach ($foto as $item)
						<div class="col-md-6">
							<div class="card">
								<div class="card-img-actions">
									<img class="card-img-top img-fluid" src="{{ url('/Images/'.$item->foto) }}" alt="">
									<div class="card-img-actions-overlay card-img-top">
										<a href="{{ route('uploadDelete', $item->id) }}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2 delete"><i
                                                        class="icon-trash"></i></a>
										<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2" data-toggle="modal"
                                                    data-target="#id{{ $item->id }}"><i class="icon-arrow-up-right32"></i></a>
									</div>
								</div>

								<div class="card-body text-center">
									<h6 class="font-weight-semibold mb-0">{{ $item->judul }}</h6>
									<span class="d-block text-muted">{{ $item->keterangan }}</span>
								</div>
							</div>
						</div>
						<div id="id{{ $item->id }}" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Upload</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('uploadUpdate', $item->id) }}" method="POST">
                                                @method('patch')
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-3">Keterangan</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="keterangan"
                                                            value="{{ $item->keterangan }}" required>
                                                    </div>
                                                </div>
                                                <div class="form_group">
                                                    <button type="submit"
                                                        class="btn btn-danger float-right success">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
						@endforeach
						</div>
					
					</div>
				</div>
@endsection
