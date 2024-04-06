<?php

class ApartmentComplexController extends Controller
{

    public function index()
    {
        $this->list();
    }

    public function add() {
        $this->manageApartment();
    }

    public function edit($id= '') {
        $this->manageApartment($id);
    }

    public function delete($id= '') {
        try {
            $apartmentComplex = new ApartmentComplex();
            $apartmentComplex->update($id, ['status' => STATUS_DELETED]);
            setPageMessage(MESSAGE_TYPE_SUCCESS, "Apartment complex deleted successfully!");
        } catch (Exception $e) {
            setPageMessage(MESSAGE_TYPE_ERROR,
                "Failed to delete the apartment complex. Please try again!");
        }
    }

    public function list()
    {
        $data['pageTitle'] = "Apartments";
        $apartmentComplex = new ApartmentComplex();
        if(isClientUser()) {
            $data['apartments'] = $apartmentComplex->selectAll(['id' => getLoggedInUser()->apartment_complex],
                true);
        } else {
            $data['apartments'] = $apartmentComplex->selectAll([], true);
        }

        $this->view('list-apartment-complex', $data);
    }

    public function manageApartment($id= '')
    {
        $editItem = false;
        $data['pageTitle'] = "Add Apartment";
        $data['pageUrl'] = PAGE_URL_ADD_APARTMENT_COMPLEX;
        $apartmentComplexModel = new ApartmentComplex();

        if(!empty($id)) {
            if (!is_numeric($id)) {
                $this->notFound();
                die;
            }

            $editItem = true;
            $data['pageTitle'] = "Edit Apartment";
            $data['pageUrl'] = PAGE_URL_EDIT_APARTMENT_COMPLEX . "/" . $id;
        }

        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            if($editItem) {

                $apartmentComplexToEdit = $apartmentComplexModel->selectOne(["id"=>$id]);

                if(!$apartmentComplexToEdit) {
                    $this->notFound();
                    die;
                }

                foreach ($apartmentComplexToEdit as $key => $value) {
                    $_POST[$key] = $value;
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $itemId = 0;
            if(!empty($_POST['id'])) {
                $editItem = true;
                $itemId = $_POST['id'];
            }

            if ($apartmentComplexModel->validate($_POST, $editItem)) {

                if($editItem) {
                    $_POST['updated_by'] = Authentication::getLoggedInUser()->id;
                    $_POST['updated_date'] = date("Y=m-d H:i:s");
                    $apartmentComplexModel->update($itemId, $_POST);
                    $result = $itemId;
                } else {
                    $_POST['created_by'] = Authentication::getLoggedInUser()->id;
                    $_POST['created_date'] = date("Y=m-d H:i:s");
                    $result = $apartmentComplexModel->insert($_POST);
                }

                if($editItem) {
                    setPageMessage(MESSAGE_TYPE_SUCCESS,
                        "Apartment Complex \"" . $_POST['name'] . "\" Updated successfully.");
                } else {
                    setPageMessage(MESSAGE_TYPE_SUCCESS,
                        "Apartment Complex \"" . $_POST['name'] . "\" Created successfully.");
                    redirect(PAGE_URL_ADD_APARTMENT_COMPLEX);
                }

            }

            $data['errors'] = $apartmentComplexModel->errors;

        }

        $this->view('add-apartment-complex', $data);

    }

}
