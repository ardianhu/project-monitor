<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Monitor</title>
    @vite('resources/css/app.css')
</head>
<body>

    <div class="flex justify-center items-center">
    <div class="m-10">
        <div class="flex justify-center items-center">
                <div class="">
                    <h2>Project Monitor</h2>
                </div>
                <div class="m-6">
                    <a class="px-5 py-3 bg-green-500 rounded-lg text-white" href="{{ route('leaders.index') }}"> Leader List</a>
                </div>
                <div class="m-6">
                    <a class="px-5 py-3 bg-green-500 rounded-lg text-white" href="{{ route('projects.create') }}"> Create Projects</a>
                </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="block bg-green-200 border-solid border border-green-400 w-1/4 p-4 rounded-lg">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table-auto mt-5">
            <thead class="uppercase bg-slate-200 text-xs">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-l-lg">Project</th>
                    <th scope="col" class="px-6 py-3">Client</th>
                    <th scope="col" class="px-6 py-3">Project Leader</th>
                    <th scope="col" class="px-6 py-3">Start Date</th>
                    <th scope="col" class="px-6 py-3">End Date</th>
                    <th scope="col" class="px-10 py-3">Progress</th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <!-- <script>
function progress() {
  var elmnt = document.getElementById("bar");
  var val = document.getElementById("val");

  if(val.innerHTML != "100%")
  {
    elmnt.classList.add("bg-sky-600");
    elmnt.classList.remove("bg-green-600");

  }
}
</script> -->
                    <tr>
                        <td class="px-6 py-4">{{ $project->projectname }}</td>
                        <td class="px-6 py-4">{{ $project->client }}</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-3 justify-start items-start">
                            <img src="{{ asset('img')}}/{{$project->leader->photo}}" class="w-10 h-10 rounded-full object-cover" alt="">
                            <div>
                            <h1>{{ $project->leader->leadername}}</h1>
                            <h1>{{ $project->leader->email}}</h1>
                            </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $project->startdate }}</td>
                        <td class="px-6 py-4">{{ $project->enddate }}</td>
                        <td class="px-6 py-4">

                        @if($project->progress >= 100)
                        <div class="flex justify-center items-baseline space-x-2">
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 ">
                            <div id="bar" class="bg-green-600 h-2.5 rounded-full " style="width:{{$project->progress}}%"></div>
                        </div>
                        <div class="text-sm" id="val">{{ $project->progress }}%</div>
                        </div>
                        @elseif($project->progress < 100)
                        <div class="flex justify-center items-baseline space-x-2">
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 ">
                            <div id="bar" class="bg-sky-600 h-2.5 rounded-full " style="width:{{$project->progress}}%"></div>
                        </div>
                        <div class="text-sm" id="val">{{ $project->progress }}%</div>
                        </div>
                        @endif


                        </td>
                        <td>
                            <form action="{{ route('projects.destroy',$project->id) }}" method="Post">
                                <div class="flex space-x-3">
                                <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $projects->links() !!}
    </div>
    </div>
</body>
</html>