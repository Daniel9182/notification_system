<!-- Modal sign up-->
<div class="modal fade" id="SignUpUser" tabindex="-1" role="dialog" aria-labelledby="SignUpUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SignUpUser">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" id="FormSignUp" action="{{ route('user.newuser')}}">
            @csrf 
            <div class="form-group">
              <label for="name">name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="your name">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
              @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="pass">Passwork</label>
              <input type="password" class="form-control" id="pass" name="password" placeholder="your passwork">
              @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="age">age</label>
              <input type="number" class="form-control" id="age" name="age" placeholder="your age">
              @error('age')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                <label for="age">number phone</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="your number phone">
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal access -->
<div class="modal fade" id="LogUser" tabindex="-1" role="dialog" aria-labelledby="LogUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LogUser">Log In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('user.log')}}">
            @csrf
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email_access" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              @error('email_access')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" class="form-control" name="password_access" id="pass">
              @error('password_access')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
      </div> 
    </form>
    </div>
  </div>
</div>

<!-- Modal add post  -->
<div class="modal fade" id="AddPost" tabindex="-1" role="dialog" aria-labelledby="LogUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LogUser">Add new post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('user.newpost') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title">
              <input type="text" class="form-control" id="tipopost" name="tipopost" value="" hidden>
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea class="form-control" name="description" id="desc" rows="3"></textarea>
              @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>  
            <div class="form-group">
              <input type="file"  id="file" name='image'>
              @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Post</button>
      </div> 
    </form>
    </div>
  </div>
</div>

