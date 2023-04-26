<!DOCTYPE html>
<html>
<head>
	<title>Image Gallery</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<style>
		.gallery-item {
			margin-bottom: 30px;
		}
		.gallery-item img {
			width: 100%;
			max-height: 200px;
			object-fit: cover;
        }
	</style>
</head>
<body>

	<div class="container my-5">
		<h1 class="text-center mb-4">Image Gallery</h1>

		<form method="POST" action="{{route('upload')}}" enctype="multipart/form-data">
            @csrf
			<div class="form-group">
				<label for="image">Choose Image:</label>
				<input type="file" class="form-control-file" id="image" name="image" required>
			</div>
            <button type="submit" class="btn btn-primary">Upload</button>
		</form>

		<hr>

		<div class="row">
            @foreach($images as $IMG)
			<div class="col-md-4 col-sm-6 gallery-item">
				<a href="#" data-toggle="modal" data-target="#imageModal{{$IMG->id}}">
					<img src="{{asset('storage/'.$IMG->image)}}" alt="Image {{$IMG->id}}">
				</a>
			</div>

            <!-- Image Modal -->
            <div class="modal fade" id="imageModal{{$IMG->id}}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{$IMG->id}}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel{{$IMG->id}}">Image {{$IMG->id}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{asset('storage/'.$IMG->image)}}" class="img-fluid" alt="Image {{$IMG->id}}">
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="{{route('delete', $IMG->id)}}" class="mr-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
		</div>

	</div>

</body>
</html>
