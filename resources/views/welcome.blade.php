<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>📝 Todo List</title>
</head>
<body>
    <div class="container m-5 p-5">
        <div class="row">
            <h1><strong>📝 Todo List</strong></h1>
            <p>A laravel demonstration for CRUD operations.</p>
            <hr>
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <table class="table border table-hover">
                <thead>
                    <tr>
                        <th>Todo</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $todo)
                    <tr>
                        <td>{{ $todo->description }}</td>
                        <td>{{ $todo->status }}</td>
                        <td>{{ $todo->created_at->diffForHumans() }}</td>
                        <td>
                            <button class="btn rounded-pill btn-primary btn-sm">✓</button>
                            <button class="btn rounded-pill btn-light btn-sm">✎</button>
                            <button class="btn rounded-pill btn-light btn-sm">✕</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" data-bs-toggle="modal" data-bs-target="#newTodoModal" class="btn btn-primary btn-sm">New Todo</button>
           
            <!-- New Todo Modal -->
            <div class="modal fade" id="newTodoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Create a New Todo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/newtodo">
                    @csrf
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>