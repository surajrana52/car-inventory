<?php

require __DIR__ . '/../database.php';

class Models
{


    private $db;
    public $manufacturer;
    public $models;
    public $modelById;
    public $debug;


    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    /**
     * @return bool
     */

    public function getAllManufacturers()
    {

        try {

            $stmt = $this->db->prepare("SELECT * FROM car_manufacturers");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res = $stmt->fetchAll();
            foreach ($res as $key => $value) {

                $this->manufacturer[$key] = $value;

            }

            return true;
        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;

        }
    }


    /**
     * @return bool
     */

    public function getAllModels()
    {

        try {

            $stmt = $this->db->prepare("SELECT car_manufacturers.manufacturer_name, car_models.id AS id, car_models.model_name, car_models.available_count FROM car_manufacturers INNER JOIN car_models ON  car_manufacturers.id = car_models.car_manufacturers_id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res = $stmt->fetchAll();
            foreach ($res as $key => $value) {

                $this->models[$key] = $value;

            }
            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;

        }

    }

    /**
     * @param $id
     * @return bool
     */

    public function getModelById($id)
    {

        try {

            $stmt = $this->db->prepare("SELECT * FROM car_models WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if ($res = $stmt->fetch()) {
                $this->modelById = $res;
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    /**
     * @param $id
     * @return bool
     */

    public function sellModelById($id)
    {

        try {

            $stmt = $this->db->prepare("SELECT available_count FROM car_models WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res = $stmt->fetch();

            $this->debug = $res;

            if ($res['available_count'] == 1) {

                if ($this->deleteStockRecord($id)) {
                    return true;
                } else {
                    return false;
                }

            } else {

                if ($this->updateModelStock($id)) {
                    return true;
                } else {
                    return false;
                }

            }


        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;

        }

    }


    /**
     * @param $id
     * @return bool
     */

    private function deleteStockRecord($id)
    {

        $stmt = $this->db->prepare("DELETE FROM `car_models` WHERE id = :id");
        $stmt->bindValue(':id', $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

    }


    /**
     * @param $id
     * @return bool
     */

    private function updateModelStock($id)
    {

        $stmt = $this->db->prepare("UPDATE car_models SET available_count = available_count - 1 WHERE available_count > 0 AND id = :id");
        $stmt->bindValue(':id', $id);
        if ($stmt->execute()) {

            return true;

        } else {
            return false;
        }

    }


    /**
     * @param $carMfg
     * @param $carModelName
     * @param $count
     * @param $carColor
     * @param $carMfgYear
     * @param $carRegNo
     * @param $carNote
     * @param $carImageOne
     * @param $carImageTwo
     * @return bool
     */

    public function addNewModel($carMfg, $carModelName, $count, $carColor, $carMfgYear, $carRegNo, $carNote, $carImageOne, $carImageTwo)
    {


        $this->db->beginTransaction();

        try {

            $stmt = $this->db->prepare("INSERT INTO car_models (model_name, available_count, model_color, model_mfg_year, model_reg_number,
                                        model_note,car_manufacturers_id) 
                                        VALUES (:modelName, :avialableCount, :modelColor, :modelMfgYear, :modelRegNumber, :modelNote, :mId)");
            $stmt->bindValue(':modelName', $carModelName);
            $stmt->bindValue(':avialableCount', $count);
            $stmt->bindValue(':modelColor', $carColor);
            $stmt->bindValue(':modelMfgYear', $carMfgYear);
            $stmt->bindValue(':modelRegNumber', $carRegNo);
            $stmt->bindValue(':modelNote', $carNote);
            $stmt->bindValue(':mId', $carMfg);

            if ($stmt->execute()) {

                $recordId = $this->db->lastInsertId();

                if ($this->uploadCarImages($carImageOne, $recordId)) {

                    if ($this->uploadCarImages($carImageTwo, $recordId)) {

                        $this->db->commit();

                    } else {
                        $this->db->rollBack();
                        return false;
                    }

                } else {
                    $this->db->rollBack();
                    return false;
                }

                return true;
            } else {
                $this->db->rollBack();
                return false;
            }

        } catch (PDOException $e) {

            echo $e->getMessage();
            $this->db->rollBack();
            return false;

        }

    }


    /**
     * @param $carImage
     * @param $recordId
     * @return bool
     */

    public function uploadCarImages($carImage, $recordId)
    {

        $file_name = strtotime(date('Y-m-d H:i:s')) . $recordId . rand(1000, 9999);
        $file_tmp = $carImage['tmp_name'];
        $explode = explode('.', $carImage['name']);
        $file_ext = strtolower(end($explode));

        $path = $_SERVER['DOCUMENT_ROOT'] . '/projects/_mini_inventory/storage/' . $file_name . '.' . $file_ext;

        if (move_uploaded_file($file_tmp, $path)) {

            if ($this->updateImageDB($path, $recordId)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }


    }


    /**
     * @param $imagePath
     * @param $recordId
     * @return bool
     */

    private function updateImageDB($imagePath, $recordId)
    {

        try {

            $stmt = $this->db->prepare("INSERT INTO  car_images (image_url, car_models_id) VALUES (:imageUrl, :mId)");
            $stmt->bindValue(':imageUrl', $imagePath);
            $stmt->bindValue(':mId', $recordId);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }

    }


}

$model = new Models($DB_con);