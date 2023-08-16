<div class="button"> 
                <button type="button" id="add-button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></button>
            </div>
            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button"  class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Topic</h4>
                    </div>
                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="row">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            
                            <div class="row ">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="row ">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                            <div class="row">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="teacher">Teacher</option>    
                                    <option value="admin">Admin</option>
                                    <option value="superadmin">Superadmin</option>
                                    
                                </select>
                            </div>
                        </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-info" >Create Admin User</button>
                            </div>
                    </form>
                </div> 
            </div>
        </div>
<!-- <form action="{{ url('/contact') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <textarea name="message" placeholder="Message"></textarea>
    <button type="submit">Submit</button>
</form> -->
