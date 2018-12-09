<?php

require __DIR__ . '/../../classes/models.class.php';

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {

    if ($model->getAllManufacturers()){

        $payload = $model->manufacturer;

        if (!empty($payload)){

            $returnData = [
                'error' => false,
                'payload' => $model->manufacturer
            ];

            echo json_encode($returnData);

        }else{

            $returnData = [
                'error' => true,
                'message' => 'No Manufacturer added yet'
            ];

            echo json_encode($returnData);

        }

    }else{

        $returnData = [
            'error' => true,
            'message' => 'Something went wrong'
        ];

        echo json_encode($returnData);

    }

}