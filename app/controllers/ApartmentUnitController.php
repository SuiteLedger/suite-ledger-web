<?php

class ApartmentUnitController extends Controller
{
    public function index()
    {
        $this->list();
    }

    public function add($apartmentComplexId = '')
    {

        $data['pageTitle'] = "Add Apartment Units";

        if(isClientUser()) {
            $apartmentComplexId = getLoggedInUser()->apartment_complex;
        } else {
            if (empty($apartmentComplexId) || !is_numeric($apartmentComplexId)) {
                $this->notFound();
                die;
            }
        }

        $apartmentComplexModel = new ApartmentComplex();
        $apartmentComplex = $apartmentComplexModel->selectOne(['id' => $apartmentComplexId]);
        $data['apartmentComplex'] = $apartmentComplex;

        $data['pageUrl'] = PAGE_URL_ADD_APARTMENT_UNIT . "/" . $apartmentComplex->id;

        if (!$apartmentComplex) {
            $this->notFound();
            die;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $apartmentUnitModel = new ApartmentUnit();
            if ($apartmentUnitModel->validate($_POST)) {
                $_POST['apartment_complex'] = $apartmentComplex->id;
                $_POST['created_by'] = Authentication::getLoggedInUser()->id;
                $_POST['created_date'] = getCurrentDateTime();
                $_POST['status'] = STATUS_ACTIVE;
                $newApartmentUnitId = $apartmentUnitModel->insert($_POST);

                $apartmentUnitAccountModel = new ApartmentUnitAccount();
                $apartmentUnitAccountModel->insert([
                    'apartment_unit' => $newApartmentUnitId,
                    'balance' => 0,
                    'approved_payments' => 0,
                    'pending_approval' => 0,
                    'last_updated_date' => getCurrentDateTime()
                ]);

                setPageMessage(MESSAGE_TYPE_SUCCESS,
                    "Apartment unit \"" . $_POST['unit_no'] . "\" created successfully.");
                redirect($data['pageUrl']);

            }
            $data['errors'] = $apartmentUnitModel->errors;
        }

        $this->view('add-apartment-unit', $data);

    }

    public function edit($id = '')
    {

        if (empty($id) || !is_numeric($id)) {
            $this->notFound();
            die;
        }

        $data['pageTitle'] = "Edit Apartment Unit";
        $data['pageUrl'] = PAGE_URL_EDIT_APARTMENT_UNIT . "/" . $id;

        $apartmentUnitModel = new ApartmentUnit();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $apartmentUnitToEdit = $apartmentUnitModel->selectOne(["id" => $id]);

            if (!$apartmentUnitToEdit) {
                $this->notFound();
                die;
            }

            $apartmentComplexModel = new ApartmentComplex();
            $apartmentComplex = $apartmentComplexModel->selectOne(['id' => $apartmentUnitToEdit->apartment_complex]);
            $data['apartmentComplex'] = $apartmentComplex;

            foreach ($apartmentUnitToEdit as $key => $value) {
                $_POST[$key] = $value;
            }
        }



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($apartmentUnitModel->validate($_POST, true)) {

                $_POST['apartment_complex'] = 1; //TODO: Replace with correct apartment complex id
                $_POST['updated_by'] = Authentication::getLoggedInUser()->id;
                $_POST['updated_date'] = date("Y=m-d H:i:s");
                $apartmentUnitModel->update($_POST['id'], $_POST);

                setPageMessage(MESSAGE_TYPE_SUCCESS,
                    "Apartment unit \"" . $_POST['unit_no'] . "\" updated Successfully!");
                redirect($data['pageUrl']);

            }

            $apartmentComplexModel = new ApartmentComplex();
            $apartmentComplex = $apartmentComplexModel->selectOne(['id' => $_POST['apartment_complex']]);
            $data['apartmentComplex'] = $apartmentComplex;

            $data['errors'] = $apartmentUnitModel->errors;

        }

        $this->view('add-apartment-unit', $data);

    }



    public function delete($id = '')
    {
        try {
            $apartmentUnit = new ApartmentUnit();
            $apartmentUnit->update($id, ['status' => STATUS_DELETED]);
            setPageMessage(MESSAGE_TYPE_SUCCESS, "Apartment unit deleted successfully!");
        } catch (Exception $e) {
            setPageMessage(MESSAGE_TYPE_ERROR,
                "Failed to delete the apartment unit. Please try again!");
        }
    }

    public function list($apartmentId = '')
    {

        $data['pageTitle'] = "Apartment Units";

        if(isClientUser()) {
            $apartmentId = getLoggedInUser()->apartment_complex;
        } else {
            if(!empty($apartmentId) && !is_numeric($apartmentId)) {
                $this->notFound();
                die;
            }
        }

        $apartmentUnitModel = new ApartmentUnit();
        $data['apartmentUnits'] = $apartmentUnitModel->selectApartmentUnitsByApartmentComplex($apartmentId);
        $this->view('list-apartment-units', $data);
    }



}
