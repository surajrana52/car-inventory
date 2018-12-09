<?php

require __DIR__ . '/../../classes/validator.php';
require __DIR__ . '/../../classes/manufacturer.class.php';

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {

    $mfgName = $_POST['mfg_name'];

    if ($validator->alphaOnly($mfgName)) {

        if ($manufacturer->addNewManufacturer($mfgName)) {

            $returnData = [
                'error' => false,
                'message' => 'Manufacturer ' . $mfgName . ' added successfully'
            ];

            echo json_encode($returnData);

        }

    } else {

        $returnData = [
            'error' => true,
            'message' => 'Manufacturer name can only contain letters'
        ];

        echo json_encode($returnData);

    }


}