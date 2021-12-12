<div class="row"> 
    <div class="col-md-12">
        <table class="border borderless table">
            <thead>
                
                <th>#</th>
                <th>Name</th> 
            </thead>
            <tbody>
                @forelse($instructorCourse as $key=>$val)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $val->fname}} {{ $val->lname}}</td>
                </tr>
                @empty
                    @include("admin/empty/empty") 
                @endforelse
            </tbody>
        </table>
    <div>
</dov>