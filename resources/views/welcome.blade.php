<!DOCTYPE html>
<html>
<head>
    <title>Candidate</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

<div class="" style="margin: 0px 25px">
    <h1>DataTable Candidate</h1>
    <a class="btn btn-success" href="javascript:void(0)" id="createNewCandidate"> Create New Candidate</a>
    <table class="table table-bordered data-table" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Fullname</th>
                <th>Day of Birth</th>
                <th>Place of Birth</th>
                <th>Gender</th>
                <th>Experience (Year)</th>
                <th>Last salary</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="candidateForm" name="candidateForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-sm-4 control-label">Phone Number</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="full_name" class="col-sm-2 control-label">Fullname</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Fullname" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-4 control-label">Day of Birth</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Day of Birth" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pob" class="col-sm-4 control-label">Place of Birth</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="pob" name="pob" placeholder="Enter Place of Birth" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-4 control-label">Gender</label>
                        <div class="col-sm-12">
                            <select class="form-select" aria-label="Default select example">
                                <option value="gender" selected id="gender" name="gender">Select Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="year_exp" class="col-sm-6 control-label">Experience (Year)</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="year_exp" name="year_exp" placeholder="Enter Experience (Year)" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_salary" class="col-sm-6 control-label">Last Salary</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="last_salary" name="last_salary" placeholder="Enter Last Salary" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
  $(function () {

    /*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    /*------------------------------------------
    --------------------------------------------
    Render DataTable
    --------------------------------------------
    --------------------------------------------*/
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('candidates.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'email', name: 'email'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'full_name', name: 'full_name'},
            {data: 'dob', name: 'dob'},
            {data: 'pob', name: 'pob'},
            {data: 'gender', name: 'gender'},
            {data: 'year_exp', name: 'year_exp'},
            {data: 'last_salary', name: 'last_salary'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewCandidate').click(function () {
        $('#saveBtn').val("create-candidate");
        $('#id').val('');
        $('#candidateForm').trigger("reset");
        $('#modelHeading').html("Create New Candidate");
        $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editProduct', function () {
      var id = $(this).data('id');
      $.get("{{ route('candidates.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Candidate");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#email').val(data.email);
          $('#phone_number').val(data.phone_number);
          $('#full_name').val(data.full_name);
          $('#dob').val(data.dob);
          $('#pob').val(data.pob);
          $('#gender').val(data.gender);
          $('#year_exp').val(data.year_exp);
          $('#last_salary').val(data.last_salary);
      })
    });

    /*------------------------------------------
    --------------------------------------------
    Create Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
          data: $('#candidateForm').serialize(),
          url: "{{ route('candidates.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#candidateForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();

          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });

    /*------------------------------------------
    --------------------------------------------
    Delete Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteProduct', function () {

        var product_id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "{{ route('candidates.store') }}"+'/'+product_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

  });
</script>
</html>
