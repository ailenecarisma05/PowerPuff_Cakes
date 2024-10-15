<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
        .div_center{
          text-align: center;
          padding: 40px;
        }
        .h2_font{
          font-size: 40px;
          padding-bottom: 40px;
        }
        .input_color{
          color: black;
          width: 400px;
          margin-right: 15px;
        }
        .center{
          margin: auto;
          width: 50%;
          text-align: center;
          border: 3px solid white;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      @include('admin.header')
        <div class="main-panel"> 
            <div class="content-wrapper">
              @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
              </div>
              @endif
                <div class="div_center" >
                    <h2 class="h2_font">ADD CATEGORY</h2>
                    <form action="{{ url('/add_category') }}" method="post">
                      @csrf
                      <input class="input_color" type="text" name="category" placeholder="Category Name">
                      <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </form>
                </div>
                <table class="center">
                  <tr>
                    <td style="background: #F0B991; padding: 20px;
                    color: black;">Category Name</td>
                    <td style="background: #F0B991; padding: 20px;
                    color: black;">Action</td>
                  </tr>
                  @foreach($data as $data)
                  <tr>
                    <td style="padding: 20px;">{{ $data->category_name }}</td>
                    <td><a onclick="return confirm('Are you sure to Delete this?')" class="btn btn-danger" href="{{ url('delete_category',$data->id) }}">Delete</a></td>
                    
                  </tr>
                  @endforeach
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>