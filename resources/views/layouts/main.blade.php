
<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
   @include('layouts.component.navbar')
  <!-- /.navbar -->
  @include('layouts.component.sidebar')
  <!-- Main Sidebar Container -->
   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('header')  
    <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.component.footer')
</body>
</html>
