@extends('layouts.app')

@section('content')
	<!-- Secondary sidebar -->
	<div class="sidebar sidebar-secondary sidebar-default pull-left">
		<div class="sidebar-content">
			<!-- Active users -->
			<div class="sidebar-category">
				<div class="category-title">
					<span>Group users</span>
				</div>

				<div class="category-content">
					<ul class="media-list">
					@foreach ($users as $user)
						<li class="media">
							<a href="#" class="media-left"><img src="{{ $user->avatar }}" class="img-sm img-circle" alt=""></a>
							<div class="media-body">
								<a href="{{ route('chat.index', ['group' => $group, 'user' => $user->id]) }}" class="media-heading text-semibold">{{ $user->name }}</a>
							</div>
						</li>
					@endforeach
					</ul>
				</div>
			</div>
			<!-- /online-users -->
		</div>
	</div>
	<!-- /secondary sidebar -->

	<input id="partner" type="hidden" value="{{ $partner->id }}">
	<!-- Messages -->
	<div class="panel panel-flat pull-right" style="width:70%">
		<div class="panel-heading">
			<h6 class="panel-title">Conversation with {{ $partner->name }}</h6>
		</div>

		<div class="panel-body">
			<ul class="media-list chat-list content-group">
				@foreach ($messages as $message)
					@if ($message->sender == Auth::user())
						<!-- Outgoing messages -->
						<li class="media reversed">
							<div class="media-body">
								<div class="media-content">{{ $message->message }}</div>
								<span class="media-annotation display-block mt-10">{{ $message->created_at }}</span>
							</div>

							<div class="media-right">
								<a href="{{ Auth::user()->avatar }}">
									<img src="{{ Auth::user()->avatar }}" class="img-circle img-md" alt="">
								</a>
							</div>
						</li>
					@else
						<!-- Incoming messages -->
						<li class="media">
							<div class="media-left">
								<a href="{{ $message->sender->avatar }}">
									<img src="{{ $message->sender->avatar }}" class="img-circle img-md" alt="">
								</a>
							</div>

							<div class="media-body">
								<div class="media-content">{{ $message->message }}</div>
								<span class="media-annotation display-block mt-10">{{ $message->created_at }}</span>
							</div>
						</li>
					@endif
				@endforeach
			</ul>
			<textarea id="textbox" name="enter-message" class="form-control content-group" rows="3" cols="1" placeholder="Enter your message..."></textarea>
		</div>
	</div>
	<!-- /messages -->
@endsection

@push('js')

	<script>
		setInterval(function () {
			$.ajax({
				url: '{{ route('chat.get') }}',
				method: 'get',
				data: {
					_token: '{{ csrf_token() }}',
					partner: $('#partner').val()
				},
				success: function (resp) {
					for (let i = 0; i < resp.length; ++i) {
						let $message = '<li class="media">' +
							'<div class="media-body">' +
								'<div class="media-content">' + resp[i].message + '</div>' +
								'<span class="media-annotation display-block mt-10">' + resp[i].created_at + '</span>' +
							'</div>' +

							'<div class="media-right">' +
								'<a href="{{ Auth::user()->avatar }}">' +
									'<img src="{{ Auth::user()->avatar }}" class="img-circle img-md" alt="">' +
								'</a>' +
							'</div>' +
						'</li>';
						$('.chat-list').append($message);



						var messageBody = document.querySelector('.chat-list');
						messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
					}
				},
				error: function (error) {
					console.log(error);
				}
			})
		}, 2000);

		$('#textbox').on('keypress', function (e) {
			let $message = $(this).val();

			if (e.keyCode == 13 && $message.trim().length) {
				$.ajax({
					url: '{{ route('chat.send') }}',
					method: 'post',
					data: {
						_token: '{{ csrf_token() }}',
						message: $message.trim(),
						partner: $('#partner').val()
					},
					success: function (resp) {
						let $message = '<li class="media reversed">' +
							'<div class="media-left">' +
								'<a href="{{ Auth::user()->avatar }}">' +
									'<img src="{{ Auth::user()->avatar }}" class="img-circle img-md" alt="">' +
								'</a>' +
							'</div>' +

							'<div class="media-body">' +
								'<div class="media-content">' + resp.message + '</div>' +
								'<span class="media-annotation display-block mt-10">' + resp.created_at + '</span>' +
							'</div>' +
						'</li>';
						$('.chat-list').append($message);

						var messageBody = document.querySelector('.chat-list');
						messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
					},
					error: function (error) {
						console.log(error);
					}
				});
				$('#textbox').val('');
			}
		});
	</script>

@endpush