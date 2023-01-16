<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Project</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('projects.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('projects.update',$project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Project Name:</strong>
                        <input type="text" name="projectname" value="{{ $project->projectname }}" class="form-control"
                            placeholder="Project name">
                        @error('projectname')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Client:</strong>
                        <input type="text" name="client" class="form-control" placeholder="Client"
                            value="{{ $project->client }}">
                        @error('client')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Project Leader:</strong>

                        
                        <label for="leader_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                        <select id="leader_id" name="leader_id" class="form-control">
                            <option selected>Choose a leader</option>
                          @foreach ($leaders as $leader)
                            <option value="{{ $leader->id }}">{{ $leader->leadername }}</option>
                          @endforeach
                        </select>

                        <!--<input type="text" name="leader" class="form-control" placeholder="Project Leader">-->
                        @error('leader')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Start Date:</strong>
                        <input type="text" name="startdate" value="{{ $project->startdate }}" class="form-control"
                            placeholder="Start Date">
                        @error('startdate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>End Date:</strong>
                        <input type="text" name="enddate" value="{{ $project->enddate }}" class="form-control"
                            placeholder="End Date">
                        @error('enddate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Progress:</strong>
                        <input type="number" name="progress" max="100" value="{{ $project->progress }}" class="form-control"
                            placeholder="Progress">
                        @error('progress')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>