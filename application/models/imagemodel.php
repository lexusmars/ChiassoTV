<?php
/**
 * Created by PhpStorm.
 * User: luca6
 * Date: 24.10.2019
 * Time: 19:58
 */

class ImageModel
{
    public static function uploadFile($data, $upload_base_path){
        // Check for errors
        if($data["error"] == 0){
            // if no errors detected:

            // build final path
            $img_path = $upload_base_path . self::normalizeFilename($data["name"]);

            // check if file already exists
            if (file_exists($img_path)) {
                return "Il file esiste già all'interno della cartella " . $upload_base_path . " presente sul server";
            }

            // check if image is actually an image
            if(!getimagesize($data["tmp_name"])){
                return "Il file non è un immagine, controlla il file caricato e riprova";
            }
            else{
                // Write image to path
                return move_uploaded_file($data["tmp_name"], $img_path) ?
                    true : "C'è stato un errore durante l'upload del file, contatta un amministratore";
            }
        }
        else{
            return self::codeToMessage($data["error"]);
        }
    }


    private static function codeToMessage($code)
    {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                $message = "Il file supera la direttiva upload_max_filesize impostata in php.ini";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $message = "Il file supera la direttiva MAX_FILE_SIZE specificata nel form HTML";
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = "Il file caricato è stato caricato solo parzialmente";
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = "Il file non è stato caricato";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = "Cartella file temporanei mancante";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = "Errore durante la scrittura dei dati sul disco";
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = "Il caricamento del file è stato interrotto da un estensione";
                break;

            default:
                $message = "Errore di caricamento sconosciuto";
                break;
        }
        return $message;
    }

    private static function normalizeFilename($filename): string {
        $file = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $filename);
        // Remove any runs of periods (thanks falstro!)
        $file = mb_ereg_replace("([\.]{2,})", '', $file);
        return $file;
    }



}