@extends('layouts.app', ['linkrujukan' => 'active', 'linkrujukancreate' => 'active'])

@section('content')
	<div id="wrapper">
		<!-- MAIN CONTENT -->
		<div id="main-content">
			<div class="container-fluid">
				<div class="section-heading">
					<h1 class="page-title">Edit Surat Rujukan</h1>
					<hr>
				</div>
				<div class="panel-content">
					<p class="margin-bottom-30"></p>
					{!! Form::model($setting, ['route'=>['rujukan.update', $setting->id], 'method'=>'patch']) !!}
						{!! Form::textarea('body', $setting->body, ['class'=>'summernote']) !!}
						{!! Form::submit('UPDATE', ['class'=>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection

@push('style')
	<link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/summernote/summernote.css') }}">
	<link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/bootstrap-markdown/bootstrap-markdown.min.css') }}">
@endpush
@push('scripts')
	<script src="{{ asset('diffdash/assets/vendor/markdown/markdown.js') }}"></script>
	<script src="{{ asset('diffdash/assets/vendor/to-markdown/to-markdown.js') }}"></script>
	<script src="{{ asset('diffdash/assets/vendor/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
	<script src="{{ asset('diffdash/assets/vendor/summernote/summernote.min.js') }}"></script>
	<script type="text/javascript">
		$(function() {
			// summernote editor
			$('.summernote').summernote({
				height: 500,
				focus: true,
				onpaste: function() {
					alert('You have pasted something to the editor');
				},
			});

			// markdown editor
			var initContent = '<h4>Hello there</h4> ' +
				'<p>How are you? I have below task for you :</p> ' +
				'<p>Select from this text... Click the bold on THIS WORD and make THESE ONE italic, ' +
				'link GOOGLE to google.com, ' +
				'test to insert image (and try to tab after write the image description)</p>' +
				'<p>Test Preview And ending here...</p> ' +
				'<p>Click "List"</p> Enjoy!';

			$('#markdown-editor').text(toMarkdown(initContent));
		});
	</script>
@endpush