<div>
    <form action="{{ route('movies.update', $movie) }}" method="POST">
    @csrf
    @method('PUT')

</div>
