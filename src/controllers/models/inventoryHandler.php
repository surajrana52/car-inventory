<?php

require __DIR__ . '/../../classes/models.class.php';

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {

    if ($_POST['type'] == 'get_data') {

        if ($model->getAllModels()) {

            $payload = $model->models;

            $returnData = [
                'error' => false,
                'payload' => $payload
            ];

            echo json_encode($returnData);

        }

    }


    if ($_POST['type'] == 'data_byId') {

        $record_id = $_POST['id'];

        if ($model->getModelById($record_id)) {

            $payload = $model->modelById;

            $returnData = [
                'error' => false,
                'payload' => $payload
            ];

            echo json_encode($returnData);


        }


    }

    if ($_POST['type'] == 'sell_model') {

        $record_id = $_POST['id'];

        if ($model->sellModelById($record_id)) {

            $returnData = [
                'error' => false,
                'debug' => $model->debug,
                'message' => 'Model Sold Successfully'
            ];

            echo json_encode($returnData);

        } else {

            $returnData = [
                'error' => true,
                'message' => 'Something went wrong'
            ];

            echo json_encode($returnData);

        }

    }


}