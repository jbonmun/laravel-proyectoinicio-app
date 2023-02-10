<!-- Estilo de bootstrapp para colocar el formulario arriba-derecha -->
<!-- NO FUNCIONA: SE QUEDA ABAJO-IZQUIERDA-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<div class="col-md-4">

    <div class="card">
        <div class="card-header">
            <h3>Contribute a link</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/community">
                {{ csrf_field() }}
                <div class="form-group">
                    <!-- Validation Errors-->
                    <label for="title">Title:</label>
                    <input type="text" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" placeholder="What is the title of your article?">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="link">Link:</label>
                    <input type="text" class="form-control @error ('link') is-invalid @enderror" id="link" name="link" placeholder="What is the URL?">
                    @error('link')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group card-footer">
                    <button class="btn btn-primary">Contribute Link</button>
                </div>
            </form>
        </div>

    </div>

</div>