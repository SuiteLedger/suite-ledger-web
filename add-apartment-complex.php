<?php
include_once('header.php');

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Apartment Complexes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Apartment</a></li>
                            <li class="breadcrumb-item active">Add an Apartment Complex</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <form method="post" action="add-apartment-complex.php">
  <div class="form-group mb-3">  <label for="complex_name">Complex Name:</label>
    <input type="text" class="form-control" id="complex_name" name="complex_name" placeholder="Enter Complex Name" required>
  </div>
  <div class="form-group mb-3">  <label for="address">Address:</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Complex Address" required>
  </div>
  <div class="form-group mb-3">  <label for="contact_person">Contact Person:</label>
    <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person Name" required>
  </div>
  <div class="form-group mb-3">  <label for="contact_number">Contact Number:</label>
    <input type="tel" class="form-control" id="contact_number" name="contact_number" placeholder="Enter Contact Number" required>
  </div>
  <div class="form-group mb-3">  <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
  </div>
  <div class="form-group mb-3">  <label for="no_of_buildings">Number of Buildings:</label>
    <input type="number" class="form-control" min="1" id="no_of_buildings" name="no_of_buildings" placeholder="Enter Number of Buildings" required>
  </div>
  <div class="form-group mb-3">  <label for="no_of_units">Number of Units:</label>
    <input type="number" class="form-control" min="1" id="no_of_units" name="no_of_units" placeholder="Enter Number of Units" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                            </div>
                        </div>
                    </div>
                </main>
                <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script>
  $(document).ready(function() {
    $("#add-apartment-complex-form").validate({
      rules: {
        complex_name: "required",
        address: "required",
        contact_person: "required",
        contact_number: {
          required: true,
          number: true
        },
        email: {
          required: true,
          email: true
        },
        no_of_buildings: {
          required: true,
          number: true,
          min: 1
        },
        no_of_units: {
          required: true,
          number: true,
          min: 1
        }
      },
      messages: {
        complex_name: "Please enter a complex name.",
        address: "Please enter the complex address.",
        contact_person: "Please enter a contact person.",
        contact_number: {
          required: "Please enter a contact number.",
          number: "Please enter a valid phone number."
        },
        email: {
          required: "Please enter an email address.",
          email: "Please enter a valid email address."
        },
        no_of_buildings: {
          required: "Please enter the number of buildings.",
          number: "Please enter a valid number of buildings.",
          min: "The number of buildings must be at least 1."
        },
        no_of_units: {
          required: "Please enter the number of units.",
          number: "Please enter a valid number of units.",
          min: "The number of units must be at least 1."
        }
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>



            <?php include_once('footer.php'); ?>