<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Room Managment</title>

    <!-- Custom fonts for this template-->
@include('admin.css')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

   <!-- Sidebar -->
@include('admin.sidebar')
    <!-- Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


@include('admin.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">

@if(session()->has('message'))

<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">
x
</button>

{{session()->get('message')}}
</div>

@endif

<form action="{{url('upload_room')}}" method="POST" enctype="multipart/form-data">

@csrf

            <div style="padding:10px">
                <label for="">Room number</label>
                <input type="number" name="number" placeholder="ex. 123" required="">
            </div>

            <div style="padding:10px">
                <label for="">Room image</label>
                <input type="file" name="file" required="">
            </div>

            <div style="padding:10px">
                <label for="">Description</label>
                <textarea name="description" id="description" cols="50" required="" ></textarea>            
            </div>

            <div style="padding:10px">
                <label for="">Class Room</label>
                <select name="classRoom" required="">

                <option value="Simple">Simple</option>
                <option value="Modern">Modern</option>
                <option value="Luxe">Luxe</option>

                </select>
            </div>


            <div style="padding:10px">
                <label for="">Persons</label>
                <input type="number" name="persons" required="">
            </div>


            <div style="padding:10px">
                <label for="">Price / night</label>
                <input type="number" name="pricenumber" placeholder="in Euro" required="">
            </div>

             <div style="padding:10px">
            <input type="submit" style="color:black;" class="btn btn-primary" required="">           
            </div>


</form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Zakintosh 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
 @include('admin.script')

</body>

</html>