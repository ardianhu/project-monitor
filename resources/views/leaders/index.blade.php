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
                    <h2>Leader List</h2>
                </div>
                <div class="m-6">
                    <a class="px-5 py-3 bg-green-500 rounded-lg text-white" href="{{ route('projects.index') }}"> Projects List</a>
                </div>
                <div class="m-6">
                    <a class="px-5 py-3 bg-green-500 rounded-lg text-white" href="{{ route('leaders.create') }}">Add Leader</a>
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
                    <th scope="col" class="px-6 py-3 rounded-l-lg">Photo</th>
                    <th scope="col" class="px-6 py-3">Leader Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaders as $leader)
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
                        <td class="px-6 py-4">
                        <img src="{{ asset('img')}}/{{$leader->photo}}" class="w-10 h-10 rounded-full object-cover" alt="{{ $leader->photo }}">    
                        
                        </td>

                        <td class="px-6 py-4">{{ $leader->leadername }}</td>
                        <td class="px-6 py-4">{{ $leader->email }}</td>
                        <td>
                            <form action="{{ route('leaders.destroy',$leader->id) }}" method="Post">
                                <div class="flex space-x-3">
                                <a class="btn btn-primary" href="{{ route('leaders.edit',$leader->id) }}">
                                    <img src="{{ asset('edit.svg') }}" alt="" class="w-10 h-10 p-2 bg-green-600 rounded-md">
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <img src="{{ asset('delete.svg') }}" alt="" class="w-10 h-10 p-2 bg-red-600 rounded-md">
                                </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $leaders->links() !!}
    </div>
    </div>
</body>
</html>