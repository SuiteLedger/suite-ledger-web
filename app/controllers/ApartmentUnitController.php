<?php

class ApartmentUnitController extends Controller
{
    public function index()
    {
        $this->list();
    }

    public function add() {
        $this->manageApartmentUnit();
    }

    public function edit($id= '') {
        $this->manageApartmentUnit($id);
    }

    public function delete($id= '') {
        try {
            $apartmentUnit = new ApartmentUnit();
            $apartmentUnit->update($id, ['status' => STATUS_DELETED]);
            setPageMessage(MESSAGE_TYPE_SUCCESS, "Apartment unit deleted successfully!");
        } catch (Exception $e) {
            setPageMessage(MESSAGE_TYPE_ERROR,
                "Failed to delete the apartment unit. Please try again!");
        }
    }

    public function list($apartmentId)
    {

        $data['pageTitle'] = "Apartment Units";

        if(!empty($apartmentId)) {
            if (!is_numeric($apartmentId)) {
                $this->notFound();
                die;
            }
        }

        $apartmentComplexModel = new ApartmentComplex();
        $apartmentComplex = $apartmentComplexModel->selectOne(['id'=>$apartmentId]);

        if(!$apartmentComplex) {
            $this->notFound();
            die;
        }

        $apartmentUnitModel = new ApartmentUnit();
        $data['apartmentUnits']
            = $apartmentUnitModel->selectAll(['apartment_complex'=>$apartmentId], true);
        $this->view('list-apartment-units', $data);
    }

    public function manageApartmentUnit($id= '')
    {
        $editItem = false;
        $data['pageTitle'] = "Add Apartment Unit";
        $data['pageUrl'] = PAGE_URL_ADD_APARTMENT_UNIT;
        $apartmentUnitModel = new ApartmentUnit();

        if(!empty($id)) {
            if (!is_numeric($id)) {
                $this->notFound();
                die;
            }

            $editItem = true;
            $data['pageTitle'] = "Edit Apartment Unit";
            $data['pageUrl'] = PAGE_URL_EDIT_APARTMENT_UNIT . "/" . $id;
        }

        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            if($editItem) {

                $apartmentUnitToEdit = $apartmentUnitModel->selectOne(["id"=>$id]);

                if(!$apartmentUnitToEdit) {
                    $this->notFound();
                    die;
                }

                foreach ($apartmentUnitToEdit as $key => $value) {
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

            if ($apartmentUnitModel->validate($_POST, $editItem)) {

                if($editItem) {
                    $_POST['apartment_complex'] = 1; //TODO: Replace with correct apartment complex id
                    $_POST['updated_by'] = Authentication::getLoggedInUser()->id;
                    $_POST['updated_date'] = date("Y=m-d H:i:s");
                    $apartmentUnitModel->update($itemId, $_POST);
                    $result = $itemId;
                } else {
                    $_POST['apartment_complex'] = 1; //TODO: Replace with correct apartment complex id
                    $_POST['created_by'] = Authentication::getLoggedInUser()->id;
                    $_POST['created_date'] = date("Y=m-d H:i:s");
                    $_POST['status'] = STATUS_ACTIVE;
                    $result = $apartmentUnitModel->insert($_POST);
                }

                if($editItem) {
                    setPageMessage(MESSAGE_TYPE_SUCCESS,
                        "Apartment unit \"" . $_POST['unit_no'] . "\" updated Successfully!");
                } else {
                    setPageMessage(MESSAGE_TYPE_SUCCESS,
                        "Apartment unit \"" . $_POST['unit_no'] . "\" created successfully.");
                    redirect(PAGE_URL_ADD_APARTMENT_COMPLEX);
                }

            }

            $data['errors'] = $apartmentUnitModel->errors;

        }

        $this->view('add-apartment-unit', $data);

    }

}
