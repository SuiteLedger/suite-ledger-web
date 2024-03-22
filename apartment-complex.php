<?php
include_once ('header.php');

?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Apartment Complexes</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Apartment</a></li>
        <li class="breadcrumb-item active">List Apartment Complexes</li>
      </ol>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>Complex Name</th>
                <th>Address</th>
                <th>Contact Person</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Number of Buildings</th>
                <th>Number of Units</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Complex Name</th>
                <th>Address</th>
                <th>Contact Person</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Number of Buildings</th>
                <th>Number of Units</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <tr>
                <td>Central Park Apartments</td>
                <td>123 Main St, New York, NY 10001</td>
                <td>John Smith</td>
                <td>(212) 555-1234</td>
                <td>centralpark@apartments.com</td>
                <td>2</td>
                <td>100</td>
                <td>
                  <button type="button" href="edit-apartment-complex.php"
                    class="btn btn-primary btn-sm edit-btn">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm delete-btn">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <script>
    const editButtons = document.querySelectorAll('.edit-btn');
    const deleteButtons = document.querySelectorAll('.delete-btn');

    editButtons.forEach(button => {
      button.addEventListener('click', () => {
        window.location.href = "edit-apartment-complex.php"; // Replace with actual edit URL
      });
    });

    deleteButtons.forEach(button => {
      button.addEventListener('click', () => {
        const confirmation = confirm("Are you sure you want to delete this apartment complex?");
        if (confirmation) {
          // Add logic to handle deletion (e.g., redirect to delete script)
          console.log("Apartment complex deleted!"); // Replace with actual deletion logic
        } else {
          console.log("Deletion cancelled.");
        }
      });
    });
  </script>
  <?php include_once ('footer.php'); ?>